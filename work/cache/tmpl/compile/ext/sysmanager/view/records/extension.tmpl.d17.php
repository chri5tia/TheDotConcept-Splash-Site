<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ?><table cellspacing="0" cellpadding="0" class="list recordsList typeExtension">
	<colgroup>
		<col class="icon" />
		<col class="recordtype" />
		<col class="description" />
		<col class="records" />
		<col class="action" />
	</colgroup>

	<tr class="header">
		<th scope="col" class="icon">&nbsp;</th>
		<th scope="col" class="recordtype"><?php echo TodoyuLabelManager::getLabel('sysmanager.ext.recordType', null);?></th>
		<th scope="col" class="description"><?php echo TodoyuLabelManager::getLabel('core.global.description', null);?></th>
		<th scope="col" class="records"><?php echo TodoyuLabelManager::getLabel('core.global.records', null);?></th>
		<th scope="col" class="actions last">&nbsp;</th>
	</tr>

<?php 
$_fh0_data = (isset($this->scope["types"]) ? $this->scope["types"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['type'])
	{
/* -- foreach start output */
?>
	<tr class="pointerCursor <?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>" onclick="Todoyu.Ext.sysmanager.Records.showTypeRecords('<?php echo $this->scope["extKey"];?>', '<?php echo $this->scope["type"]["type"];?>')">
		<td class="icon"></td>
		<td class="recordtype"><?php echo $this->scope["type"]["label"];?></td>
		<td class="description"><?php echo $this->scope["type"]["description"];?></td>
		<td class="records"><?php echo $this->scope["type"]["count"];?> <?php echo TodoyuLabelManager::getLabel('core.global.records', null);?></td>
		<td class="actions">
			<div class="icon list"></div>
		</td>
	</tr>
<?php 
/* -- foreach end output */
	}
}?>


</table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>