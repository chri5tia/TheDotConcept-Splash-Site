<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><li>
	<ul class="inactive">
		<?php 
$_fh7_data = (isset($this->scope["tasks"]) ? $this->scope["tasks"] : null);
if ($this->isArray($_fh7_data) === true)
{
	foreach ($_fh7_data as $this->scope['task'])
	{
/* -- foreach start output */
?>
			<li id="<?php echo $this->scope["name"];?>-task-<?php echo $this->scope["task"]["id"];?>" class="bcStatus<?php echo $this->scope["task"]["status"];?>">
				<div class="title" onclick="Todoyu.Ext.timetracking.Task.goToTask(<?php echo $this->scope["task"]["id_project"];?>, <?php echo $this->scope["task"]["id"];?>, true)">
					<div class="taskNumber" title="<?php echo TodoyuLabelManager::getLabel('portal.ext.tasktree.header.tasknumber', null);?>: <?php echo $this->scope["task"]["id_project"];?>.<?php echo $this->scope["task"]["tasknumber"];?>">
						<?php echo $this->scope["task"]["id_project"];?>.<?php echo $this->scope["task"]["tasknumber"];?>

					</div>
					<div class="taskTitle" title="<?php echo TodoyuLabelManager::getLabel('project.ext.project', null);?>: <?php echo htmlentities((isset($this->scope["task"]["projecttitle"]) ? $this->scope["task"]["projecttitle"]:null), ENT_QUOTES, 'UTF-8', false);?> (ID: <?php echo $this->scope["task"]["id_project"];?>) / <?php echo TodoyuLabelManager::getLabel('project.task.task', null);?>: <?php echo htmlentities((isset($this->scope["task"]["title"]) ? $this->scope["task"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>">
						<span class="project"><?php echo htmlentities((isset($this->scope["task"]["projecttitle"]) ? $this->scope["task"]["projecttitle"]:null), ENT_QUOTES, 'UTF-8', false);?></span>
						<span class="task"><?php echo htmlentities((isset($this->scope["task"]["title"]) ? $this->scope["task"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?></span>
					</div>
					<div class="taskTime" title="<?php echo TodoyuLabelManager::getLabel('timetracking.ext.totalTrackedTime', null);?>">
						<?php echo TodoyuTime::formatTime((isset($this->scope["task"]["trackedtime"]) ? $this->scope["task"]["trackedtime"]:null), true);?>

					</div>
				</div>
				<?php if ((isset($this->scope["task"]["isTrackable"]) ? $this->scope["task"]["isTrackable"]:null)) {
?>
					<div class="trackingButton">
						<?php echo Dwoo_Plugin_Button($this, "LLL:timetracking.ext.start", "Todoyu.Headlets.getHeadlet('todoyutimetrackingheadlettracking').startTask(".(isset($this->scope["task"]["id"]) ? $this->scope["task"]["id"]:null).")", "startTracking", '', '', '', true, false, '');?>

					</div>
				<?php 
}?>

			</li>
		<?php 
/* -- foreach end output */
	}
}?>

	</ul>
</li><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>