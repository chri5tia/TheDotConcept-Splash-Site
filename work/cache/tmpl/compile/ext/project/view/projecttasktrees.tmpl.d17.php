<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>
<div id="taskList" class="projectTaskList">
	<div id="projects">
		<?php echo $this->scope["project"];?>

	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>