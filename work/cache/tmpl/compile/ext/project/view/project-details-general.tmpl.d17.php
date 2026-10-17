<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ?>
<div class="infoBox properties">
	<h4><?php echo TodoyuLabelManager::getLabel('project.ext.properties', null);?></h4>
	<div class="content overflow">
		<table class="list propertiesListing">
			<?php 
$_fh1_data = (isset($this->scope["properties"]) ? $this->scope["properties"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['info'])
	{
/* -- foreach start output */
?>
			<tr class="<?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>">
				<th class="label"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["info"]["label"]) ? $this->scope["info"]["label"]:null), null);?></th>
				<td>
					<?php if (TodoyuRightsManager::isAllowed('contact','general:area') && (isset($this->scope["info"]["__key"]) ? $this->scope["info"]["__key"]:null) == 'company' && TodoyuContactCompanyRights::isSeeAllowed((isset($this->scope["id_company"]) ? $this->scope["id_company"] : null))) {
?><a href="index.php?ext=contact&amp;tab=company&amp;id=<?php echo $this->scope["id_company"];?>"><?php 
}?>

					<?php echo $this->scope["info"]["value"];?>

					<?php if (TodoyuRightsManager::isAllowed('contact','general:area') && (isset($this->scope["info"]["__key"]) ? $this->scope["info"]["__key"]:null) == 'company' && TodoyuContactCompanyRights::isSeeAllowed((isset($this->scope["id_company"]) ? $this->scope["id_company"] : null))) {
?></a><?php 
}?>

				</td>
			</tr>
			<?php 
/* -- foreach end output */
	}
}?>

		</table>
	</div>
</div>

<div class="infoBox">
	<h4><?php echo TodoyuLabelManager::getLabel('project.ext.attr.persons', null);?></h4>
	<div class="content overflow"><?php echo $this->scope["assignedPersons"];?></div>
</div>

<div class="infoBox description">
	<h4><?php echo TodoyuLabelManager::getLabel('core.global.description', null);?></h4>
	<div class="content overflow"><?php echo TodoyuString::substituteLinkableElements(TodoyuHtmlFilter::clean((isset($this->scope["description"]) ? $this->scope["description"] : null)));?></div>
</div>


<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>