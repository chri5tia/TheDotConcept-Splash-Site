<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
echo Todoyu::render('core/view/contentMessage.tmpl', array('labels'=>explode('|', 'portal.ext.selection.noFiltersetsSelected'),'class'=>'','content'=>''));
 /* end template body */
return $this->buffer . ob_get_clean();
?>