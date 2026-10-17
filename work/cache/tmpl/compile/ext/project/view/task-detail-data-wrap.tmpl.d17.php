<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="task-<?php echo $this->scope["idTask"];?>-details" class="details bcStatus<?php echo $this->scope["task"]["status"];?>">
	<div id="task-<?php echo $this->scope["idTask"];?>-data" class="data">
		<?php echo $this->scope["formHtml"];?>

	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>