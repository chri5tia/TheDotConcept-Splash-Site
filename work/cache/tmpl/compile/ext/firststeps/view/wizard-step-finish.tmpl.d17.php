<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?>
<?php echo Dwoo_Plugin_Button($this, "firststeps.ext.wizard.finish.closeWizard", "Todoyu.Ext.firststeps.disableWizardAndClose()", "clear", '', '', '', false, false, '');
 /* end template body */
return $this->buffer . ob_get_clean();
?>