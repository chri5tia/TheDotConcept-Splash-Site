<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ;
if (empty($this->scope["multiple"]) && ! (isset($this->scope["noPleaseSelect"]) ? $this->scope["noPleaseSelect"] : null) && (isset($this->scope["size"]) ? $this->scope["size"] : null) == 1) {
?>
	<option value="0"><?php if ((isset($this->scope["pleaseSelectLabel"]) ? $this->scope["pleaseSelectLabel"] : null)) {

echo TodoyuLabelManager::getLabel((isset($this->scope["pleaseSelectLabel"]) ? $this->scope["pleaseSelectLabel"] : null), null);

}
else {

echo TodoyuLabelManager::getLabel('core.form.select.pleaseSelect', null);

}?></option>
	<?php if (sizeof((isset($this->scope["options"]) ? $this->scope["options"] : null))) {
?>
	<option value="0" disabled="disabled">---------------------------</option>
	<?php 
}?>

<?php 
}?>

<?php 
$_fh0_data = (isset($this->scope["options"]) ? $this->scope["options"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['option'])
	{
/* -- foreach start output */
?>
	<option value="<?php echo htmlentities((isset($this->scope["option"]["value"]) ? $this->scope["option"]["value"]:null), ENT_QUOTES, 'UTF-8', false);?>" class="<?php echo $this->scope["option"]["class"];?> <?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>" <?php if (in_array((isset($this->scope["option"]["value"]) ? $this->scope["option"]["value"]:null), (isset($this->scope["value"]) ? $this->scope["value"] : null)) && ! (isset($this->scope["option"]["disabled"]) ? $this->scope["option"]["disabled"]:null)) {
?> selected="selected"<?php 
}
if ((isset($this->scope["option"]["disabled"]) ? $this->scope["option"]["disabled"]:null)) {
?> disabled="disabled"<?php 
}?>><?php echo htmlentities(TodoyuLabelManager::getLabel((isset($this->scope["option"]["label"]) ? $this->scope["option"]["label"]:null), null), ENT_QUOTES, 'UTF-8', false);?></option>
<?php 
/* -- foreach end output */
	}
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>