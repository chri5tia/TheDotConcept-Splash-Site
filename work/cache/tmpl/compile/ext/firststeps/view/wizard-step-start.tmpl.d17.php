<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><div style="width:1px;height:220px"></div>
<p><?php echo TodoyuLabelManager::getLabel('firststeps.ext.wizard.start.dontUseWizard', null);?>. <br />
<?php echo TodoyuLabelManager::getLabel('firststeps.ext.wizard.start.reactivateInAdmin', null);?></p>
<?php echo Dwoo_Plugin_Button($this, "firststeps.ext.wizard.start.disableAssistant", "Todoyu.Ext.firststeps.disableWizardAndClose()", "disableWizard", '', '', '', false, false, '');?>

<br /><br />
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>