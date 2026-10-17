<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="taskList" class="projectTaskList">
	<div id="projects">
		<div id="project-0">

			<div class="noProjectSelected">
				<p class="message">
					<?php echo TodoyuLabelManager::getLabel('project.ext.noproject.message.description', null);?>

					<?php if (TodoyuRightsManager::isAllowed('project','project:add')) {
?>
						<a href="javascript:void(0)" onclick="Todoyu.Ext.project.openProjectPopup()"><?php echo TodoyuLabelManager::getLabel('project.ext.noproject.message.createproject', null);?></a>
					<?php 
}
else {
?>
						<?php echo TodoyuLabelManager::getLabel('project.ext.noproject.message.informcontact', null);?>

					<?php 
}?>

				</p>
			</div>

		</div>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>