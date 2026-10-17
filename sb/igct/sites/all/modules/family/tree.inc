<?php
// $Id$

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
global $called;
$called = 0;

function family_tree_get_info($nidtoget) {
    $data = db_query('SELECT * FROM {family_individual} WHERE nid = :nid', array(':nid' => $nidtoget))->fetchAssoc();
    $output = array();
    $output['nid'] = $nidtoget;
    $output['name'] = family_make_name($nidtoget, TRUE);
    //if (($output['NAME'])&&$output['NAME']!='Private') {
    $output['birth'] = $data['birthdate'];
    $output['death'] = $data['deathdate'];
    //}
    return $output;
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_tree_header($nid, $length = 3, $detail='') {
    $treecontent = '<p>';
    $treecontent .= t('This page is still under development so not all features are working properly .');
    $treecontent .= '</p><p>';
    $treecontent .= t('Please choose a person and a tree type:');
    $treecontent .= '</p>';
    $treecontent .= '<form method="GET" action="#">';
    //$content .= "<select name='per'>";
    //$results = db_query("SELECT nid FROM {family_individual} ");
    //    while ($indi = db_fetch_array($results)) {
    //if (family_check_privacy($indi['nid'])) {
    //$content .= "<option value='". $indi['nid']."' ";
    //if ($indi['nid']==$nid) {
    //$content .= "SELECTED";
    //}
    //$content .= ">". family_make_name($indi['nid'], FALSE)."</option>";
    //    }
    //    }
    //$content .= "</select><br/>";
    $treecontent .= t('Generations: ');
    $treecontent .= '<select name="len">';
    for ($i = 1; $i <= 3; $i++) {
        $treecontent .= '<option value="' . $i . '"';
        if ($i == $length) {
            $treecontent .= ' SELECTED';
        }
        $treecontent .= '>' . ($i + 1) . '</option>';
    }
    $treecontent .= '</select><br/>';
    $treecontent .= t('Level of Detail: ');
    $treecontent .= '<select name="det">';
    for ($i = 1; $i <= 2; $i++) {
        $treecontent .= '<option value="' . $i . '"';
        if ($i == $detail) {
            $treecontent .= ' SELECTED';
        }
        $treecontent .= '>' . $i . '</option>';
    }
    $treecontent .= '</select><br/><input type="submit" value="Submit"></form>';

    return $treecontent;
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_view_tree_asc($nid = 0) {
    $personnode = $nid;
    if (isset($_GET['len'])) {
        $length = $_GET['len'];
    }
    if (isset($_GET['det'])) {
        $detail = $_GET['det'];
    } else {
        $detail = null;
    }
    $cellwidth = 120;
    if (!isset($length)) {
        $length = 3;
    }
    $treecontent = '';


    $treecontent .= family_tree_header($personnode, $length, $detail);
    //Get Data
    $treearray[0][1] = family_tree_get_info($nid);

    for ($level = 1; $level <= $length; $level++) {
        for ($familyno = 1; $familyno <= pow(2, $level); $familyno++) {
//            echo "<pre>";
//            print_r($treearray);
//            echo "</pre>";
//            echo "<pre>";
//            print_r((ceil($familyno / 2)));
//            echo "</pre>";
//            print "------------------";
            if (isset($treearray[($level - 1)][(ceil($familyno / 2))])) {
                $childid = $treearray[($level - 1)][(ceil($familyno / 2))]['nid'];
                $fam = db_query("SELECT g.* FROM {family_group} g, {family_individual} i WHERE (g.nid = i.ancestor_group AND i.nid = :inid)", array(':inid' => $childid))->fetchAssoc();

                if (is_array($fam)) {
                    $father = $fam['parent1'];

                    if ($father) {
                        $treearray[$level][$familyno] = family_tree_get_info($father);
                    }
                    $familyno++;
                    $mother = $fam['parent2'];
                    if ($mother) {
                        $treearray[$level][$familyno] = family_tree_get_info($mother);
                    }
                }
            }
        }
    }
    //Output data
    $toprowcells = pow(2, $length);
    $totalwidth = $toprowcells * $cellwidth;
    $treecontent .= ' <p align=center><div style="width: 100%;overflow: auto;"></br>

<p align=center><table><tr><td width=50%></td><td> <table width=' . $totalwidth . 'px  valign=center CELLPADDING=0 cellspacing=0>
';
    for ($level = $length; $level >= 0; $level--) {
        $treecontent .= ' <tr>
';
        for ($familyno = 1; $familyno <= pow(2, $level); $familyno++) {
            $treecontent .= '<td width=' . ($totalwidth / pow(2, $level)) . 'px colspan=' . ($toprowcells / pow(2, $level)) . '><p align=center>
';
            if ($level != $length) {
                // previous method for width of image '. ((100/(pow(2, $level-1)))-(2/$level)) .'
                $treecontent .= ' <img src="' . url(drupal_get_path('module', 'family') . '/img/asctree.png', array('absolute' => TRUE)) . '" width=' . ($totalwidth / pow(2, $level)) . 'px height=20px></br>';
            }
            if (isset($treearray[$level][$familyno]['name'])) {
                $treecontent .= $treearray[$level][$familyno]['name'];
                if ($detail == 2 && $treearray[$level][$familyno]['name'] != 'Private') {
                    $treecontent .= ' <br/><font size=-1>b. ' . $treearray[$level][$familyno]['birth'] . '<br/>d. ' . $treearray[$level][$familyno]['death'] . '
</font>';
                }
            } else {
                $treecontent .= ' Unknown';
            }
            $treecontent .= '
</td>
';
        }
        $treecontent .= ' </tr>
';
    }
    $treecontent .= ' </table></td><td width=50%></td></tr></table></div>';
    $treecontent .= "</p>";
    return $treecontent;
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_view_tree_desc($nid = 0) {
    $personnode = $nid;
    if (isset($_GET['len'])) {
        $length = $_GET['len'];
    }
    (isset($_GET['det'])) ? $detail = $_GET['det'] : $detail = null;
    $cellwidth = 120;
    if (!isset($length)) {
        $length = 3;
    }
    if (isset($treecontent)) {
        $treecontent .= family_tree_header($personnode, $length, $detail);
    } else {
        $treecontent = family_tree_header($personnode, $length, $detail);
    }
    $nid = $personnode;
    //$content  .= ' <p>The descendancy graphs are yet to be completed; hence it probably wont work<p>';
    //Get Data
    $treearray[0][1] = family_tree_get_info($nid);

    $treearray[0][0] = 1;
    for ($level = 1; $level <= $length; $level++) {
        $treearray[$level][0] = 0;
        $familyno = 1;
        for ($parentno = 1; $parentno <= $treearray[$level - 1][0]; $parentno++) {
            //get child data for $treearray[$level-1][$parentno]
            if (!isset($treearray[$level - 1][$parentno]['blank']) || $treearray[$level - 1][$parentno]['blank'] == FALSE) {
//        $families = db_query("SELECT * FROM {family_group} WHERE ((parent1='%d' AND parent1<>'') OR (parent2='%d' AND parent2<>''))", $treearray[$level-1][$parentno]['nid'], $treearray[$level-1][$parentno]['nid']);

                $families = db_query("SELECT * FROM {family_group} WHERE ((parent1 = :parent1 AND parent1 <> '') OR (parent2 = :parent2 AND parent2 <> ''))", array(':parent1' => $treearray[$level - 1][$parentno]['nid'], ':parent2' => $treearray[$level - 1][$parentno]['nid']));


                if ($families) {
                    while ($family = $families->fetchAssoc()) {
                        $children = db_query("SELECT * FROM {family_individual} WHERE ancestor_group = :ancestor_group", array(':ancestor_group' => $family['nid']));
                        if ($children) {
                            while ($child = $children->fetchAssoc()) {
                                $treearray[$level][0]++;
                                $treearray[$level][$familyno] = family_tree_get_info($child['nid']);
                                $treearray[$level][$familyno]['parent'] = $parentno;
                                $treearray[$level][$familyno]['blank'] = FALSE;
                                $familyno++;
                            }
                        } else {
                            $treearray[$level][0]++;
                            $treearray[$level][$familyno]['blank'] = TRUE;
                            $treearray[$level][$familyno]['parent'] = $parentno;
                            $familyno++;
                        }
                    }
                    if (!($families)) {
                        $treearray[$level][0]++;
                        $treearray[$level][$familyno]['blank'] = TRUE;
                        $treearray[$level][$familyno]['parent'] = $parentno;
                        $familyno++;
                    }
                } else {
                    $treearray[$level][0]++;
                    $treearray[$level][$familyno]['blank'] = TRUE;
                    $treearray[$level][$familyno]['parent'] = $parentno;
                    $familyno++;
                }
            } else {
                $treearray[$level][0]++;
                $treearray[$level][$familyno]['blank'] = TRUE;
                $treearray[$level][$familyno]['parent'] = $parentno;
                $familyno++;
            }
        }
    }
    for ($familyno = 1; $familyno <= $treearray[$length][0]; $familyno++) {
        $treearray[$length][$familyno]['width'] = 1;
    }
    for ($level = $length; $level >= 1; $level--) {
        //echo $treearray[$level][0]."</br>";
        for ($familyno = 1; $familyno <= $treearray[$level][0]; $familyno++) {
            (isset($treearray[$level][$familyno]['width'])) ? $width = $treearray[$level][$familyno]['width'] : $width = 0;
            (isset($treearray[$level - 1][$treearray[$level][$familyno]['parent']]['width'])) ? $width2 = $treearray[$level - 1][$treearray[$level][$familyno]['parent']]['width'] : $width2 = 0;
            $width2 += $width;
        }
    }

    //Output Data
    $toprowcells = $treearray[$length][0];
    $totalwidth = $toprowcells * $cellwidth;
    $treecontent .= ' <p align=center><div style="width: 100%;overflow: auto;">

<p align=center><table width=' . $totalwidth . '><tr><td width=50%><P>&nbsp;</td><td> <table width=' . $totalwidth . 'px  valign=center CELLPADDING=0 cellspacing=0 border=0>
';
    for ($level = 0; $level <= $length; $level++) {
        $treecontent .= "<tr>";
        for ($familyno = 1; $familyno <= $treearray[$level][0]; $familyno++) {
            //
            (isset($treearray[$level][$familyno]['width'])) ? $tdwidth = $treearray[$level][$familyno]['width'] : $tdwidth = 1;
            $treecontent .= "<td width=" . ($cellwidth * $tdwidth) . "px  height=10px cellpadding=0 CELLSPACING=0  border=0 colspan=" . $tdwidth;

            $treecontent .= ">
<p align=center>
";
            if ((!isset($treearray[$level][$familyno]['blank']) || $treearray[$level][$familyno]['blank'] == FALSE) && $level != 0) {
                if (isset($treearray[$level][$familyno + 1]) && ($treearray[$level][$familyno - 1]['parent'] == $treearray[$level][$familyno + 1]['parent'])) {
                    $treecontent .= " <img src='" . url(drupal_get_path('module', 'family') . "/img/center.png", array('absolute' => TRUE)) . "' width=100% height=10px padding=0 margin=0></br>";
                } elseif ($treearray[$level][$familyno]['parent'] == $treearray[$level][$familyno - 1]['parent']) {
                    //$treecontent .= " background='. ./". drupal_get_path('module', 'family')."/img/right.png' STYLE='background-width: 100%;background-repeat: no-repeat;'";
                    $treecontent .= " <img src='" . url(drupal_get_path('module', 'family') . "/img/right.png", array('absolute' => TRUE)) . "' width=100% height=10px padding=0 margin=0></br>";
                } elseif ($treearray[$level][$familyno]['parent'] == $treearray[$level][$familyno + 1]['parent']) {
                    //$treecontent .= " background='. ./". drupal_get_path('module', 'family')."/img/left.png' STYLE='background-width: 100%;background-repeat: no-repeat;'";
                    $treecontent .= " <img src='" . url(drupal_get_path('module', 'family') . "/img/left.png", array('absolute' => TRUE)) . "' width=100% height=10px padding=0 margin=0></br>";
                } else {

                    $treecontent .= " <img src='" . url(drupal_get_path('module', 'family') . "/img/single.png", array('absolute' => TRUE)) . "' width=100% height=10px padding=0 margin=0></br>";
                }
            }
            $treecontent .= "</p></td>";
        }
        $treecontent .= "</tr>
<tr>";
        for ($familyno = 1; $familyno <= $treearray[$level][0]; $familyno++) {
            //
            (isset($treearray[$level][$familyno]['width'])) ? $tdwidth = $treearray[$level][$familyno]['width'] : $tdwidth = 1;
            $treecontent .= "<td width=" . ($cellwidth * $tdwidth) . "px colspan=" . $tdwidth;

            $treecontent .= " cellpadding=0 CELLSPACING=0  border=0>
<p align=center>
";
            //$treecontent  .= ' <img src=". ./'. drupal_get_path('module', 'family') .'/white.jpg" width=100% height=1px>';
            if (!isset($treearray[$level][$familyno]['blank']) || $treearray[$level][$familyno]['blank'] == FALSE) {

                $treecontent .= $treearray[$level][$familyno]['name'];
                if ($detail == 2 && $treearray[$level][$familyno]['name'] != 'Private') {
                    $treecontent .= ' <br/><font size=-1>b. ' . $treearray[$level][$familyno]['birth'] . '<br/>d. ' . $treearray[$level][$familyno]['death'] . '
</font>
';
                }
            } else {
                $treecontent .= "&nbsp;";
            }
            $treecontent .= "</p></td>
";
        }
        $treecontent .= "</tr>
";
    }
    $treecontent .= "</table></td><td width=50%><p>&nbsp;</td></tr></table></div>
";
    return $treecontent;
}
