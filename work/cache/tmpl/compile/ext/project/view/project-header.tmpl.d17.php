<?php
/* template head */
if (function_exists('Dwoo_Plugin_isAllowedSeeProjectDetails')===false)
	$this->getLoader()->loadPlugin('isAllowedSeeProjectDetails');
/* end template head */ ob_start(); /* template body */ ?><h1 class="title headerLine contextmenuproject" id="project-<?php echo $this->scope["id"];?>-header" <?php if (Dwoo_Plugin_isAllowedSeeProjectDetails($this, (isset($this->scope["id"]) ? $this->scope["id"] : null))) {
?>onclick="Todoyu.Ext.project.Project.toggleDetails(<?php echo $this->scope["id"];?>)"<?php 
}?>>
	<div class="projectstatus bcStatus<?php echo $this->scope["status"];?>"></div>
	<span id="project-<?php echo $this->scope["id"];?>-titlelabel" class="title titleLabel first" title="ID:<?php echo $this->scope["id"];?> - <?php echo htmlentities((isset($this->scope["fulltitle"]) ? $this->scope["fulltitle"] : null), ENT_QUOTES, 'UTF-8', false);?>">
		<?php echo htmlentities((isset($this->scope["fulltitle"]) ? $this->scope["fulltitle"] : null), ENT_QUOTES, 'UTF-8', false);?>

	</span>

	<span class="projectIcons">
		<?php 
$_fh1_data = (isset($this->scope["projectIcons"]) ? $this->scope["projectIcons"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['projectIcon'])
	{
/* -- foreach start output */
?>
			<span id="<?php echo $this->scope["projectIcon"]["id"];?>" class="<?php echo $this->scope["projectIcon"]["class"];?>" title="<?php echo TodoyuLabelManager::getLabel((isset($this->scope["projectIcon"]["label"]) ? $this->scope["projectIcon"]["label"]:null), null);?>" <?php if ((isset($this->scope["projetIcon"]["onclick"]) ? $this->scope["projetIcon"]["onclick"]:null)) {
?>onclick="<?php echo $this->scope["projectIcon"]["onclick"];?>"<?php 
}?>></span>
		<?php 
/* -- foreach end output */
	}
}?>

	</span>
</h1>

<?php if (Dwoo_Plugin_isAllowedSeeProjectDetails($this, (isset($this->scope["id"]) ? $this->scope["id"] : null))) {
?>
<div id="project-<?php echo $this->scope["id"];?>-details" class="projectDetails" <?php if (! (isset($this->scope["details"]) ? $this->scope["details"] : null)) {
?> style="display:none"<?php 
}?>>
	<?php echo $this->scope["details"];?>

</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>