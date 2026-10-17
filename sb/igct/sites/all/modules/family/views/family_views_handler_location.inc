<?php
// $Id$

class family_views_handler_location extends views_handler_field {
  function render($values) {
    $value = $values->{$this->field_alias};
    $value = family_make_location($value, FALSE);
    return check_plain($value);
  }
}
