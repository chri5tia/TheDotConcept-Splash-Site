<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
echo Todoyu::render('core/view/contentMessage.tmpl', array('labels'=>explode('|', "sysmanager.ext.rights.noRolesSelected"),'class'=>'','content'=>''));
 /* end template body */
return $this->buffer . ob_get_clean();
?>