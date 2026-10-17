<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><div class="buttons">
	<?php echo Dwoo_Plugin_Button($this, "search.panelwidget-searchfilterlist.clearFilterArea", "Todoyu.Ext.search.PanelWidget.SearchFilterList.clearFilterArea()", "clear", '', '', '', false, false, '');?>

	<?php echo Dwoo_Plugin_Button($this, "search.panelwidget-searchfilterlist.saveFilterButton", "Todoyu.Ext.search.PanelWidget.SearchFilterList.saveNewFilterset()", "save", '', '', '', false, false, '');?>


	<?php 
$_fh6_data = (isset($this->scope["exports"]) ? $this->scope["exports"] : null);
if ($this->isArray($_fh6_data) === true)
{
	foreach ($_fh6_data as $this->scope['name']=>$this->scope['data'])
	{
/* -- foreach start output */
?>
		<?php if (TodoyuRightsManager::isAllowed((isset($this->scope["data"]["right"]["ext"]) ? $this->scope["data"]["right"]["ext"]:null),(isset($this->scope["data"]["right"]["right"]) ? $this->scope["data"]["right"]["right"]:null))) {
?>
			<?php echo Dwoo_Plugin_Button($this, "".(isset($this->scope["data"]["label"]) ? $this->scope["data"]["label"]:null)."", "Todoyu.Ext.search.ActionPanel.exportResults('".(isset($this->scope["name"]) ? $this->scope["name"] : null)."')", "".(isset($this->scope["data"]["htmlClass"]) ? $this->scope["data"]["htmlClass"]:null)."", "export-".(isset($this->scope["name"]) ? $this->scope["name"] : null)."", '', '', false, false, '');?>

		<?php 
}?>

	<?php 
/* -- foreach end output */
	}
}?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>