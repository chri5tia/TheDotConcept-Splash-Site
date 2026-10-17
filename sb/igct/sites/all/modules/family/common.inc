<?php
// $Id$

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_changeDateFormat($oldFormat) {

  $oldFormat = str_replace('AFT', '', $oldFormat);
  $oldFormat = str_replace('ABT', '', $oldFormat);
  $oldFormat = trim($oldFormat);
  $dateData = explode(" ", $oldFormat);
  if (is_array($dateData) && isset($dateData[0]) && isset($dateData[1]) && isset($dateData[2])) {
    $day = $dateData[0];
    $year = $dateData[2];

    switch ($dateData[1]) {

      case "Jan":
      case "jan":
      case "JAN":
        $month = "01";
        break;
      case "feb":
      case "Feb":
      case "FEB":
        $month = "02";
        break;
      case "mar":
      case "Mar":
      case "MAR":
        $month = "03";
        break;
      case "apr":
      case "Apr":
      case "APR":
        $month = "04";
        break;
      case "may":
      case "May":
      case "MAY":
        $month = "05";
        break;
      case "jun":
      case "Jun":
      case "JUN":
        $month = "06";
        break;
      case "jul":
      case "Jul":
      case "JUL":
        $month = "07";
        break;
      case "aug":
      case "Aug":
      case "AUG":
        $month = "08";
        break;
      case "sep":
      case "Sep":
      case "SEP":
        $month = "09";
        break;
      case "oct":
      case "Oct":
      case "OCT":
        $month = "10";
        break;
      case "nov":
      case "Nov":
      case "NOV":
        $month = "11";
        break;
      case "dec":
      case "Dec":
      case "DEC":
        $month = "12";
        break;
    }
    $newDate = "$year-$month-$day";
    return $newDate;
  }
  else {
    return NULL;
  }
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_make_link($nid, $text) {
  $output = l($text, "node/$nid");
  return $output;
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_make_name($nid, $link = TRUE, $middle = TRUE) {
  if ($nid) {
    if (family_check_privacy($nid)) {
      $name = db_query("SELECT firstname, middlename, lastname FROM {family_individual} WHERE nid = :nid", array(':nid' => $nid))->fetchAssoc();
      if (is_array($name)) {
          
        $surname = $name['lastname'];
        $middlename = $name['middlename'];
        $firstname = $name['firstname'];
        if (empty($surname)) {
            
          $surname = "No data";
        }
        if ((!empty($middlename)) && $middle == TRUE) {
          $middlename .= " ";
        }
        if (empty($firstname)) {
          $firstname = "No data";
        }

        $name = $firstname . ' ' . $middlename . $surname;
      }
      else {
        $name = "No data";
      }

      if ($link == TRUE) {
          'entred here';
        return family_make_link($nid, $name);
      }
      else {
          'entred';
        return $name;
      }
    }
    else {
        'entred private';
      return 'Private';
    }
  }
  else {
      'entred no data';
    return 'No data';
  }
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function family_check_date($value, $nid) {
  if (family_check_privacy($nid)) {
    if ($value == '' || $value == '0000-00-00 00:00:00') {
      $value = "None";
    }
    else {
      $value = explode(' ', $value);
      $value = $value[0];
    }
    return $value;
  }
  else {
    return "Private";
  }
  return "Private";
}

