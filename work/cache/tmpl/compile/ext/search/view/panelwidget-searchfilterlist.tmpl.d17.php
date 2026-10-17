<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><div class="panelwidgetContent">

	<ul id="filterset-list" class="sortablePanelList">
	<?php 
$_fh1_data = (isset($this->scope["groupedFiltersets"]) ? $this->scope["groupedFiltersets"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['groupKey']=>$this->scope['filtersets'])
	{
/* -- foreach start output */
?>
		<li class="listItem groupTitle groupName<?php echo ucfirst((isset($this->scope["groupKey"]) ? $this->scope["groupKey"] : null));?>"><?php echo $this->scope["filtersets"]["label"];?></li>
		<li class="itemList">
			<ul id="panelwidget-searchfilterlist-list-<?php echo $this->scope["groupKey"];?>" class="sortable" <?php if ($this->readVar("toggleStatus.".(isset($this->scope["groupKey"]) ? $this->scope["groupKey"] : null)) == 1) {
?>style="display:none"<?php 
}?>>

			<?php 
$_fh0_data = (isset($this->scope["filtersets"]["filtersets"]) ? $this->scope["filtersets"]["filtersets"]:null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['index']=>$this->scope['filterset'])
	{
/* -- foreach start output */
?>
				<li id="filterset_<?php echo $this->scope["filterset"]["id"];?>" class="listItem <?php echo $this->classCall('cycle', array('default', 'odd,even', true, true, ',', null, false));?> <?php if ((isset($this->scope["filterset"]["is_separator"]) ? $this->scope["filterset"]["is_separator"]:null) == 1) {
?>separator<?php 
}?> <?php if (in_array((isset($this->scope["filterset"]["id"]) ? $this->scope["filterset"]["id"]:null), (isset($this->scope["activeFiltersets"]) ? $this->scope["activeFiltersets"] : null))) {
?>current<?php 
}
if ((isset($this->scope["filterset"]["is_hidden"]) ? $this->scope["filterset"]["is_hidden"]:null) == 1) {
?> invisible<?php 
}?>">
					<div id="filterset-<?php echo $this->scope["filterset"]["id"];?>-handle" class="handle"></div>
					<?php if ((isset($this->scope["filterset"]["is_separator"]) ? $this->scope["filterset"]["is_separator"]:null) == 0) {
?>
						<a id="filterset-<?php echo $this->scope["filterset"]["id"];?>-label" class="title" onclick="Todoyu.Ext.search.PanelWidget.SearchFilterList.showFilterset('<?php echo $this->scope["groupKey"];?>', <?php echo $this->scope["filterset"]["id"];?>)" href="javascript:void(0)" title="<?php echo htmlentities((isset($this->scope["filterset"]["title"]) ? $this->scope["filterset"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>">
							<?php echo htmlentities((isset($this->scope["filterset"]["title"]) ? $this->scope["filterset"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>

						</a>
					<?php 
}
else {
?>
						<span id="filterset-<?php echo $this->scope["filterset"]["id"];?>-label" title="<?php echo htmlentities((isset($this->scope["filterset"]["title"]) ? $this->scope["filterset"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>" class="title"><?php echo htmlentities((isset($this->scope["filterset"]["title"]) ? $this->scope["filterset"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?></span>
					<?php 
}?>

					<span class="actions">
						<a id="filterset-<?php echo $this->scope["filterset"]["id"];?>-control-rename" onclick="Todoyu.Ext.search.PanelWidget.SearchFilterList.renameFilterset(<?php echo $this->scope["filterset"]["id"];?>)" class="rename" title="<?php echo TodoyuLabelManager::getLabel('core.global.rename', null);?>" href="javascript:void(0)">
							<?php echo TodoyuLabelManager::getLabel('core.global.rename', null);?>

						</a>
						<a id="filterset-<?php echo $this->scope["filterset"]["id"];?>-control-visibility" onclick="Todoyu.Ext.search.PanelWidget.SearchFilterList.hideFilterset(<?php echo $this->scope["filterset"]["id"];?>)" href="javascript:void(0)" class="visibility <?php if ((isset($this->scope["filterset"]["is_hidden"]) ? $this->scope["filterset"]["is_hidden"]:null) == 1) {
?>invisible<?php 
}?>" title="<?php if ((isset($this->scope["filterset"]["is_hidden"]) ? $this->scope["filterset"]["is_hidden"]:null) == 0) {

echo TodoyuLabelManager::getLabel('core.global.hide', null);

}
else {

echo TodoyuLabelManager::getLabel('core.global.unhide', null);

}?>">
							<?php if ((isset($this->scope["filterset"]["is_hidden"]) ? $this->scope["filterset"]["is_hidden"]:null) == 0) {

echo TodoyuLabelManager::getLabel('search.panelwidget-searchfilterlist.hide', null);

}
else {

echo TodoyuLabelManager::getLabel('core.global.unhide', null);

}?>

						</a>
						<?php if ((isset($this->scope["filterset"]["is_separator"]) ? $this->scope["filterset"]["is_separator"]:null) == 0) {
?>
							<a id="filterset-<?php echo $this->scope["filterset"]["id"];?>-control-save" onclick="Todoyu.Ext.search.PanelWidget.SearchFilterList.saveFilterset(<?php echo $this->scope["filterset"]["id"];?>, '<?php echo $this->scope["groupKey"];?>')" class="save" title="<?php echo TodoyuLabelManager::getLabel('core.global.save', null);?>" href="javascript:void(0)">
								<?php echo TodoyuLabelManager::getLabel('core.global.save', null);?>

							</a>
						<?php 
}?>

						<a id="filterset-<?php echo $this->scope["filterset"]["id"];?>-control-delete" onclick="Todoyu.Ext.search.PanelWidget.SearchFilterList.deleteFilterset(<?php echo $this->scope["filterset"]["id"];?>)" class="delete" title="<?php echo TodoyuLabelManager::getLabel('core.global.delete', null);?>" href="javascript:void(0)">
							<?php echo TodoyuLabelManager::getLabel('core.global.delete', null);?>

						</a>
					</span>
				</li>
			<?php 
/* -- foreach end output */
	}
}?>


			</ul>
		</li>
	<?php 
/* -- foreach end output */
	}
}?>

	</ul>

	<?php echo Dwoo_Plugin_Button($this, "search.panelwidget-searchfilterlist.addSeparator", "Todoyu.Ext.search.PanelWidget.SearchFilterList.saveNewSeparator()", "addseparator", '', '', '', false, false, '');?>


</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>