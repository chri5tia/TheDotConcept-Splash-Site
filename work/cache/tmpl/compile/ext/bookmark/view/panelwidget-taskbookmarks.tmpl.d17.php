<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ?><div id="<?php echo $this->scope["id"];?>-quicksearch" class="taskQuickSearch">
	<form id="bookark-task-quicksearch-form" class="fForm" onsubmit="return false">
		<div class="fElement typeText fieldnameSearch odd">
			<div class="fElement fLabel">
				<label for="bookmark-task-quicksearch"><?php echo TodoyuLabelManager::getLabel('LLL:project.task.number', null);?></label>
			</div>
			<div class="fField">
				<input type="text" id="bookmark-task-quicksearch" />
			</div>
		</div>
	</form>

	<script type="text/javascript">
		Todoyu.Ext.bookmark.PanelWidget.TaskBookmarks.initQuickSearch();
	</script>
</div>

<div id="<?php echo $this->scope["id"];?>-list" class="bookmarks">
	<?php if ((isset($this->scope["bookmarks"]) ? $this->scope["bookmarks"] : null)) {
?>
		<ul id="<?php echo $this->scope["id"];?>-listitems" class="contextmenutaskbookmarks withMouseHover sortable">
		<?php 
$_fh2_data = (isset($this->scope["bookmarks"]) ? $this->scope["bookmarks"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['taskBookmark'])
	{
/* -- foreach start output */
?>
			<li id="<?php echo $this->scope["id"];?>-task-<?php echo $this->scope["taskBookmark"]["id"];?>" class="<?php echo $this->classCall('cycle', array('default', "even,odd", true, true, ',', null, false));?> listItem sortable bcStatus<?php echo $this->scope["taskBookmark"]["status"];?> <?php if ((isset($this->scope["taskBookmark"]["isRunning"]) ? $this->scope["taskBookmark"]["isRunning"]:null)) {
?>running<?php 
}?>" title="<?php if ('taskBookmark.type' === constant('TASK_TYPE_TASK')) {

echo TodoyuLabelManager::getLabel('project.task.task', null);

}
else {

echo TodoyuLabelManager::getLabel('project.task.type.container', null);

}?> <?php echo $this->scope["taskBookmark"]["id_project"];?>.<?php echo $this->scope["taskBookmark"]["tasknumber"];?> - <?php echo htmlentities((isset($this->scope["taskBookmark"]["title"]) ? $this->scope["taskBookmark"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>">
				<?php if ((isset($this->scope["taskBookmark"]["isTrackable"]) ? $this->scope["taskBookmark"]["isTrackable"]:null) || (isset($this->scope["taskBookmark"]["isRunning"]) ? $this->scope["taskBookmark"]["isRunning"]:null)) {
?>
					<a id="<?php echo $this->scope["id"];?>-task-<?php echo $this->scope["taskBookmark"]["id"];?>-btn" class="icon timetracking <?php echo $this->scope["taskBookmark"]["btnClass"];?>" href="javascript:void(0)" onclick="Todoyu.Ext.bookmark.PanelWidget.TaskBookmarks.<?php echo $this->scope["taskBookmark"]["jsFunction"];?>(<?php echo $this->scope["taskBookmark"]["id"];?>);this.onclick=''" title="<?php if ((isset($this->scope["taskBookmark"]["id"]) ? $this->scope["taskBookmark"]["id"]:null) == (isset($this->scope["runningTask"]) ? $this->scope["runningTask"] : null)) {

echo TodoyuLabelManager::getLabel('timetracking.ext.stop', null);

}
else {

echo TodoyuLabelManager::getLabel('timetracking.ext.start', null);

}?>"><!-- button --></a>
				<?php 
}?>

				<span class="info">
					<div class="handle" id="bookmark-<?php echo $this->scope["taskBookmark"]["id"];?>-handle"></div>
					<div class="bcStatus<?php echo $this->scope["taskBookmark"]["status"];
if ((isset($this->scope["taskBookmark"]["type"]) ? $this->scope["taskBookmark"]["type"]:null) == constant('TASK_TYPE_CONTAINER')) {
?> container<?php 
}?> taskItem">

						<div class="title" onclick="Todoyu.Ext.project.goToTaskInProject(<?php echo $this->scope["taskBookmark"]["id"];?>, <?php echo $this->scope["taskBookmark"]["id_project"];?>)" title="<?php echo $this->scope["taskBookmark"]["id_project"];?>.<?php echo $this->scope["taskBookmark"]["tasknumber"];?> - <?php echo htmlentities((isset($this->scope["taskBookmark"]["title"]) ? $this->scope["taskBookmark"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>">
							<?php if ((isset($this->scope["taskBookmark"]["bookmarktitle"]) ? $this->scope["taskBookmark"]["bookmarktitle"]:null)) {
?>
								<?php echo htmlentities((isset($this->scope["taskBookmark"]["bookmarktitle"]) ? $this->scope["taskBookmark"]["bookmarktitle"]:null), ENT_QUOTES, 'UTF-8', false);?>

							<?php 
}
else {
?>
								<?php echo $this->scope["taskBookmark"]["id_project"];?>.<?php echo $this->scope["taskBookmark"]["tasknumber"];?> - <?php echo htmlentities((isset($this->scope["taskBookmark"]["title"]) ? $this->scope["taskBookmark"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>

							<?php 
}?>

						</div>

						<div class="project" onclick="Todoyu.Ext.project.goToTaskInProject(<?php echo $this->scope["taskBookmark"]["id"];?>, <?php echo $this->scope["taskBookmark"]["id_project"];?>)">
							<?php echo htmlentities((isset($this->scope["taskBookmark"]["projecttitle"]) ? $this->scope["taskBookmark"]["projecttitle"]:null), ENT_QUOTES, 'UTF-8', false);?>

						</div>

						<div class="currentLabel" style="display:none">
							<?php if ((isset($this->scope["taskBookmark"]["bookmarktitle"]) ? $this->scope["taskBookmark"]["bookmarktitle"]:null)) {
?>
								<?php echo htmlentities((isset($this->scope["taskBookmark"]["bookmarktitle"]) ? $this->scope["taskBookmark"]["bookmarktitle"]:null), ENT_QUOTES, 'UTF-8', false);?>

							<?php 
}
else {
?>
								<?php echo $this->scope["taskBookmark"]["id_project"];?>.<?php echo $this->scope["taskBookmark"]["tasknumber"];?> - <?php echo htmlentities((isset($this->scope["taskBookmark"]["title"]) ? $this->scope["taskBookmark"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>

							<?php 
}?>

						</div>
					</div>
				</span>
			</li>
		<?php 
/* -- foreach end output */
	}
}?>

		</ul>
	<?php 
}
else {
?>
		<div class="notification"><?php echo TodoyuLabelManager::getLabel('bookmark.ext.info.nobookmarks', null);?></div>
	<?php 
}?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>