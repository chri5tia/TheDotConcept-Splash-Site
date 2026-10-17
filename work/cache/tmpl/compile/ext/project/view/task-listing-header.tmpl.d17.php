<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><h3 id="task-<?php echo $this->scope["task"]["id"];?>-header" class="contextmenutask bcStatus<?php echo $this->scope["task"]["status"];?>">
	<span class="statusColor bcStatus<?php echo $this->scope["task"]["status"];?>"></span>
	<span class="headLabel" title="<?php echo htmlentities((isset($this->scope["task"]["fulltitle"]) ? $this->scope["task"]["fulltitle"]:null), ENT_QUOTES, 'UTF-8', false);?>" onclick="Todoyu.Ext.project.Task.toggleDetails(<?php echo $this->scope["task"]["id"];?>)">

		<span class="taskDate date" title="<?php echo TodoyuTime::format((isset($this->scope["task"]["date_start"]) ? $this->scope["task"]["date_start"]:null), 'D2M2Y2');?> - <?php if ((isset($this->scope["task"]["type"]) ? $this->scope["task"]["type"]:null) === constant('TASK_TYPE_TASK') && (isset($this->scope["task"]["date_end"]) ? $this->scope["task"]["date_end"]:null) > 0) {

echo TodoyuTime::format((isset($this->scope["task"]["date_end"]) ? $this->scope["task"]["date_end"]:null), 'D2M2Y2');

}
else {

echo TodoyuTime::format((isset($this->scope["task"]["date_deadline"]) ? $this->scope["task"]["date_deadline"]:null), 'D2M2Y2');

}?>">
			<?php if (! (isset($this->scope["task"]["is_container"]) ? $this->scope["task"]["is_container"]:null) && (isset($this->scope["task"]["date_end"]) ? $this->scope["task"]["date_end"]:null) > 0) {
?>
				<?php echo TodoyuTime::format((isset($this->scope["task"]["date_end"]) ? $this->scope["task"]["date_end"]:null), 'D2M2Y2');?>

			<?php 
}
else {
?>
				<?php echo TodoyuTime::format((isset($this->scope["task"]["date_deadline"]) ? $this->scope["task"]["date_deadline"]:null), 'D2M2Y2');?>

			<?php 
}?>

			&nbsp;
		</span>
		<span class="customer">
			<?php if ((isset($this->scope["task"]["company"]["shortname"]) ? $this->scope["task"]["company"]["shortname"]:null)) {

echo htmlentities((isset($this->scope["task"]["company"]["shortname"]) ? $this->scope["task"]["company"]["shortname"]:null), ENT_QUOTES, 'UTF-8', false);

}
else {

echo htmlentities((isset($this->scope["task"]["company"]["title"]) ? $this->scope["task"]["company"]["title"]:null), ENT_QUOTES, 'UTF-8', false);

}?>&nbsp;
		</span>
		<span class="projectName" title="<?php echo TodoyuLabelManager::getLabel('project.ext.project', null);?>: <?php echo htmlentities((isset($this->scope["task"]["project"]["title"]) ? $this->scope["task"]["project"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?> (ID: <?php echo $this->scope["task"]["project"]["id"];?>) / <?php echo TodoyuLabelManager::getLabel('project.task.task', null);?>: <?php echo htmlentities((isset($this->scope["task"]["title"]) ? $this->scope["task"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>">
			<?php echo $this->scope["titlePrefix"];
echo htmlentities((isset($this->scope["task"]["project"]["title"]) ? $this->scope["task"]["project"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?> - <?php echo htmlentities((isset($this->scope["task"]["title"]) ? $this->scope["task"]["title"]:null), ENT_QUOTES, 'UTF-8', false);
echo $this->scope["titlePostfix"];?>

		</span>
	</span>

	<span class="taskNumber">
		<span class="taskNumberProject"><?php echo $this->scope["task"]["id_project"];?>.</span><span class="taskNumberTask"><?php echo $this->scope["task"]["tasknumber"];?></span>
	</span>
	<span class="taskIcons<?php if (sizeof((isset($this->scope["taskIcons"]) ? $this->scope["taskIcons"] : null)) > 4) {
?> taskIconsOverflow<?php 
}?>">
		<?php 
$_fh0_data = (isset($this->scope["taskIcons"]) ? $this->scope["taskIcons"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['taskIcon'])
	{
/* -- foreach start output */
?>
			<span id="<?php echo $this->scope["taskIcon"]["id"];?>" class="<?php echo $this->scope["taskIcon"]["class"];?>" title="<?php echo TodoyuLabelManager::getLabel((isset($this->scope["taskIcon"]["label"]) ? $this->scope["taskIcon"]["label"]:null), null);?>" <?php if ((isset($this->scope["taskIcon"]["onclick"]) ? $this->scope["taskIcon"]["onclick"]:null)) {
?>onclick="<?php echo $this->scope["taskIcon"]["onclick"];?>"<?php 
}?>></span>
		<?php 
/* -- foreach end output */
	}
}?>

	</span>
</h3><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>