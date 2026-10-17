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


		
<button class="button <?php echo $this->scope["inputClass"];?> <?php echo $this->scope["class"];?>" type="<?php echo (($tmp = (isset($this->scope["type"]) ? $this->scope["type"] : null))===null||$tmp==='' ? 'button' : $tmp);?>" id="<?php echo $this->scope["htmlId"];?>" <?php if ((isset($this->scope["disabled"]) ? $this->scope["disabled"] : null)) {
?>disabled="disabled"<?php 
}?> <?php if ((isset($this->scope["onclick"]) ? $this->scope["onclick"] : null)) {
?>onclick="<?php echo $this->scope["onclick"];
if ((isset($this->scope["disable"]) ? $this->scope["disable"] : null)) {
?>;this.onclick=''<?php 
}?>;this.blur()"<?php 
}?> title="<?php if ((isset($this->scope["title"]) ? $this->scope["title"] : null)) {

echo TodoyuLabelManager::getLabel((isset($this->scope["title"]) ? $this->scope["title"] : null), null);

}
else {

echo TodoyuLabelManager::getLabel((isset($this->scope["text"]) ? $this->scope["text"] : null), null);

}?>">
	<?php if (! (isset($this->scope["noIcon"]) ? $this->scope["noIcon"] : null)) {
?>
		<span class="icon"></span>
	<?php 
}?>

	<span class="label"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["text"]) ? $this->scope["text"] : null), null);?></span>
</button>


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