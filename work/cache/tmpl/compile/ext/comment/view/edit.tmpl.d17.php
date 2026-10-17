<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="task-<?php echo $this->scope["idTask"];?>-commentform-<?php echo $this->scope["idComment"];?>" class="tabBlock commentform">
	<?php echo $this->scope["formhtml"];?>

	<div class="clear"><!-- --></div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>