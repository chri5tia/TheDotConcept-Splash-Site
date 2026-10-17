<?php
/* template head */
if (function_exists('Dwoo_Plugin_select')===false)
	$this->getLoader()->loadPlugin('select');
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><div class="panelwidgetContent">
<?php 
$_fh0_data = (isset($this->scope["types"]) ? $this->scope["types"] : null);
if ($this->isArray($_fh0_data, true) === true)
{
	foreach ($_fh0_data as $this->scope['type']=>$this->scope['typeFiltersets'])
	{
/* -- foreach start output */
?>
	<h2><?php echo $this->scope["typeFiltersets"]["title"];?></h2>
	<span class="scrollbarHide overflowHidden displayBlock">
		<?php $this->scope["typeLower"]=strtolower((isset($this->scope["type"]) ? $this->scope["type"] : null))?>

		<?php if (is_array((isset($this->scope["typeFiltersets"]["options"]) ? $this->scope["typeFiltersets"]["options"]:null))) {
?>
			<?php echo Dwoo_Plugin_select($this, (isset($this->scope["typeFiltersets"]["options"]) ? $this->scope["typeFiltersets"]["options"]:null), (isset($this->scope["selected"]) ? $this->scope["selected"] : null), "panelwidget-".(isset($this->scope["id"]) ? $this->scope["id"] : null)."-list-".(isset($this->scope["typeLower"]) ? $this->scope["typeLower"] : null)."", '', '', 0, true, false, '', '', false);?>

		<?php 
}?>

	</span>
<?php 
/* -- foreach end output */
	}
}
else {
?>
	<div class="notification">
		<?php echo TodoyuLabelManager::getLabel('portal.panelwidget-filterpresetlist.error.noFilters', null);?>

	</div>
<?php 
}?>


<?php if( TodoyuRightsManager::isAllowed('search','general:area') ) {?>
	<br />
	<?php $this->scope["numFiltersets"]=count(TodoyuArray::mergeSubArrays(TodoyuArray::getColumn((isset($this->scope["types"]) ? $this->scope["types"] : null), 'options')))?>

	<?php if ((isset($this->scope["numFiltersets"]) ? $this->scope["numFiltersets"] : null) > 0) {
?>
		<?php echo Dwoo_Plugin_Button($this, "portal.panelwidget-filterpresetlist.manage", "Todoyu.Ext.portal.PanelWidget.FilterPresetList.manageFiltersets()", "manageFilters", '', '', '', false, false, '');?>

	<?php 
}
else {
?>
		<?php echo Dwoo_Plugin_Button($this, "portal.panelwidget-filterpresetlist.create", "Todoyu.Ext.portal.PanelWidget.FilterPresetList.manageFiltersets()", "manageFilters", '', '', '', false, false, '');?>

	<?php 
}?>

<?php }?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>