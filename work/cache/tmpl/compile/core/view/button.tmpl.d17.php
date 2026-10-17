<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><button type="<?php echo (($tmp = (isset($this->scope["type"]) ? $this->scope["type"] : null))===null||$tmp==='' ? 'button' : $tmp);?>" <?php if ((isset($this->scope["id"]) ? $this->scope["id"] : null)) {
?>id="<?php echo $this->scope["id"];?>"<?php 
}?> class="button <?php echo $this->scope["class"];?>" onclick="<?php echo $this->scope["onclick"];
if ((isset($this->scope["disable"]) ? $this->scope["disable"] : null)) {
?>;this.disabled='disabled'<?php 
}?>;this.blur()" title="<?php if ((isset($this->scope["title"]) ? $this->scope["title"] : null)) {

echo TodoyuLabelManager::getLabel((isset($this->scope["title"]) ? $this->scope["title"] : null), null);

}
else {

echo TodoyuLabelManager::getLabel((isset($this->scope["label"]) ? $this->scope["label"] : null), null);

}?>" <?php if ((isset($this->scope["disabled"]) ? $this->scope["disabled"] : null)) {
?>disabled="disabled"<?php 
}
if ((isset($this->scope["style"]) ? $this->scope["style"] : null)) {
?> style="<?php echo $this->scope["style"];?>"<?php 
}?>>
	<span class="icon"></span>
	<?php if ((isset($this->scope["label"]) ? $this->scope["label"] : null)) {
?><span class="label"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["label"]) ? $this->scope["label"] : null), null);?></span><?php 
}?>

</button><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>