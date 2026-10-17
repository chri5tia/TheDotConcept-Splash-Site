<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="innerBox">
	<?php echo $this->scope["formhtml"];?>

	<div class="clear"><!-- --></div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>