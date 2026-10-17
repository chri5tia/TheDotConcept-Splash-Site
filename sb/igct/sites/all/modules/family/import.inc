<?php
// $Id$

/**
 * @file
 * Functions for importing GEDCOM files to database
 * Using the data base defined in simple.mysql
 * This may also be used as a temporary storage before making more processing
 * for import to other database format.
 * @wtf
 * This comment.
 */
//Generate a form for uploading a GEDCOM file
/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_import() {
  return drupal_render(drupal_get_form('family_import_form'));
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_import_form($form) {
  $form['#attributes'] = array('enctype' => "multipart/form-data");
  $form['gedcom_file'] = array(
    '#type' => 'file',
    '#title' => t('GED file to upload'),
    '#size' => 40,
  );
  //$form['merge'] = array(
  //  '#type' => 'radios',
  //  '#title' => t('Merge options'),
  //  '#options' => array(t('replace existing data'), t('augment current data'), t('merge individuals by name')),
  //  '#default_value' => variable_get('family_import_replace', 1),
  //);

  $form['range'] = array(
    '#type' => 'fieldset',
    '#title' => t('Import range'),
    '#description' => t('Select a range of records (lines staring with 0) to import.  This allows breaking very large files into multiple import sessions .'),
  );
  $form['range']['start'] = array(
    '#type' => 'textfield',
    '#title' => t('First record to import'),
    '#size' => 10,
    '#maxlength' => 10,
    '#description' => t('Enter the number of the first record in the GEDCOM file to include in this import session'),
  );
  $form['range']['nrecords'] = array(
    '#type' => 'textfield',
    '#title' => t('Number of records to import'),
    '#size' => 10,
    '#maxlength' => 10,
    '#description' => t('Enter the number of records to process in this import session'),
  );
  $form['replace'] = array(
    '#type' => 'checkbox',
    '#title' => t('Replace existing GED data'),
    '#default_value' => variable_get('family_import_replace', 1),
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Start Import'),
  );
  $form['#submit'] = array('family_import_submit');
  return $form;
}

// Check the uploaded GEDCOM file
/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_import_submit($form, &$form_state) {
  global $user;
  if (empty($account)) {
    $account = $user;
  }

  $validators = array('file_validate_extensions' => array('ged'));
  $file = file_save_upload('gedcom_file', $validators, false, FILE_EXISTS_RENAME);

  if (!($file = file_save_upload('gedcom_file', $validators, FILE_EXISTS_RENAME))) {
    form_set_error('', t("Didn't get GED file"));
  }
  else {

    if (!($fp = fopen($file->uri, "r"))) {
      form_set_error('', t("Couldn't open get GED file"));
    }
    else {
      //
      // Empty current content. This is useful for debugging, but more caution should be
      // done before deleting database in the working version
      //
      db_query("CREATE TABLE {family_relations_temp} (`nid` VARCHAR( 128 ) NOT NULL , `famc_xref` VARCHAR( 128 )  NULL , `fams_xref` VARCHAR( 128 )  NULL) ENGINE = MYISAM");
      if ($form['replace']) {
        db_query("TRUNCATE {family_individual}");
        db_query("TRUNCATE {family_group}");
        db_query("TRUNCATE {family_location}");
        db_query("TRUNCATE {family_variable}");


        $q = db_query("SELECT nid FROM {node} WHERE type = :type", array(':type' => 'family_individual'));
        $n = 0;
        while ($o = $q->fetchAssoc()) {
          node_delete($o['nid']);
          $n++;
        }
        drupal_set_message(t('Deleted @n family_individual nodes .', array('@n' => $n)));

        $q = db_query("SELECT nid FROM {node} WHERE type = :type", array(':type' => 'family_group'));
        $n = 0;
        while ($o = $q->fetchAssoc()) {
          node_delete($o['nid']);
          $n++;
        }
        drupal_set_message(t('Deleted @n family_group nodes .', array('@n' => $n)));

        $q = db_query("SELECT nid FROM {node} WHERE type = :type", array(':type' => 'family_location'));
        $n = 0;
        while ($o = $q->fetchAssoc()) {
          node_delete($o['nid']);
          $n++;
        }
        drupal_set_message(t('Deleted @n family_location nodes .', array('@n' => $n)));
      }

      $rmin = (isset($form['start']) && $form['start']) ? $form['start'] : 0;
      $rcount = (isset($form['nrecords']) && $form['nrecords']) ? $form['nrecords'] : 99999999;
      $rmax = $rmin + $rcount - 1;
      $rnum = 0;
      $rprocessed = 0;
      $lprocessed = 0;

      $lnum = 0;
      $gedcom_hier = array(); // References to GEDCOM parents on each level
      //declare variables for evaluation
      $current0record = NULL;

      while (!feof($fp)) {
        $gedline = fgets($fp, 1024);
        $lnum++;

        if (preg_match("/^\s*(\d+)\s*(?:@([^@]+)@)?\s*(\S+)\s*(.*\S)?\s*$/i", $gedline, $matches)) {
          $level = $matches[1];
          if ($level == 0) {
            ++$rnum;
          }

          if ($rnum < $rmin) {
            
            continue;
          }
          if ($rnum > $rmax) {
          
            break;
          }
          if ($level == 0) {
           
            ++$rprocessed;
          }
          ++$lprocessed;

          if (isset($matches[2])) {
            $xref = $matches[2];
          }
          if (isset($matches[3])) {
            $fact_code = $matches[3];
          }
          if (isset($matches[4])) {
            $value = $matches[4];
          }
          $gedcom_source = $gedline;
          if (isset($gedcom_hier[$level - 1])) {
            $parent = $gedcom_hier[$level - 1];
          }
          //new ged file evaluation code
          //next line is debug
          //echo $level . "<br>";
          switch ($level) {
            case '0':
              $current0xref = $xref;
              $current0record = $fact_code;
              //next line is debug
              //echo $current0record . "<br>";
              switch ($current0record) {
                case 'INDI':
                  //create title_format variable that has not yet been set.
                  (isset($firstname)) ? $firstname : $firstname = '';
                  (isset($middlename)) ? $middlename : $middlename = '';
                  (isset($lastname)) ? $lastname : $lastname = '';
                  $title_format = $firstname . " " . $middlename . " " . $lastname; //Will change with the implementation of tokens.
                  //next line is debug
                  //echo $title_format . "<br>";
                  //Create family_individual node
                  unset($node);
                  $node->type = 'family_individual';
                  $node->uid = $account->uid;
                  $node->nid = null;
                  $node->title = $title_format;
                  $node->status = 1;
                  $node->moderate = 0;
                  $node->comment = 2;
                  $node->revision = 0;
                  node_validate($node, $form, &$form_state);
                  if (!node_access("create", $node)) {
                    $error['access'] = true;
                  }

                  if (isset($error) && $error) {
                    drupal_set_message(
                        t('Error at line @lnum of GED (@line): @error .',
                            array('@lnum' => $lnum, '@line' => $gedline, '@error' => print_r($error, TRUE))
                        )
                    );
                  }
                  else {

                    $node->title = (isset($title_format)) ? $title_format : $title_format = '';
                    $node->firstname = (isset($firstname)) ? $firstname : $firstname = '';
                    $node->middlename = (isset($middlename)) ? $middlename : $middlename = '';
                    $node->lastname = (isset($lastname)) ? $lastname : $lastname = '';
                    $node->gender = (isset($gender)) ? $gender : $gender = '';
                    $node->birthdate = (isset($birthdate)) ? $birthdate : $birthdate = null;
                    $node->birthplace = (isset($birthplace)) ? $birthplace : $birthplace = '';
                    $node->deathdate = (isset($deathdate)) ? $deathdate : $deathdate = null;
                    $node->deathplace = (isset($deathplace)) ? $deathplace : $deathplace = '';
                    node_save($node);
                    $nid = $node->nid;
                    //Insert relationship variables into temporary database
                    // TODO Please review the conversion of this statement to the D7 database API syntax.
                    /* db_query("INSERT INTO {family_relations_temp} (nid, famc_xref, fams_xref) VALUES (%d, '%s', '%s')", $nid, $famc_xref, $fams_xref) */
                    (isset($famc_xref)) ? $famc_xref : $famc_xref = null;
                    (isset($fams_xref)) ? $fams_xref : $fams_xref = null;
                    $id = db_insert('family_relations_temp')
                            ->fields(array(
                              'nid' => $nid,
                              'famc_xref' => $famc_xref,
                              'fams_xref' => $fams_xref,
                            ))
                            ->execute();
                    //next line is debug
                  }
                  unset($node);
                  //unset all INDI variables
                  unset($famc_xref);
                  unset($fams_xref);
                  unset($vid);
                  unset($nid);
                  unset($title_format);
                  unset($firstname);
                  unset($middlename);
                  unset($lastname);
                  unset($gender);
                  unset($birthdate);
                  unset($birthplace);
                  unset($deathdate);
                  unset($deathplace);
                  unset($children_num);
                  break;
                case 'FAM':
                  //Find the group surname shared by the children of the group. - This may be incorrect in cases where the name has not been passed to the children.
                  $current0xref = '@' . $current0xref . '@';
                  $group_surname = db_query("SELECT r.lastname FROM {family_individual} r INNER JOIN {family_relations_temp} t ON r.nid=t.nid WHERE t.famc_xref = :famc_xref", array(':famc_xref' => $current0xref));
                  //$group_surname = db_fetch_object($result);
                  //Debug Line Below
                  //drupal_set_message(t('FAM XREF @n', array('@n' => $current0xref)));
                  //Find Parents of group
                  $result = db_query("SELECT nid FROM {family_relations_temp} WHERE fams_xref = :fams_xref", array(':fams_xref' => $current0xref));
                  while ($parent = $result->fetchAssoc()) {
                    //Debug Line Below
                    //drupal_set_message(t('PARENT NID @n', array('@n' => $parent['nid'])));
                    $parents[] = $parent['nid'];
                  }
                  if (isset($parents[0])) {
                    $parent1 = $parents[0];
                  }
                  if (isset($parents[1])) {
                    $parent2 = $parents[1];
                  }

                  //create group node
                  unset($node);
                  $node->type = 'family_group';
                  $node->uid = $account->uid;
                  $node->nid = null;
                  $node->title = (isset($title_format)) ? $title_format : $title_format = '';
                  $node->status = 1;
                  $node->moderate = 0;
                  $node->comment = 2;
                  $node->revision = 0;
                  node_validate($node, $form, &$form_state);
                  if (!node_access("create", $node)) {
                    $error['access'] = true;
                  }
                  if (isset($error) && $error) {
                    drupal_set_message(
                        t('Error at line @lnum of GED (@line): @error .',
                            array('@lnum' => $lnum, '@line' => $gedline, '@error' => print_r($error, TRUE))
                        )
                    );
                  }
                  else {
                    $node->title = (isset($title_format)) ? $title_format : $title_format = '';
                    $node->marr_type = (isset($marr_type)) ? marr_type : $marr_type = '';
                    $node->marr_date = (isset($marr_date)) ? $marr_date : $marr_date = null;
                    $node->marr_plac = (isset($marr_plac)) ? $marr_plac : $marr_plac = '';
                    $node->div_date = (isset($div_date)) ? $div_date : $div_date = null;
                    $node->div_plac = (isset($div_plac)) ? $div_plac : $div_plac = '';
                    $node->parent1 = (isset($parent1)) ? $parent1 : $parent1 = '';
                    $node->parent2 = (isset($parent2)) ? $parent2 : $parent2 = '';
                    node_save($node);
                    $nid = $node->nid;
                    //insert ancestor group value into INDI nodes related to this group
                    //db_query("UPDATE {family_individual} SET ancestor_group='%d' WHERE lastname='%s'", $nid, $group_surname);
                    //insert variables into family_group table
                    //db_query("INSERT INTO {family_group} (vid, nid, title_format, marr_type, marr_date, marr_plac, div_date, div_plac, parent1, parent2) VALUES (%d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d')", $vid, $nid, $title_format, $marr_type, $marr_date, $marr_plac, $div_date, $div_plac, $parent1, $parent2);
                    //unset all FAM variables
                    $result = db_query("SELECT nid FROM {family_relations_temp} WHERE famc_xref = :famc_xref", array(':famc_xref' => $current0xref));
                    while ($child = $result->fetchAssoc()) {
                      //Debug Line Below
                      //drupal_set_message(t('CHILD NID @n', array('@n' => $child['nid'])));
                      $childnid = $child['nid'];
                      // TODO Please review the conversion of this statement to the D7 database API syntax.
                      /* db_query("UPDATE {family_individual} SET ancestor_group = %d WHERE nid =%d", $nid, $childnid) */
                      db_update('family_individual')
                          ->fields(array(
                            'ancestor_group' => $nid,
                          ))
                          ->condition('nid', $childnid)
                          ->execute();
                    }
                  }
                  unset($node);
                  unset($current0xref);
                  unset($child_ref_nid);
                  unset($group_surname);
                  unset($parent_surname);
                  unset($parent1_firstname);
                  unset($parent2_firstname);
                  unset($vid);
                  unset($nid);
                  unset($title_format);
                  unset($marr_type);
                  unset($marr_date);
                  unset($marr_plac);
                  unset($div_date);
                  unset($div_plac);
                  unset($parent1);
                  unset($parent2);
                  unset($parents);
                  break;
              }
              $current0record = NULL;
              //next line is debug
              //echo $fact_code . "<br>";
              switch ($fact_code) {
                case 'FAM':
                case 'INDI':
                  $current0record = $fact_code;
                  $current0xref = $xref;
                  break;
              }
              break;
            case '1':
              $current1record = $fact_code;
              //next line is debug
              //echo $current0record . "<br>";
              switch ($current0record) {
                case 'INDI':
                  //next line is debug
                  //echo $fact_code . "<br>";
                  switch ($fact_code) {
                    case 'SEX':
                      $gender = $value;
                      $current1record = $fact_code;
                      break;
                    case 'NCHI':
                      $children_num = $value;
                      $current1record = $fact_code;
                      break;
                    case 'NAME':
                      //split name value by / to separate surname
                      $splitName1 = explode("/", $value);
                      (array_key_exists(1, $splitName1)) ? $spn11 = $splitName1[1] : $spn11 = '';
                      $lastname = $spn11;
                      // split name by spaces
                      $splitName2 = explode(" ", $splitName1[0]);
                      // take the first name to be firstname
                      (array_key_exists(0, $splitName2)) ? $spn20 = $splitName2[0] : $spn20 = '';
                      $firstname = $spn20;
                      // add all the other names together in a string
                      (array_key_exists(1, $splitName2)) ? $spn21 = $splitName2[1] : $spn21 = '';
                      (array_key_exists(2, $splitName2)) ? $spn22 = $splitName2[2] : $spn22 = '';
                      (array_key_exists(3, $splitName2)) ? $spn23 = $splitName2[3] : $spn23 = '';
                      (array_key_exists(4, $splitName2)) ? $spn24 = $splitName2[4] : $spn24 = '';
                      (array_key_exists(5, $splitName2)) ? $spn25 = $splitName2[5] : $spn25 = '';
                      (array_key_exists(6, $splitName2)) ? $spn26 = $splitName2[6] : $spn26 = '';
                      (array_key_exists(7, $splitName2)) ? $spn27 = $splitName2[7] : $spn27 = '';
                      $middlename = $spn21 . " " . $spn22 . " " . $spn23 . " " . $spn24 . " " . $spn25 . " " . $spn26 . " " . $spn27;
                      $current1record = $fact_code;
                      break;
                    case 'DEAT':
                    case 'BIRT':
                      $current1record = $fact_code;
                      break;
                    case 'FAMS':
                      $fams_xref = $value;
                      break;
                    case 'FAMC':
                      $famc_xref = $value;
                      break;
                  }
                  break;
                case 'FAM':
                  //next line is debug
                  //echo $fact_code . "<br>";
                  switch ($fact_code) {
                    case 'MARR':
                    case 'DIV':
                      $current1record = $fact_code;
                      break;
                  }
                  break;
              }
              break;
            case '2':
              $current2record = $fact_code;
              //next line is debug
              //echo $current1record . "<br>";
              switch ($current1record) {
                case 'BIRT':
                  //next line is debug
                  //echo $fact_code . "<br>";
                  switch ($fact_code) {
                    case 'DATE':
                      $birthdate = family_changeDateFormat($value);
                      break;
                    case 'PLAC':
                      $birthplace = $value;
                      break;
                  }
                  break;
                case 'DEAT':
                  //next line is debug
                  //echo $fact_code . "<br>";
                  switch ($fact_code) {
                    case 'DATE':
                      $deathdate = family_changeDateFormat($value);
                      break;
                    case 'PLAC':
                      $deathplace = $value;
                      break;
                  }
                  break;
                case 'MARR':
                  //next line is debug
                  //echo $fact_code . "<br>";
                  switch ($fact_code) {
                    case 'TYPE':
                      $marr_type = $value;
                      break;
                    case 'DATE':
                      $marr_date = family_changeDateFormat($value);
                      break;
                    case 'PLAC':
                      $marr_plac = $value;
                      break;
                  }
                  break;
                case 'DIV':
                  //next line is debug
                  //echo $fact_code . "<br>";
                  switch ($fact_code) {
                    case 'DATE':
                      $div_date = family_changeDateFormat($value);
                      break;
                    case 'PLAC':
                      $div_plac = $value;
                      break;
                  }
                  break;
              }
              break;
          }
        }
      }

      fclose($fp);
      db_query("DROP TABLE {family_relations_temp}");
      drupal_set_message(t('Processed @r records (@n lines) of GED .', array('@r' => $rprocessed, '@n' => $lprocessed)));
      if ($rnum > $rmax) {
        drupal_set_message(t('Next start record: @r .', array('@r' => $rmax + 1)));
      }
      else {
        drupal_set_message(t('No more records to process'));
      }
    }
  }
  return;
}

