<?php
/* template head */
if (function_exists('Dwoo_Plugin_select')===false)
	$this->getLoader()->loadPlugin('select');
/* end template head */ ob_start(); /* template body */ ?><span class="overflowHidden scrollbarHide displayBlock">
	<?php echo Dwoo_Plugin_select($this, (isset($this->scope["eventtypes"]) ? $this->scope["eventtypes"] : null), (isset($this->scope["selected"]) ? $this->scope["selected"] : null), "panelwidget-".(isset($this->scope["id"]) ? $this->scope["id"] : null)."-list", "eventtypes", '', sizeof((isset($this->scope["options"]) ? $this->scope["options"] : null)), true, false, '', '', false);?>

</span><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>