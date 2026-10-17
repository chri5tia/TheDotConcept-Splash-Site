<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
if (function_exists('Dwoo_Plugin_taskStatusKey')===false)
	$this->getLoader()->loadPlugin('taskStatusKey');
if (function_exists('Dwoo_Plugin_taskStatusLabel')===false)
	$this->getLoader()->loadPlugin('taskStatusLabel');
if (function_exists('Dwoo_Plugin_truncate')===false)
	$this->getLoader()->loadPlugin('truncate');
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><div class="contentdaytrackspwidget">
	<ul class="contextmenudaytrackspwidget ulListDotted withMouseHover">
		<?php 
$_fh1_data = (isset($this->scope["tasks"]) ? $this->scope["tasks"] : null);
$this->globals["foreach"]['daytracks'] = array
(
	"total"		=> $this->isArray($_fh1_data) ? count($_fh1_data) : 0,
);
$_fh1_glob =& $this->globals["foreach"]['daytracks'];
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['key']=>$this->scope['task'])
	{
/* -- foreach start output */
?>
			<li id="daytracks-track-<?php echo $this->scope["task"]["id"];?>" class="<?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?> listItem status-<?php echo Dwoo_Plugin_taskStatusKey($this, (isset($this->scope["task"]["status"]) ? $this->scope["task"]["status"]:null));?> bcStatus<?php echo $this->scope["task"]["status"];
if ((isset($this->scope["task"]["id"]) ? $this->scope["task"]["id"]:null) == (isset($this->scope["current"]) ? $this->scope["current"] : null)) {
?> running<?php 
}
if ((isset($this->scope["task"]["isDeleted"]) ? $this->scope["task"]["isDeleted"]:null)) {
?> deleted<?php 
}?>" title="<?php echo Dwoo_Plugin_taskStatusLabel($this, (isset($this->scope["task"]["status"]) ? $this->scope["task"]["status"]:null));?>">
				<span class="taskItem bcStatus<?php echo $this->scope["task"]["status"];?>">

				<?php if ((isset($this->scope["task"]["isTrackable"]) ? $this->scope["task"]["isTrackable"]:null) || (isset($this->scope["task"]["id"]) ? $this->scope["task"]["id"]:null) == (isset($this->scope["current"]) ? $this->scope["current"] : null)) {
?>
					<a id="daytracks-track-<?php echo $this->scope["task"]["id"];?>-button" class="icon start <?php if ((isset($this->scope["task"]["id"]) ? $this->scope["task"]["id"]:null) == (isset($this->scope["current"]) ? $this->scope["current"] : null)) {
?>running<?php 
}?>" href="javascript:void(0)" onclick="Todoyu.Ext.daytracks.PanelWidget.Daytracks.toggleTimetracking(<?php echo $this->scope["task"]["id"];?>);this.onclick=''" title="<?php if ((isset($this->scope["task"]["id"]) ? $this->scope["task"]["id"]:null) == (isset($this->scope["current"]) ? $this->scope["current"] : null)) {

echo TodoyuLabelManager::getLabel('timetracking.ext.stop', null);

}
else {

echo TodoyuLabelManager::getLabel('timetracking.ext.start', null);

}?>"><!-- button --></a>
				<?php 
}?>


				<a id="daytracks-track-<?php echo $this->scope["task"]["id"];?>-info" class="info" title="<?php if ((isset($this->scope["task"]["isDeleted"]) ? $this->scope["task"]["isDeleted"]:null)) {

echo TodoyuLabelManager::getLabel('project.task.deletedTasks', null);

}
else {

echo $this->scope["task"]["id_project"];?>.<?php echo $this->scope["task"]["tasknumber"];?> - <?php echo htmlentities((isset($this->scope["task"]["title"]) ? $this->scope["task"]["title"]:null), ENT_QUOTES, 'UTF-8', false);

}?>" href="javascript:void(0)" <?php if ((isset($this->scope["task"]["seeTask"]) ? $this->scope["task"]["seeTask"]:null) && ! (isset($this->scope["task"]["isDeleted"]) ? $this->scope["task"]["isDeleted"]:null)) {
?>onclick="Todoyu.Ext.daytracks.PanelWidget.Daytracks.goToTask(<?php echo $this->scope["task"]["id_project"];?>, <?php echo $this->scope["task"]["id"];?>)"<?php 
}?>>
					<span class="time" id="daytracks-track-<?php echo $this->scope["task"]["id"];?>-time"><?php echo TodoyuTime::formatTime((isset($this->scope["task"]["time"]) ? $this->scope["task"]["time"]:null), true);?></span>
					<span class="task"><?php echo $this->scope["task"]["id_project"];?>.<?php echo $this->scope["task"]["tasknumber"];?> - <?php echo htmlentities(Dwoo_Plugin_truncate($this, (isset($this->scope["task"]["title"]) ? $this->scope["task"]["title"]:null), 30, '', false, false), ENT_QUOTES, 'UTF-8', false);?></span>
					<span class="company-project"><span class="overflow"><?php echo htmlentities((isset($this->scope["task"]["company"]) ? $this->scope["task"]["company"]:null), ENT_QUOTES, 'UTF-8', false);?> - <?php echo htmlentities((isset($this->scope["task"]["project"]) ? $this->scope["task"]["project"]:null), ENT_QUOTES, 'UTF-8', false);?></span></span>
				</a>
				</span>
			</li>
		<?php 
/* -- foreach end output */
	}
}?>

	</ul>

	<div id="daytracks-daytotal" class="notification" <?php if (! (isset($this->scope["total"]) ? $this->scope["total"] : null) && ! (isset($this->scope["tracking"]) ? $this->scope["tracking"] : null)) {
?>style="display:none"<?php 
}?>>
		<span><?php echo TodoyuLabelManager::getLabel('daytracks.panelwidget-daytracks.totalToday', null);?>:</span>
		<span id="daytracks-daytotal-time"><?php echo TodoyuTime::formatTime((isset($this->scope["total"]) ? $this->scope["total"] : null), true);?></span>
		<span class="totalTasks">(<?php echo $this->globals["foreach"]["daytracks"]["total"];?> <?php echo TodoyuLabelManager::getLabel('project.task.tasks', null);?>)</span>
	</div>

	<?php if (! (isset($this->scope["total"]) ? $this->scope["total"] : null) && ! (isset($this->scope["tracking"]) ? $this->scope["tracking"] : null)) {
?>
		<div id="daytracks-daytotal-notracks" class="notification">
			<span><?php echo TodoyuLabelManager::getLabel('daytracks.panelwidget-daytracks.totalToday.noTracks', null);?></span>
		</div>
	<?php 
}?>


	<div class="history">
		<?php echo Dwoo_Plugin_Button($this, "daytracks.panelwidget-daytracks.showHistory", "Todoyu.Ext.daytracks.PanelWidget.Daytracks.showHistory()", "trackHistory", '', '', '', false, false, '');?>

	</div>

	<?php if( TodoyuRightsManager::isAllowed('daytracks','daytracks:timeExport') ) {?>
		<div class="timeexport">
			<?php echo Dwoo_Plugin_Button($this, "daytracks.ext.export.title", "Todoyu.Ext.daytracks.Export.openExportPopup()", "exportCsv", '', "LLL:daytracks.ext.export.popup.title", '', false, false, '');?>

		</div>
	<?php }?>


</div>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>