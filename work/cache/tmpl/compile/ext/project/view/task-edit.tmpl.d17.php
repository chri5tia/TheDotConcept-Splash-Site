<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="innerBox task-inline-edit">
	<div class="padding" id="task-<?php echo $this->scope["idTask"];?>-formdiv">
		<?php echo $this->scope["formhtml"];?>

	</div>
	<div class="clear"><!-- --></div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>