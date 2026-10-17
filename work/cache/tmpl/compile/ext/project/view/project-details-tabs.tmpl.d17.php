<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="menu contextmenuProjectInline" id="menu-<?php echo $this->scope["idProject"];?>">
	<span class="icon"></span>
	<span class="label"><?php echo TodoyuLabelManager::getLabel('LLL:project.ext.project.tabs.menu', null);?></span>
</div>

<script type="text/javascript">
	Todoyu.Ext.project.ContextMenuProjectInline.attach();
</script>

<div class="gap">

</div>

<div class="tabs" id="<?php echo $this->scope["idProject"];?>-tabs">
	<?php 
$_fh2_data = (isset($this->scope["tabs"]) ? $this->scope["tabs"] : null);
if ($this->isArray($_fh2_data, true) === true)
{
	foreach ($_fh2_data as $this->scope['tab'])
	{
/* -- foreach start output */
?>
		<div class="projectDetailsTab <?php echo $this->scope["tab"]["id"];?>ProjectTab tabkey-<?php echo $this->scope["tab"]["id"];
if ((isset($this->scope["activeTab"]) ? $this->scope["activeTab"] : null) == (isset($this->scope["tab"]["id"]) ? $this->scope["tab"]["id"]:null)) {
?> active<?php 
}?>" id="tab-<?php echo $this->scope["tab"]["id"];?>" onclick="Todoyu.Ext.project.Project.Tab.onSelect(<?php echo $this->scope["idProject"];?>, '<?php echo $this->scope["tab"]["id"];?>');">
			<span class="icon"></span>
			<span class="label"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["tab"]["label"]) ? $this->scope["tab"]["label"]:null), null);?></span>
		</div>
	<?php 
/* -- foreach end output */
	}
}
else {
?>
		no tabs registered
	<?php 
}?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>