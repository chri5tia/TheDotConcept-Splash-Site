<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
if ((isset($this->scope["losttasks"]) ? $this->scope["losttasks"] : null)) {
?>
<div id="project-<?php echo $this->scope["idProject"];?>-losttasks" class="lostTasks">
	<h2><?php echo TodoyuLabelManager::getLabel('project.ext.tasktree.losttasks', null);?> (<?php echo $this->scope["numTasks"];?> <?php if ((isset($this->scope["numTasks"]) ? $this->scope["numTasks"] : null) == 1) {

echo TodoyuLabelManager::getLabel('project.task.task', null);

}
else {

echo TodoyuLabelManager::getLabel('project.task.tasks', null);

}?>)</h2>
	<div class="list">
		<?php echo $this->scope["losttasks"];?>

	</div>
</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>