<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="project-<?php echo $this->scope["idProject"];?>" class="project status<?php echo ucfirst((isset($this->scope["statusKey"]) ? $this->scope["statusKey"] : null));?> projecttasktree">
	<?php echo $this->scope["header"];?>

	<div id="project-<?php echo $this->scope["idProject"];?>-tasks" class="tasks taskTree">
		<?php echo $this->scope["tasktree"];?>


		<?php echo $this->scope["losttasks"];?>

	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>