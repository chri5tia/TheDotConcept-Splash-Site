<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><ul id="profilemodules-list" class="naviList">
	<?php 
$_fh0_data = (isset($this->scope["modules"]) ? $this->scope["modules"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['module'])
	{
/* -- foreach start output */
?>
		<li class="<?php echo $this->scope["module"]["class"];
if ((isset($this->scope["module"]["name"]) ? $this->scope["module"]["name"]:null) == (isset($this->scope["active"]) ? $this->scope["active"] : null)) {
?> active<?php 
}?>">
			<a href="javascript:void(0)" onclick="Todoyu.Ext.profile.PanelWidget.ProfileModules.onClickModule('<?php echo $this->scope["module"]["name"];?>')">
				<?php echo TodoyuLabelManager::getLabel((isset($this->scope["module"]["label"]) ? $this->scope["module"]["label"]:null), null);?>

			</a>
		</li>
	<?php 
/* -- foreach end output */
	}
}?>

</ul><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>