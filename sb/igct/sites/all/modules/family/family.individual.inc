<?php
// $Id$

/**
 * Implements hook_access().
 */
function family_individual_access($op, $node, $account) {
    if ($op == 'create') {
        return user_access('create family nodes');
    }
    if ($op == 'update' || $op == 'delete') {
        if (user_access('edit own family nodes') && ($user->uid == $node->uid)) {
            return TRUE;
        } else {
            return user_access('edit family nodes');
        }
    }
    if ($op == 'view') {
        return family_check_privacy($node->nid);
    }
}
function family_form_alter(&$form, &$form_state, $form_id) {
    print '__FUNCTION__';
    die();
//    print('<pre>');
//    print_r($form);
//    print('</pre>');
    //drupal_set_message(print_r($form, true), 'status');
}
function family_form_family_individual_alter(&$form, &$form_state){
  //print '__FUNCTION__';
  print('<pre>');
  print_r($form);
  print('</pre>');
}



/**
 * Implements hook_form().
 */
function family_individual_form(&$node) {
    print __FUNCTION__;
    $type = node_type_get_type($node);
    if ($type->has_title) {
        (isset($node->firstname)) ? $node->firstname : $node->firstname = '';
        $form['title'] = array(
            '#title' => check_plain($type->title_label),
            '#type' => 'hidden',
            '#default_value' => $node->firstname,
        );
    }
    (isset($node->firstname)) ? $node->firstname : $node->firstname = '';
    $form['firstname'] = array(
        '#type' => 'textfield',
        '#title' => t('Forename'),
        '#default_value' => $node->firstname,
        '#required' => FALSE,
    );
    (isset($node->middlename)) ? $node->middlename : $node->middlename = '';
    $form['middlename'] = array(
        '#type' => 'textfield',
        '#title' => t('Middle Names'),
        '#default_value' => $node->middlename,
        '#required' => FALSE,
    );
    (isset($node->lastname)) ? $node->lastname : $node->lastname = '';
    $form['lastname'] = array(
        '#type' => 'textfield',
        '#title' => t('Surname'),
        '#default_value' => $node->lastname,
        '#required' => FALSE,
    );
    (isset($node->gender)) ? $node->gender : $node->gender = '';
    $form['gender'] = array(
        '#type' => 'select',
        '#title' => t('Gender'),
        '#default_value' => $node->gender,
        '#options' => array(
            '?' => 'Unknown',
            'M' => 'Male',
            'F' => 'Female',
        ),
    );
    $ancestorgroups = array();
    $groups = db_query('SELECT nid, title_format FROM {family_group}');
    if ($groups) {

        while ($data = $groups->fetchAssoc()) {
            $ancestorgroups[$data['nid']] = $data['title_format'];
        }
    }
    (isset($node->ancestor_group)) ? $ancestor_group = $node->ancestor_group : $ancestor_group = '';
    $form['ancestor_group'] = array(
        '#type' => 'select',
        '#title' => t('Ancestry Group'),
        '#default_value' => $ancestor_group,
        '#options' => array(
            '' => 'None',
            'Groups' => $ancestorgroups,
        ),
    );
    (isset($node->birthdate)) ? $node->birthdate : $node->birthdate = null;
    $form['birth']['birthdate'] = array(
        '#type' => 'textfield',
        '#title' => t('Birth Date'),
        '#description' => t('Year-Month-Day YYYY-MM-DD'),
        '#default_value' => $node->birthdate,
    );
    (isset($node->birthplace)) ? $node->birthplace : $node->birthplace = null;
    $form['birth']['birthplace'] = array(
        '#type' => 'textfield',
        '#title' => t(' Birth Place'),
        '#default_value' => $node->birthplace,
    );
    (isset($node->deathdate)) ? $node->deathdate : $node->deathdate = null;
    $form['death']['deathdate'] = array(
        '#type' => 'textfield',
        '#title' => t('Death Date'),
        '#description' => t('Year-Month-Day YYYY-MM-DD'),
        '#default_value' => $node->deathdate,
    );
    (isset($node->deathplace)) ? $deathplace = $node->deathplace : $deathplace = null;
    $form['death']['deathplace'] = array(
        '#type' => 'textfield',
        '#title' => t('Death Place'),
        '#default_value' => $deathplace,
    );

    return $form;
}

// function family_individual_form(&$node, &$param)

/**
 * Implements hook_insert().
 *  Insert All the facts and relationships
 *  Update Node and revision to replace data not in form
 *
 */
function family_individual_insert($node) {
//print __FUNCTION__;

    $node->title = $node->firstname . ' ' . $node->lastname;
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    //db_query("UPDATE {node} SET title=':title' WHERE nid=':nid'", array(':title'=>$node->title,':nid'=>$node->nid));
    db_update('node')
            ->fields(array(
                'title' => $node->title,
            ))
            ->condition('nid', $node->nid)
            ->execute();
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    //db_query("UPDATE {node_revisions} SET title='%s' WHERE nid='%d' AND vid='%d'", $node->title, $node->nid, $node->vid)
    db_update('node_revision')
            ->fields(array(
                'title' => $node->title,
            ))
            ->condition('nid', $node->nid)
            ->condition('vid', $node->vid)
            ->execute();
    $birthdate = explode("-", $node->birthdate);
    $node->title_format = (strtoupper($node->lastname)) . ', ' . ($node->firstname) . ' - ' . $birthdate[0];

    // TODO Please review the conversion of this statement to the D7 database API syntax.
    /* db_query("INSERT INTO {family_individual} (vid, nid, title_format, firstname, middlename, lastname, gender, birthdate, birthplace, deathdate, deathplace, ancestor_group) VALUES (%d, %d, '%s',  '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $node->vid, $node->nid, $node->title_format, $node->FORE, $node->MIDN, $node->SURN, $node->SEX, $node->BIRT_DATE, $node->BIRT_PLAC, $node->DEAT_DATE, $node->DEAT_PLAC, $node->GRUP) */
    ($node->deathdate) ? $node->deathdate : $node->deathdate = null;
    ($node->birthdate) ? $node->birthdate : $node->birthdate = null;
    (isset($node->ancestor_group)&& !empty ($node->ancestor_group)) ? $node->ancestor_group : $node->ancestor_group = '';
    $id = db_insert('family_individual')
                    ->fields(array(
                        'vid' => $node->vid,
                        'nid' => $node->nid,
                        'title_format' => $node->title_format,
                        'firstname' => $node->firstname,
                        'middlename' => $node->middlename,
                        'lastname' => $node->lastname,
                        'gender' => $node->gender,
                        'birthdate' => $node->birthdate,
                        'birthplace' => $node->birthplace,
                        'deathdate' => $node->deathdate,
                        'deathplace' => $node->deathplace,
                        'ancestor_group' => $node->ancestor_group,
                    ))
                    ->execute();
}

/**
 * Implementation of family_individual_load().
 * This function will grab all the descriptive data for an individual
 * Primary use is for filling in form data to preform an edit

 * Returns an array of additions
 */
function family_individual_load(&$nodes) {

    foreach ($nodes as $node) {
        $node->nid;


        $data = db_query("SELECT * FROM {family_individual} fi WHERE fi.nid = :nid", array(':nid' => $node->nid))->fetchAssoc();
        $node->title_format = $data['title_format'];
        //NAME
        $node->lastname = $data['lastname'];
        $node->middlename = $data['middlename'];
        $node->firstname = $data['firstname'];
        $node->name = $node->firstname . ' ' . $node->lastname;
        //Gender
        $gender = $data['gender'];
        if ($gender) {
            $node->gender = $gender;
        }
        //BIRTH
        $birt_date = $data['birthdate'];
        if ($birt_date != '0000-00-00 00:00:00') {
            $value = explode(' ', $birt_date);
            $value = $value[0];
            $node->birthdate = $value;
        }
        $birt_plac = $data['birthplace'];
        if ($birt_plac) {
            $node->birthplace = $birt_plac;
        }
        //DEATH

        $deat_date = $data['deathdate'];
        if ($deat_date != '0000-00-00 00:00:00') {
            $value = explode(' ', $deat_date);
            $value = $value[0];
            $node->deathdate = $value;
        }
        $deat_plac = $data['deathplace'];
        if ($deat_plac) {
            $node->deathplace = $deat_plac;
        }
        $ans_grup = $data['ancestor_group'];
        if ($ans_grup) {
            $node->ancestor_group = $ans_grup;
        }
    }
    //return ($additions);
}

/**
 * Implements hook_update().
 *  Update the facts and new relationships
 *  Update Node and revision to replace data not in form
 *
 *  See family_individual_insert
 */
function family_individual_update($node) {
    $node->title = $node->firstname . ' ' . $node->lastname;
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    /* db_query("UPDATE {node} SET title='%s' WHERE nid='%d'", $node->title, $node->nid) */
    db_update('node')
            ->fields(array(
                'title' => $node->title,
            ))
            ->condition('nid', $node->nid)
            ->execute();
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    /* db_query("UPDATE {node_revisions} SET title='%s' WHERE nid='%d' AND vid='%d'", $node->title, $node->nid, $node->vid) */
    db_update('node_revision')
            ->fields(array(
                'title' => $node->title,
            ))
            ->condition('nid', $node->nid)
            ->condition('vid', $node->vid)
            ->execute();
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    /* db_query("UPDATE {node} SET title='%s' WHERE nid='%d'", $node->title, $node->nid) */
    db_update('node')
            ->fields(array(
                'title' => $node->title,
            ))
            ->condition('nid', $node->nid)
            ->execute();
    $birthdate = explode("-", $node->birthdate);
    $node->title_format = (strtoupper($node->lastname)) . ', ' . ($node->firstname) . ' - ' . $birthdate[0];
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    /* db_query("UPDATE {family_individual} SET vid='%d', title_format='%s', firstname='%s', middlename='%s', lastname='%s', gender='%s', birthdate='%s', birthplace='%s', deathdate='%s', deathplace='%s', ancestor_group='%s' WHERE nid='%d'", $node->vid, $node->title_format, $node->FORE, $node->MIDN, $node->SURN, $node->SEX, $node->BIRT_DATE, $node->BIRT_PLAC, $node->DEAT_DATE, $node->DEAT_PLAC, $node->GRUP, $node->nid) */
    ($node->deathdate) ? $node->deathdate : $node->deathdate = null;
    ($node->birthdate) ? $node->birthdate : $node->birthdate = null;
    (isset ($node->ancestor_group)&&!empty($node->ancestor_group)) ? $node->ancestor_group : $node->ancestor_group = '';
    db_update('family_individual')
            ->fields(array(
                'vid' => $node->vid,
                'title_format' => $node->title_format,
                'firstname' => $node->firstname,
                'middlename' => $node->middlename,
                'lastname' => $node->lastname,
                'gender' => $node->gender,
                'birthdate' => $node->birthdate,
                'birthplace' => $node->birthplace,
                'deathdate' => $node->deathdate,
                'deathplace' => $node->deathplace,
                'ancestor_group' => $node->ancestor_group,
            ))
            ->condition('nid', $node->nid)
            ->execute();
}

/**
 * Implements hook_view().
 */
function family_individual_view($node, $view_mode) {

    // $node = node_prepare($node, $teaser);
    if ($view_mode == 'teaser') {
        $node->content['family_individual_view'] = array(
            '#markup' => theme('family_individual_teaser', array('node' => $node)),
            '#weight' => -1,
        );
    } else {
        $node->content['family_individual_view'] = array(
            '#markup' => theme('family_individual_body', array('node' => $node)),
            '#weight' => -1,
        );
    }
    return $node;
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_theme() {
    //print __FUNCTION__;
    return array(
        'family_individual_teaser' => array(
            'variables' => array('node'),
        ),
        'family_individual_body' => array(
            'variables' => array('node'),
        ),
        'family_group_teaser' => array(
            'variables' => array('node'),
        ),
        'family_group_body' => array(
            'variables' => array('node'),
        ),
        'family_location_teaser' => array(
            'variables' => array('node'),
        ),
        'family_location_body' => array(
            'variables' => array('node'),
        ),
    );
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function theme_family_individual_teaser($variables) {
//print __FUNCTION__.PHP_EOL;
    $node = $variables['node'];
    $content = family_view_indi($node->nid, '0');
    return $content;
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function theme_family_individual_body($variables) {
    $node = $variables['node'];
    $content = family_view_indi($node->nid, '1');
    return $content;
}

/**
 * Implements hook_delete().
 */
function family_individual_delete(&$node) {
    //  $ind_fid = db_result(db_query("SELECT fid FROM {family_facts} WHERE nid = %d", $node->nid));
    //family_remove_fact($node->nid);
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    /* db_query("DELETE FROM {family_individual} WHERE nid=%d", $node->nid) */
    db_delete('family_individual')
            ->condition('nid', $node->nid)
            ->execute();
}

/**
 * Just so we don't have to keep formatting a name over and over
 */
function family_get_display_name($name) {
    $name_arr['NAME'] = $name_arr['GIVN'] . ' ' . $name_arr['SURN'];
    return $name_arr;
}
