<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><div id="task-<?php echo $this->scope["task"]["id"];?>" class="task status<?php echo ucfirst((isset($this->scope["task"]["statuskey"]) ? $this->scope["task"]["statuskey"]:null));?> <?php echo $this->scope["task"]["class"];?> bcStatus<?php echo $this->scope["task"]["status"];?>">
	<?php echo Dwoo_Plugin_include($this, "ext/project/view/task-listing-header.tmpl", null, null, null, '_root', null);?>

	<?php echo $this->scope["details"];?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>