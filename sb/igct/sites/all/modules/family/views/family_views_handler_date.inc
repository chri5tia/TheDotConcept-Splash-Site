<?php
// $Id$

class family_views_handler_date extends views_handler_field {
  function render($values) {
    $value = $values->{$this->field_alias};
    $value = family_check_date($value, $values->nid);
    return check_plain($value);
  }
}
