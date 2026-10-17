<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><fieldset id="<?php echo $this->scope["htmlId"];?>" class="<?php echo $this->scope["name"];?> <?php echo $this->scope["class"];?>">
<?php if ((isset($this->scope["legend"]) ? $this->scope["legend"] : null)) {
?>
	<legend id="<?php echo $this->scope["htmlId"];?>-legend"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["legend"]) ? $this->scope["legend"] : null), null);?></legend>
<?php 
}?>

	<?php echo $this->scope["content"];?>

</fieldset>
<div class="fieldset-clear" id="fieldset-clear-<?php echo $this->scope["name"];?>"> </div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>