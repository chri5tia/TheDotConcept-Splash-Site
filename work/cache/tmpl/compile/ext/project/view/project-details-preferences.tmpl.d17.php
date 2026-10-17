<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ?><div id="project-infobox-presetlist" class="infoBox presets">
	<h4 id="project-infobox-presetlist-header"><?php echo TodoyuLabelManager::getLabel('project.ext.infobox.presets.title', null);?></h4>
	<div id="project-infobox-presetlist-content" class="content overflow">
		<table class="list presetsListing">
		<?php 
$_fh0_data = (isset($this->scope["presets"]) ? $this->scope["presets"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['preset'])
	{
/* -- foreach start output */
?>
			<tr class="<?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>">
				<th><?php echo TodoyuLabelManager::getLabel((isset($this->scope["preset"]["label"]) ? $this->scope["preset"]["label"]:null), null);?></th>
				<td><?php echo $this->scope["preset"]["value"];?></td>
			</tr>
		<?php 
/* -- foreach end output */
	}
}?>

		</table>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>