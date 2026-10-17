<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
'';// checking for modification in file:core/view/form/FormElement.tmpl
if (!("1354320124" == filemtime('core/view/form/FormElement.tmpl'))) { ob_end_clean(); return false; };?><div id="formElement-<?php echo $this->scope["htmlId"];?>" class="fElement <?php echo $this->scope["containerClass"];?> <?php echo $this->scope["class"];?> <?php if ((isset($this->scope["odd"]) ? $this->scope["odd"] : null)) {
?>odd<?php 
}
else {
?>even<?php 
}?> <?php if ((isset($this->scope["error"]) ? $this->scope["error"] : null)) {
?>error<?php 
}?> <?php if ((isset($this->scope["wizard"]) ? $this->scope["wizard"] : null)) {
?>hasWizard<?php 
}?>" <?php if ((isset($this->scope["style"]) ? $this->scope["style"] : null)) {
?>style="<?php echo $this->scope["style"];?>"<?php 
}?>>
	<div id="formElement-<?php echo $this->scope["htmlId"];?>-labelbox" class="fLabel <?php if ((isset($this->scope["required"]) ? $this->scope["required"] : null)) {
?>required<?php 
}?> <?php if ((isset($this->scope["error"]) ? $this->scope["error"] : null)) {
?>error<?php 
}?>">
		<label for="<?php echo $this->scope["htmlId"];?>" id="<?php echo $this->scope["htmlId"];?>-label"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["label"]) ? $this->scope["label"] : null), null);?></label>
		<?php if ((isset($this->scope["required"]) ? $this->scope["required"] : null)) {
?><span class="required">*</span><?php 
}?>

	</div>
	<div id="formElement-<?php echo $this->scope["htmlId"];?>-inputbox" class="fField<?php if ((isset($this->scope["wizard"]) ? $this->scope["wizard"] : null) !== false) {
?> hasWizard<?php 
}?>">

		<?php if ((isset($this->scope["textBeforeField"]) ? $this->scope["textBeforeField"] : null)) {
?>
			<span class="textBeforeField"><?php echo $this->scope["textBeforeField"];?></span>
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
		<input class="<?php echo $this->scope["inputClass"];?> <?php echo $this->scope["class"];?>" type="radio" name="<?php echo $this->scope["htmlName"];?>" id="<?php echo $this->scope["htmlId"];?>-<?php echo $this->scope["option"]["value"];?>" value="<?php echo htmlentities((isset($this->scope["option"]["value"]) ? $this->scope["option"]["value"]:null), ENT_QUOTES, 'UTF-8', false);?>"<?php if ((isset($this->scope["option"]["value"]) ? $this->scope["option"]["value"]:null) == (isset($this->scope["value"]) ? $this->scope["value"] : null)) {
?> checked="checked"<?php 
}
if ((isset($this->scope["option"]["disabled"]) ? $this->scope["option"]["disabled"]:null)) {
?> disabled="disabled"<?php 
}?> <?php echo $this->scope["extraAttributes"];?> />
		<label class="<?php echo $this->scope["class"];?>" for="<?php echo $this->scope["htmlId"];?>-<?php echo $this->scope["option"]["value"];?>"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["option"]["label"]) ? $this->scope["option"]["label"]:null), null);?></label>
	<?php 
/* -- foreach end output */
	}
}?>


		<?php if ((isset($this->scope["textAfterField"]) ? $this->scope["textAfterField"] : null)) {
?>
			<span class="textAfterField"><?php echo $this->scope["textAfterField"];?></span>
		<?php 
}?>


		<?php if ((isset($this->scope["wizard"]) ? $this->scope["wizard"] : null) !== false) {
?>
			<span title="<?php echo TodoyuLabelManager::getLabel((isset($this->scope["wizard"]["title"]) ? $this->scope["wizard"]["title"]:null), null);?>" class="wizardIcon createWizard<?php echo ucfirst((isset($this->scope["wizard"]["name"]) ? $this->scope["wizard"]["name"]:null));?>" onclick='Todoyu.Form.openCreateWizard("<?php echo $this->scope["htmlId"];?>", <?php echo json_encode((isset($this->scope["wizard"]["jsParams"]) ? $this->scope["wizard"]["jsParams"]:null));?>)'></span>
			<div class="clear"></div>
		<?php 
}?>


		<?php if ((isset($this->scope["validateLive"]) ? $this->scope["validateLive"] : null)) {
?>
			<?php echo $this->scope["validateLive"];?>

		<?php 
}?>


		<?php if ((isset($this->scope["error"]) ? $this->scope["error"] : null) && (isset($this->scope["errorMessage"]) ? $this->scope["errorMessage"] : null)) {
?>
			<div class="errorMessage"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["errorMessage"]) ? $this->scope["errorMessage"] : null), null);?></div>
		<?php 
}?>

		<div class="clear"><!-- --></div>
	</div>
	<div class="fClear"><!-- --></div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>