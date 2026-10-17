<?php
// $Id$

/**
 * Implements hook_access().
 */
function family_group_access($op, $node, $account) {
  if ($op == 'create') {
    return user_access('create family nodes');
  }
  if ($op == 'update' || $op == 'delete') {
    if (user_access('edit own family nodes') && ($user->uid == $node->uid)) {
      return TRUE;
    }
    else {
      return user_access('edit family nodes');
    }
  }
  if ($op == 'view') {
//return family_check_privacy($node->nid);
    return user_access('access family nodes');
  }
}
function family_form_family_group_node_form_alter(&$form, &$form_state) {
  $form['body']['#weight'] = 10;
  //$form['body']['und'][0]['#title'] = t('Biography');
}
/**
 * Implements hook_form().
 */
function family_group_form($node, &$form_state) {

  $type = node_type_get_type($node);
  if ($type->has_title) {
    $form['title'] = array(
      '#title' => check_plain($type->title_label),
      '#type' => 'hidden',
      '#default_value' => $node->name,
    );
  }
  (isset($node->marr_type)) ? $node->marr_type : $node->marr_type = '';
  $form['marr']['marr_type'] = array(
    '#type' => 'select',
    '#title' => t('Type of Union'),
    '#default_value' => $node->marr_type,
    '#options' => array(
      'Unmarried' => 'Unmarried',
      'Religious' => 'Religious',
      'Common Law' => 'Common Law',
      'Civil' => 'Civil',
    ),
  );
  (isset($node->marr_date)) ? $node->marr_date : $node->marr_date = null;
  $form['marr']['marr_date'] = array(
    '#type' => 'textfield',
    '#title' => t('Date of Union'),
    '#description' => t('Year-Month-Day YYYY-MM-DD'),
    '#default_value' => $node->marr_date,
  );
  (isset($node->marr_plac)) ? $node->marr_plac : $node->marr_plac = '';
  $form['marr']['marr_place'] = array(
    '#type' => 'textfield',
    '#title' => t('Place of Union'),
    '#default_value' => $node->marr_plac,
  );
  (isset($node->div_date)) ? $node->div_date : $node->div_date = null;
  $form['marr']['div_date'] = array(
    '#type' => 'textfield',
    '#title' => t('Date of Separation'),
    '#description' => t('Year-Month-Day YYYY-MM-DD'),
    '#default_value' => $node->div_date,
  );
  (isset($node->div_plac)) ? $node->div_plac : $node->div_plac = '';
  $form['marr']['div_plac'] = array(
    '#type' => 'textfield',
    '#title' => t('Place of Separation'),
    '#default_value' => $node->div_plac,
  );
  //$form['body']=array( '#weight' =>1);
  $parents = array();
  $indivs = db_query('SELECT nid, title_format FROM {family_individual} fi')->fetchAll();
  if ($indivs) {
    foreach ($indivs as $indiv) {
//while ($data = db_fetch_array($indivs)) {
      $parents[$indiv->nid] = $indiv->title_format;
    }
  }
  (isset($node->parent1)) ? $node->parent1 : $node->parent1 = '';
  $form['parent1'] = array(
    '#type' => 'select',
    '#title' => t('Parent 1'),
    '#description' => t('The parent whose last name is carried by the children .'),
    '#default_value' => $node->parent1,
    '#options' => array(
      '' => 'Unknown',
      'Individuals' => $parents,
    ),
  );
  (isset($node->parent2)) ? $node->parent2 : $node->parent2 = '';
  $form['parent2'] = array(
    '#type' => 'select',
    '#title' => t('Parent 2'),
    '#default_value' => $node->parent2,
    '#options' => array(
      '' => 'Unknown',
      'Individuals' => $parents,
    ),
  );
  //$form['body_filter']['body_field'] = node_body_field($node, $type->body_label, $type->min_word_count);
  //$form['body_filter']['body_field'] = $node->
  //$form['body_filter']['format'] = filter_form($node->format); //Not sure why this goes here, but all the examples have it...
  return $form;
}

// function family_group_form(&$node, &$param)

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_group_insert($node) {
  $parent1first = db_query("SELECT firstname FROM {family_individual} WHERE nid = :nid", array(':nid' => $node->parent1))->fetchField();
  $parent1last = db_query("SELECT lastname FROM {family_individual} WHERE nid = :nid", array(':nid' => $node->parent1))->fetchField();
  $parent2 = db_query("SELECT firstname FROM {family_individual} WHERE nid = :nid", array(':nid' => $node->parent2))->fetchField();
  $node->title_format = ($parent1first) . ' and ' . ($parent2) . ' ' . ($parent1last);
  $node->title = $node->title_format;
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
  /* db_query("INSERT INTO {family_group} (vid, nid, title_format, marr_type, marr_date, marr_plac, div_date, div_plac, parent1, parent2) VALUES (%d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $node->vid, $node->nid, $node->title_format, $node->MARR_TYPE, $node->marr_date, $node->marr_plac, $node->div_date, $node->DIV_PLAC, $node->PAR1, $node->PAR2) */

  (isset($node->marr_type)) ? $node->marr_type : $node->marr_type = null;
  (isset($node->marr_date) && !empty($node->marr_date)) ? $node->marr_date : $node->marr_date = null;
  (isset($node->marr_plac)) ? $node->marr_plac : $node->marr_plac = null;
  (isset($node->div_date) && !empty($node->div_date)) ? $node->div_date : $node->div_date = null;
  (isset($node->div_plac)) ? $node->div_plac : $node->div_plac = null;
  $id = db_insert('family_group')
          ->fields(array(
            'vid' => $node->vid,
            'nid' => $node->nid,
            'title_format' => $node->title_format,
            'marr_type' => $node->marr_type,
            'marr_date' => $node->marr_date,
            'marr_plac' => $node->marr_plac,
            'div_date' => $node->div_date,
            'div_plac' => $node->div_plac,
            'parent1' => $node->parent1,
            'parent2' => $node->parent2,
          ))
          ->execute();
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_group_update($node) {
  $parent1first = db_query("SELECT firstname FROM {family_individual} WHERE nid = :nid", array(':nid' => $node->parent1))->fetchField();
  $parent1last = db_query("SELECT lastname FROM {family_individual} WHERE nid = :nid", array(':nid' => $node->parent1))->fetchField();
  $parent2 = db_query("SELECT firstname FROM {family_individual} WHERE nid = :nid", array(':nid' => $node->parent2))->fetchField();
  $node->title_format = ($parent1first) . ' and ' . ($parent2) . ' ' . ($parent1last);
  $node->title = $node->title_format;
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
  /* db_query("UPDATE {family_group} SET vid='%d', title_format='%s', marr_type='%s', marr_date='%s', marr_plac='%s', div_date='%s', div_plac='%s', parent1='%s', parent2='%s' WHERE nid='%d'", $node->vid, $node->title_format, $node->MARR_TYPE, $node->marr_date, $node->marr_plac, $node->div_date, $node->DIV_PLAC, $node->PAR1, $node->PAR2, $node->nid) */

  (isset($node->marr_type)) ? $node->marr_type : $node->marr_type = null;
  (isset($node->marr_date) && !empty($node->marr_date)) ? $node->marr_date : $node->marr_date = null;
  (isset($node->marr_plac)) ? $node->marr_plac : $node->marr_plac = null;
  (isset($node->div_date) && !empty($node->div_date)) ? $node->div_date : $node->div_date = null;
  (isset($node->div_plac)) ? $node->div_plac : $node->div_plac = null;
  db_update('family_group')
      ->fields(array(
        'vid' => $node->vid,
        'title_format' => $node->title_format,
        'marr_type' => $node->marr_type,
        'marr_date' => $node->marr_date,
        'marr_plac' => $node->marr_plac,
        'div_date' => $node->div_date,
        'div_plac' => $node->div_plac,
        'parent1' => $node->parent1,
        'parent2' => $node->parent2,
      ))
      ->condition('nid', $node->nid)
      ->execute();
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_group_load(&$nodes) {

  foreach ($nodes as $i => $node) {
    $nid = $node->nid;
    $data = db_query("SELECT * FROM {family_group} WHERE nid = :nid", array(':nid' => $nid))->fetchAssoc();
    $parent1 = db_query("SELECT firstname, lastname FROM {family_individual} WHERE nid = :nid", array(':nid' => $data['parent1']))->fetchAssoc();
    $parent2 = db_query("SELECT firstname FROM {family_individual} WHERE nid = :nid", array(':nid' => $data['parent2']))->fetchAssoc();
    $node->name = $parent1['firstname'] . ' and ' . $parent2['firstname'] . ' ' . $parent1['lastname'];
    $node->title_format = $data['title_format'];
    $node->marr_type = $data['marr_type'];
//Marriage data
    if ($data['marr_date'] != '0000-00-00 00:00:00') {
      $value = explode(' ', $data['marr_date']);
      $value = $value[0];
      $node->marr_date = $value;
    }
    $node->marr_plac = $data['marr_plac'];
//Divorce data
    if ($data['div_date'] != '0000-00-00 00:00:00') {
      $value = explode(' ', $data['div_date']);
      $value = $value[0];
      $node->div_date = $value;
    }
    $node->div_plac = $data['div_plac'];
//Parents of the group
    $node->parent1 = $data['parent1'];
    $node->parent2 = $data['parent2'];
  }
  //return ($additions);
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_group_view(&$node, $viewmode) {
//  $node = node_prepare($node, $teaser);
// TODO Please change this theme call to use an associative array for the $variables parameter.
  if ($viewmode == 'teaser') {
    $node->content['family_group_view'] = array(
      '#markup' => theme('family_group_teaser', array('node' => $node)),
      '#weight' => -1,
    );
  }
  else {
    $node->content['family_group_view'] = array(
      '#markup' => theme('family_group_body', array('node' => $node)),
      '#weight' => -1,
    );
  }


  return $node;
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function theme_family_group_teaser($variables) {
  $node = $variables['node'];
  return family_view_unison($node->nid, '0');
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function theme_family_group_body($variables) {
  $node = $variables['node'];
  return family_view_unison($node->nid, '1');
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_group_delete(&$node) {
// TODO Please review the conversion of this statement to the D7 database API syntax.
  /* db_query("DELETE FROM {family_group} WHERE nid=%d", $node->nid) */
  db_delete('family_group')
      ->condition('nid', $node->nid)
      ->execute();
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_summ_group($nid) {
  $family = db_query("SELECT * FROM {family_location} WHERE nid = :nid", array(':nid' => $nid))->fetchAll();
  $list1 = array();

  if (count($family)) {
    if ($family['marr_type']) {
      $list1[] = 'Marriage Type: ' . $family['marr_type'];
    }
    if ($family['marr_date']) {
      $list1[] = 'Marriage Date: ' . $family['marr_date'];
    }

    if ($family['marr_plac']) {
      $list1[] = 'Marriage Place: ' . family_make_location($family['marr_plac']);
    }
    if ($family['div_date']) {
      $list1[] = 'Divorce Date: ' . $family['div_date'];
    }
    if ($family['div_place']) {
      $list1[] = 'Divorce Place: ' . family_make_location($family['div_plac']);
    }
  }

  return theme('item_list', array('items' => $list1));
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_view_unison($nid, $type) {
  $content = "";
  $content .= family_summ_group($nid);
  $data = db_query("SELECT * FROM {family_group} WHERE nid = :nid", array(':nid' => $nid))->fetchAssoc();

//Find children of the family group
  $children = db_query("SELECT * FROM {family_individual} WHERE ancestor_group = :ancestor_group", array(':ancestor_group' => $nid));
  if ($children) {
    $content .= '<p>Children of ' . family_make_name($data['parent1'], TRUE) . ' and ' . family_make_name($data['parent2'], TRUE) . ':</p>';
    $content .= '<p><table width=100% border=1><tr><td>Name</td><td>Gender</td><td>Birth Date</td><td>Death Date</td></tr>';
    while ($child = $children->fetchAssoc()) {
      $content .= "<tr><td>" . family_make_name($child['nid'], TRUE) . "</td><td>" . $child['gender'] . "</td><td>" . $child['birthdate'] . "</td><td>" . $child['deathdate'] . "</td></tr>";
    }
    $content .= "</table>";
  }
  return $content;
}