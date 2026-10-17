<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><div id="task-<?php echo $this->scope["task"]["id"];?>" class="task <?php echo $this->scope["task"]["class"];?> bcStatus<?php echo $this->scope["task"]["status"];?> <?php if ((isset($this->scope["isExpanded"]) ? $this->scope["isExpanded"] : null)) {
?>expanded<?php 
}?>">
	<?php echo Dwoo_Plugin_include($this, "task-header.tmpl", null, null, null, '_root', null);?>

	<?php echo $this->scope["details"];?>

	<?php echo $this->scope["subtasks"];?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>