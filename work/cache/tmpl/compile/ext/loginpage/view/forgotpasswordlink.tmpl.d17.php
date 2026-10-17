<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><a href="#" onclick="Todoyu.Ext.loginpage.loadForgotPasswordForm()"><?php echo TodoyuLabelManager::getLabel('LLL:loginpage.ext.forgotpassword', null);?></a><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>