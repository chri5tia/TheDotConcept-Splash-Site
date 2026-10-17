<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
if (function_exists('Dwoo_Plugin_personLabel')===false)
	$this->getLoader()->loadPlugin('personLabel');
/* end template head */ ob_start(); /* template body */ ?><table class="list fixedTable personListing assignedPersons">
	<tr class="listItem listItemHeader">
		<th class="name"><?php echo TodoyuLabelManager::getLabel('contact.ext.person', null);?></th>
		<th class="company"><?php echo TodoyuLabelManager::getLabel('contact.ext.company', null);?></th>
		<th class="role"><?php echo TodoyuLabelManager::getLabel('project.ext.attr.persons.role', null);?></th>
	</tr>
	<?php 
$_fh0_data = (isset($this->scope["persons"]) ? $this->scope["persons"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['person'])
	{
/* -- foreach start output */
?>
	<tr class="listItem <?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?> person">
		<td class="name">
			<span class="icon"></span>
			<?php echo Dwoo_Plugin_personLabel($this, (isset($this->scope["person"]["id"]) ? $this->scope["person"]["id"]:null), "project_assigned", (isset($this->scope["person"]["id_project"]) ? $this->scope["person"]["id_project"]:null), 'span', "name");?>

		</td>
		<td class="company"><?php echo $this->scope["person"]["company"]["0"]["title"];?>&nbsp;</td>
		<td class="role"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["person"]["rolelabel"]) ? $this->scope["person"]["rolelabel"]:null), null);?></td>
	</tr>
	<?php 
/* -- foreach end output */
	}
}?>	
</table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>