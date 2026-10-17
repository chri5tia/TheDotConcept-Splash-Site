<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><select name="<?php echo $this->scope["htmlName"];?>" id="<?php echo $this->scope["htmlId"];?>" <?php if ((isset($this->scope["class"]) ? $this->scope["class"] : null) != '') {
?>class="<?php echo $this->scope["class"];?>"<?php 
}?> size="<?php echo $this->scope["size"];?>" <?php if ((isset($this->scope["multiple"]) ? $this->scope["multiple"] : null)) {
?>multiple="multiple"<?php 
}?> <?php if ((isset($this->scope["disabled"]) ? $this->scope["disabled"] : null)) {
?>disabled="disabled"<?php 
}?> <?php if ((isset($this->scope["onchange"]) ? $this->scope["onchange"] : null)) {
?>onchange="<?php echo $this->scope["onchange"];?>"<?php 
}?> <?php if ((isset($this->scope["onclick"]) ? $this->scope["onclick"] : null)) {
?>onclick="<?php echo $this->scope["onclick"];?>"<?php 
}?> <?php echo $this->scope["extraAttributes"];?>>
	<?php echo Dwoo_Plugin_include($this, "core/view/form/FormElement_Select_Options.tmpl", null, null, null, '_root', null);?>

</select>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>