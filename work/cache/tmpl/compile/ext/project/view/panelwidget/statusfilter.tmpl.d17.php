<?php
/* template head */
if (function_exists('Dwoo_Plugin_select')===false)
	$this->getLoader()->loadPlugin('select');
/* end template head */ ob_start(); /* template body */ ?><span class="scrollbarHide overflowHidden displayBlock">
	<?php echo Dwoo_Plugin_select($this, (isset($this->scope["statuses"]) ? $this->scope["statuses"] : null), (isset($this->scope["selected"]) ? $this->scope["selected"] : null), "panelwidget-".(isset($this->scope["id"]) ? $this->scope["id"] : null)."-list", "statuses", '', sizeof((isset($this->scope["statuses"]) ? $this->scope["statuses"] : null)), true, false, '', '', false);?>

</span><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>