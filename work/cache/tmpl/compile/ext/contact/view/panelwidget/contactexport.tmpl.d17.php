<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><p class="instructiontext">
	<?php echo TodoyuLabelManager::getLabel((isset($this->scope["instructionText"]) ? $this->scope["instructionText"] : null), null);?>

</p>

<?php echo Dwoo_Plugin_Button($this, "".(isset($this->scope["buttonText"]) ? $this->scope["buttonText"] : null)."", "Todoyu.Ext.contact.PanelWidget.ContactExport.exportResults()", "exportCsv ".(isset($this->scope["contactType"]) ? $this->scope["contactType"] : null)."", "export-".(isset($this->scope["contactType"]) ? $this->scope["contactType"] : null)."", '', '', false, false, '');
 /* end template body */
return $this->buffer . ob_get_clean();
?>