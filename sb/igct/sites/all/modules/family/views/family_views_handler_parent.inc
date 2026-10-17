<?php
// $Id$

class family_views_handler_parent extends views_handler_field {
  function render($values) {
    $value = $values->{$this->field_alias};
    $value = family_make_name($value, FALSE, FALSE);
    return check_plain($value);
  }
}
