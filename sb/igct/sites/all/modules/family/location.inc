<?php
// $Id$

/**
 * Implements hook_access().
 */
function family_location_access($op, $node, $account) {
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
        //return family_check_privacy($node->nid);
        return user_access('access family nodes');
    }
}

/**
 * Implements hook_form().
 */
function family_location_form(&$node) {
    $type = node_type_get_type($node);

    if ($type->has_title) {
        $form['title'] = array(
            '#title' => check_plain($type->title_label),
            '#type' => 'hidden',
            '#default_value' => $node->name,
        );
    }
    (isset($node->build)) ? $node->build : $node->build = '';
    $form['build'] = array(
        '#type' => 'textfield',
        '#title' => t('building'),
        '#default_value' => $node->build,
        '#required' => FALSE,
    );
    (isset($node->street)) ? $node->street : $node->street = '';
    $form['street'] = array(
        '#type' => 'textfield',
        '#title' => t('street'),
        '#default_value' => $node->street,
        '#required' => FALSE,
    );
    (isset($node->city)) ? $node->city : $node->city = '';
    $form['city'] = array(
        '#type' => 'textfield',
        '#title' => t('city'),
        '#default_value' => $node->city,
        '#required' => FALSE,
    );
    (isset($node->county)) ? $node->county : $node->county = '';
    $form['county'] = array(
        '#type' => 'textfield',
        '#title' => t('county'),
        '#default_value' => $node->county,
        '#required' => FALSE,
    );
    (isset($node->state_prov)) ? $node->state_prov : $node->state_prov = '';
    $form['state_prov'] = array(
        '#type' => 'textfield',
        '#title' => t('State or Province'),
        '#default_value' => $node->state_prov,
        '#required' => FALSE,
    );
    (isset($node->country)) ? $node->country : $node->country = '';
    $form['country'] = array(
        '#type' => 'textfield',
        '#title' => t('country'),
        '#default_value' => $node->country,
        '#required' => FALSE,
    );
    $ancestorgroups = array();
    $groups = db_query('SELECT nid, title_format FROM {family_group}');
    while ($data = $groups->fetchAssoc()) {
        $ancestorgroups[$data['nid']] = $data['title_format'];
    }
    (isset($node->related_group)) ? $node->related_group : $node->related_group = array();
    $form['related_groups'] = array(
        '#type' => 'select',
        '#title' => t('Ancestry Group'),
        '#default_value' => $node->related_group,
        '#options' => array(
            '' => 'None',
            'Groups' => $ancestorgroups,
        ),
    );
    //$form['body_filter']['body_field'] = node_body_field($node, $type->body_label, $type->min_word_count);
    //$form['body_filter']['format'] = filter_form($node->format); //Not sure why this goes here, but all the examples have it...
    return $form;
}

// function family_individual_form(&$node, &$param)

/**
 * Implements hook_insert().
 *  Insert All the facts and relationships
 *  Update Node and revision to replace data not in form
 *
 */
function family_location_insert($node) {
    if ($node->build || $node->street) {
        $node->title = $node->build . " " . $node->street;
    } elseif ($node->city) {
        $node->title = $node->city;
    } elseif ($node->county) {
        $node->title = $node->county;
    } elseif ($node->state_prov) {
        $node->title = $node->state_prov;
    } else {
        $node->title = $node->country;
    }
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
    $node->title_format = $node->build;
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    /* db_query("INSERT INTO {family_location} (vid, nid, title_format, building, street, city, county, state_province, country, related_group) VALUES (%d, %d, '%s',  '%s', '%s', '%s', '%s', '%s', '%s', %d)", $node->vid, $node->nid, $node->title_format, $node->build, $node->street, $node->city, $node->county, $node->state_prov, $node->country, $node->GRUP) */
    $fields = array(
        'vid' => $node->vid,
        'nid' => $node->nid
    );
    if (!empty($node->title_format))
            $fields['title_format']=$node->title_format;

    if (!empty($node->building))
            $fields['building']=$node->building;
    if (!empty($node->street))
            $fields['street']=$node->street;
    if (!empty($node->city))
            $fields['city']=$node->city;
    if (!empty($node->county))
            $fields['county']=$node->county;
    if (!empty($node->state_province))
            $fields['state_province']=$node->county;
    if (!empty($node->country))
            $fields['country']=$node->country;
    if (!empty($node->related_group))
            $fields['related_group']=$node->related_group;
        $id = db_insert('family_location')
                        ->fields($fields)
                        ->execute();
}

/**
 * Implementation of family_individual_load().
 * This function will grab all the descriptive data for an individual
 * Primary use is for filling in form data to preform an edit

 * Returns an array of additions
 */
function family_location_load(&$nodes) {
    foreach ($nodes as $i => $node) {
        $nid = $node->nid;
        $data = db_query("SELECT * FROM {family_location} WHERE nid = :nid", array(':nid' => $nid))->fetchAssoc();
        $node->title_format = $data['title_format'];
        $node->name = $data['title_format'];
        //Address
        $node->build = $data['building'];
        $node->street = $data['street'];
        $node->city = $data['city'];
        $node->county = $data['county'];
        $node->state_prov = $data['state_province'];
        $node->country = $data['country'];
        $node->related_group = $data['related_group'];
        //return ($additions);
    }
}

/**
 * Implements hook_update().
 *  Update the facts and new relationships
 *  Update Node and revision to replace data not in form
 *
 *  See family_individual_insert
 */
function family_location_update($node) {
    if ($node->build || $node->street) {
        $node->title = $node->build . " " . $node->street;
    } elseif ($node->city) {
        $node->title = $node->city;
    } elseif ($node->county) {
        $node->title = $node->county;
    } elseif ($node->state_prov) {
        $node->title = $node->state_prov;
    } else {
        $node->title = $node->country;
    }

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
    $node->title_format = $node->build;
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    /* db_query("UPDATE {family_location} SET vid='%d', title_format='%s', building='%s', street='%s', city='%s', county='%s', state_province='%s', country='%s', related_group='%d' WHERE nid='%d'", $node->vid, $node->title_format, $node->build, $node->street, $node->city, $node->county, $node->state_prov, $node->country, $node->GRUP, $node->nid) */
    db_update('family_location')
            ->fields(array(
                'vid' => $node->vid,
                'title_format' => $node->title_format,
                'building' => $node->build,
                'street' => $node->street,
                'city' => $node->city,
                'county' => $node->county,
                'state_province' => $node->state_prov,
                'country' => $node->country,
                'related_group' => $node->GRUP,
            ))
            ->condition('nid', $node->nid)
            ->execute();
}

/**
 * Implements hook_view().
 */
function family_location_view(&$node, $viewmode) {

    //  $fid = db_result(db_query("SELECT fid FROM {family_facts} WHERE nid= %d", $node->nid));
    //  $node->body = family_view_indi($node->fid) . $node->body;
    //  $node->teaser = family_view_indi($node->fid) . $node->teaser;
    // TODO Please change this theme call to use an associative array for the $variables parameter.

    $node->content['family_location_view'] = array(
        '#markup' => theme($viewmode == 'teaser' ? 'family_location_teaser' : 'family_location_body', array('node' => $node)),
        '#weight' => -1,
    );

    return $node;
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function theme_family_location_teaser($variables) {
    $node = $variables['node'];
    return family_view_loca($node->nid, '0');
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function theme_family_location_body($variables) {
    $node = $variables['node'];
    return family_view_loca($node->nid, '1');
}

/**
 * Implements hook_delete().
 */
function family_location_delete(&$node) {
    //  $ind_fid = db_result(db_query("SELECT fid FROM {family_facts} WHERE nid = %d", $node->nid));
    //family_remove_fact($node->nid);
    // TODO Please review the conversion of this statement to the D7 database API syntax.
    /* db_query("DELETE FROM {family_location} WHERE nid=%d", $node->nid) */
    db_delete('family_location')
            ->condition('nid', $node->nid)
            ->execute();
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_view_loca($nid, $type) {

    $data = db_query("SELECT * FROM {family_location} WHERE nid = :nid", array(':nid' => $nid))->fetchAssoc();
    $content = "<strong>" . family_make_link($nid, ($data['building'] . " " . $data['street'])) . "</strong><br>";
    $list = array();
    $list[] = 'building : ' . $data['building'];
    $list[] = 'street : ' . $data['street'];
    $list[] = 'city : ' . $data['city'];
    $list[] = 'county : ' . $data['county'];
    $list[] = 'State/Province : ' . $data['state_province'];
    $list[] = 'country : ' . $data['country'];
    $content .= theme('item_list', array('items' => $list));
    $content .= "</P><p>&nbsp;</p>";
    //Asociated group
    $asocid = $data['related_group'];
    if ($asocid) {
        $content .= '<p>Family group asociated with here:</br>';
        $content .= '<table width=100% border=1><tr><td>Name</td><td>Gender</td><td>Birth Date</td></tr>';
        $fam = db_fetch_array(db_query("SELECT parent1, parent2 FROM {family_group} WHERE nid = :nid", array(':nid' => $asocid)));
        $asoc = db_query("SELECT * FROM {family_individual} WHERE nid = :nid OR nid = :nid OR ancestor_group = :ancestor_group", array(':nid' => $fam['parent1'], ':nid' => $fam['parent2'], ':ancestor_group' => $asocid));
        while ($child = db_fetch_array($asoc)) {
            $content .= "<tr><td>" . family_make_name($child['nid'], TRUE) . "</td><td>" . $child['gender'] . "</td><td>" . $child['birthdate'] . "</td></tr>";
        }
        $content .= "</table>";
    }
    //Born here
    $born = db_query("SELECT * FROM {family_individual} WHERE birthplace = :birthplace", array(':birthplace' => $nid));
    if ($born) {
        $content .= '<p>Individuals born here:</br>';
        $content .= '<table width=100% border=1><tr><td>Name</td><td>Gender</td><td>Birth Date</td></tr>';
        while ($child = $born->fetchAssoc()) {
            $content .= "<tr><td>" . family_make_name($child['nid'], TRUE) . "</td><td>" . $child['gender'] . "</td><td>" . $child['birthdate'] . "</td></tr>";
        }
        $content .= "</table>";
    }
    //died here
    $death = db_query("SELECT * FROM {family_individual} WHERE deathplace = :deathplace", array(':deathplace' => $nid));
    if ($death) {
        $content .= '<p>Individuals died here:</br>';
        $content .= '<table width=100% border=1><tr><td>Name</td><td>Gender</td><td>Death Date</td></tr>';
        while ($child = $death->fetchAssoc()) {
            $content .= "<tr><td>" . family_make_name($child['nid'], TRUE) . "</td><td>" . $child['gender'] . "</td><td>" . $child['deathdate'] . "</td></tr>";
        }
        $content .= "</table>";
    }
    //married here
    $marr = db_query("SELECT * FROM {family_group} WHERE marr_plac = :marr_plac", array(':marr_plac' => $nid));
    if ($marr) {
        $content .= '<p>Groups married here:</br>';
        $content .= '<table width=100% border=1><tr><td>Name</td><td>Marriage Date</td></tr>';
        while ($child = $marr->fetchAssoc()) {
            $content .= "<tr><td>" . $child['title_format'] . "</td><td>" . $child['marr_date'] . "</td></tr>";
        }
        $content .= "</table>";
    }
    //Divorced here
    $div = db_query("SELECT * FROM {family_group} WHERE div_plac = :div_plac", array(':div_plac' => $nid));
    if ($div) {
        $content .= '<p>Groups divorced here:</br>';
        $content .= '<table width=100% border=1><tr><td>Name</td><td>Divorce Date</td></tr>';
        while ($child = $div->fetchAssoc()) {
            $content .= "<tr><td>" . $child['title_format'] . "</td><td>" . $child['div_date'] . "</td></tr>";
        }
        $content .= "</table>";
    }
    return $content;
}