<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ?><ul class="naviList" id="sysmanager-modules">
<?php 
$_fh0_data = (isset($this->scope["modules"]) ? $this->scope["modules"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['module'])
	{
/* -- foreach start output */
?>
	<li id="sysmanager-mod-<?php echo $this->scope["module"]["key"];?>" class="<?php echo $this->scope["module"]["key"];?> <?php if ((isset($this->scope["active"]) ? $this->scope["active"] : null) == (isset($this->scope["module"]["key"]) ? $this->scope["module"]["key"]:null)) {
?>active<?php 
}?> <?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>">
		<a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.PanelWidget.SysmanagerModules.module('<?php echo $this->scope["module"]["key"];?>')"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["module"]["label"]) ? $this->scope["module"]["label"]:null), null);?></a>
	</li>
<?php 
/* -- foreach end output */
	}
}?>

</ul><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>