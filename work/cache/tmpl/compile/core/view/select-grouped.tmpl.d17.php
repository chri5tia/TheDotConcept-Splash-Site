<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><select <?php echo $this->scope["extraAttributes"];?> <?php if ((isset($this->scope["htmlName"]) ? $this->scope["htmlName"] : null)) {
?>name="<?php echo $this->scope["htmlName"];?>"<?php 
}?> <?php if ((isset($this->scope["htmlId"]) ? $this->scope["htmlId"] : null)) {
?>id="<?php echo $this->scope["htmlId"];?>"<?php 
}?> class="<?php echo $this->scope["inputClass"];?> <?php echo $this->scope["class"];?>" size="<?php echo $this->scope["size"];?>" <?php if ((isset($this->scope["multiple"]) ? $this->scope["multiple"] : null)) {
?>multiple="multiple"<?php 
}?> <?php if ((isset($this->scope["fieldClass"]) ? $this->scope["fieldClass"] : null)) {
?>class="<?php echo $this->scope["fieldClass"];?>"<?php 
}?> <?php if ((isset($this->scope["onchange"]) ? $this->scope["onchange"] : null)) {
?>onchange="<?php echo $this->scope["onchange"];?>"<?php 
}?>>
	<?php echo Dwoo_Plugin_include($this, "select-grouped-options.tmpl", null, null, null, '_root', null);?>

</select><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>