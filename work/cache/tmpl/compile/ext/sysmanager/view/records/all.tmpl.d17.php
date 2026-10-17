<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ?><table cellspacing="0" cellpadding="0" class="list recordsList typeAll">
	<colgroup>
		<col class="icon" />
		<col class="recordtype" />
		<col class="exticon" />
		<col class="extension" />
		<col class="records" />
		<col class="actions" />
	</colgroup>

	<tr class="header">
		<th scope="col" class="icon">&nbsp;</th>
		<th scope="col" class="recordtype"><?php echo TodoyuLabelManager::getLabel('sysmanager.ext.recordType', null);?></th>
		<th scope="col" class="exticon">&nbsp;</th>
		<th scope="col" class="extension"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.extension', null);?></th>
		<th scope="col" class="records"><?php echo TodoyuLabelManager::getLabel('core.global.records', null);?></th>
		<th scope="col" class="last actions">&nbsp;</th>
	</tr>
<?php 
$_fh1_data = (isset($this->scope["list"]) ? $this->scope["list"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['extKey']=>$this->scope['extension'])
	{
/* -- foreach start output */
?>
	<?php 
$_fh0_data = (isset($this->scope["extension"]["records"]) ? $this->scope["extension"]["records"]:null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['type']=>$this->scope['record'])
	{
/* -- foreach start output */
?>
	<tr class="<?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>">
		<td class="icon"></td>
		<td class="recordtype">
			<a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.Records.showTypeRecords('<?php echo $this->scope["extKey"];?>', '<?php echo $this->scope["type"];?>')" title="<?php echo TodoyuLabelManager::getLabel((isset($this->scope["record"]["config"]["description"]) ? $this->scope["record"]["config"]["description"]:null), null);?>"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["record"]["config"]["label"]) ? $this->scope["record"]["config"]["label"]:null), null);?></a>
		</td>
		<td class="exticon"><span class="exticon extIcon<?php echo ucfirst((isset($this->scope["extKey"]) ? $this->scope["extKey"] : null));?>"></span></td>
		<td class="extension">
			<a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.Records.showExtensionTypes('<?php echo $this->scope["extKey"];?>')"><?php echo $this->scope["extension"]["title"];?></a>
		</td>
		<td class="records">
			<a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.Records.showTypeRecords('<?php echo $this->scope["extKey"];?>', '<?php echo $this->scope["type"];?>')"><?php echo $this->scope["record"]["count"];?> <?php echo TodoyuLabelManager::getLabel('core.global.records', null);?></a>
		</td>
		<td class="actions">
			<div class="icon list" onclick="Todoyu.Ext.sysmanager.Records.showTypeRecords('<?php echo $this->scope["extKey"];?>', '<?php echo $this->scope["type"];?>')"></div>
		</td>
	</tr>
	<?php 
/* -- foreach end output */
	}
}?>

<?php 
/* -- foreach end output */
	}
}?>

</table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>