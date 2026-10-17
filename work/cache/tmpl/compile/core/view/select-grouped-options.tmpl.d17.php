<?php
/* template head */
if (function_exists('Dwoo_Plugin_unsetArrayValue')===false)
	$this->getLoader()->loadPlugin('unsetArrayValue');
/* end template head */ ob_start(); /* template body */ ;
if (! (isset($this->scope["multiple"]) ? $this->scope["multiple"] : null) && ! (isset($this->scope["noPleaseSelect"]) ? $this->scope["noPleaseSelect"] : null)) {
?>
		<option value="0"><?php if ((isset($this->scope["pleaseSelectLabel"]) ? $this->scope["pleaseSelectLabel"] : null)) {

echo TodoyuLabelManager::getLabel((isset($this->scope["pleaseSelectLabel"]) ? $this->scope["pleaseSelectLabel"] : null), null);

}
else {

echo TodoyuLabelManager::getLabel('core.form.select.pleaseSelect', null);

}?></option>
		<option value="0" disabled="disabled">---------------------------</option>
<?php 
}?>

<?php 
$_fh1_data = (isset($this->scope["options"]) ? $this->scope["options"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['label']=>$this->scope['group'])
	{
/* -- foreach start output */
?>
	<?php if ((isset($this->scope["label"]) ? $this->scope["label"] : null) != "none") {
?>
		<optgroup label="<?php echo TodoyuLabelManager::getLabel((isset($this->scope["label"]) ? $this->scope["label"] : null), null);?>">
	<?php 
}?>

	<?php 
$_fh0_data = (isset($this->scope["group"]) ? $this->scope["group"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['option'])
	{
/* -- foreach start output */
?>
		<?php $this->scope["isSelected"]=false?>

		<?php if (in_array((isset($this->scope["option"]["value"]) ? $this->scope["option"]["value"]:null), (isset($this->scope["value"]) ? $this->scope["value"] : null)) && ! (isset($this->scope["option"]["disabled"]) ? $this->scope["option"]["disabled"]:null)) {
?>
			<?php $this->scope["isSelected"]=true?>

			<?php $this->scope["value"]=Dwoo_Plugin_unsetArrayValue($this, (isset($this->scope["value"]) ? $this->scope["value"] : null), (isset($this->scope["option"]["value"]) ? $this->scope["option"]["value"]:null))?>

		<?php 
}?>

		<option value="<?php echo htmlentities((isset($this->scope["option"]["value"]) ? $this->scope["option"]["value"]:null), ENT_QUOTES, 'UTF-8', false);?>" <?php if ((isset($this->scope["option"]["class"]) ? $this->scope["option"]["class"]:null)) {
?>class="<?php echo $this->scope["option"]["class"];?>"<?php 
}?> <?php if ((isset($this->scope["isSelected"]) ? $this->scope["isSelected"] : null)) {
?> selected="selected"<?php 
}?> <?php if ((isset($this->scope["option"]["disabled"]) ? $this->scope["option"]["disabled"]:null)) {
?>disabled="disabled"<?php 
}?>>
			<?php echo TodoyuLabelManager::getLabel((isset($this->scope["option"]["label"]) ? $this->scope["option"]["label"]:null), null);?>

		</option>
	<?php 
/* -- foreach end output */
	}
}?>

	<?php if ((isset($this->scope["label"]) ? $this->scope["label"] : null) != "none") {
?>
		</optgroup>
	<?php 
}?>

<?php 
/* -- foreach end output */
	}
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>