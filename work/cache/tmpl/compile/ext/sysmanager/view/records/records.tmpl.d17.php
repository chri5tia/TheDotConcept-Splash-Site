<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
if (function_exists('Dwoo_Plugin_getRecordBooleanColumnsClassnames')===false)
	$this->getLoader()->loadPlugin('getRecordBooleanColumnsClassnames');
/* end template head */ ob_start(); /* template body */ ;
$this->scope["createLabel"]=TodoyuLabelManager::getLabel('core.global.createNew', null)?>

<?php $this->scope["typeLabel"]=TodoyuLabelManager::getLabel((isset($this->scope["config"]["label"]) ? $this->scope["config"]["label"]:null), null)?>

<?php $this->scope["buttonLabel"]=((isset($this->scope["createLabel"]) ? $this->scope["createLabel"] : null)).(': ').((isset($this->scope["typeLabel"]) ? $this->scope["typeLabel"] : null))?>


<div class="recordTypeInfo">
	<div class="add"><?php echo Dwoo_Plugin_Button($this, (isset($this->scope["buttonLabel"]) ? $this->scope["buttonLabel"] : null), "Todoyu.Ext.sysmanager.Records.add('".(isset($this->scope["extKey"]) ? $this->scope["extKey"] : null)."', '".(isset($this->scope["type"]) ? $this->scope["type"] : null)."')", "add", '', '', '', false, false, '');?></div>
	<?php echo TodoyuLabelManager::getLabel((isset($this->scope["config"]["description"]) ? $this->scope["config"]["description"]:null), null);?><br />
	<?php echo count((isset($this->scope["records"]) ? $this->scope["records"] : null));?> <?php echo TodoyuLabelManager::getLabel('core.global.records', null);?>

</div>

<table cellspacing="0" cellpadding="0" class="list recordsList typeRecords recordList<?php echo ucfirst((isset($this->scope["type"]) ? $this->scope["type"] : null));?>">
	<colgroup>
		<col class="icon" />
		<col class="label" />
		<col class="action" />
	</colgroup>

	<tr class="header">
		<th scope="col" class="icon">&nbsp;</th>
		<th scope="col" class="label"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["config"]["label"]) ? $this->scope["config"]["label"]:null), null);?></th>
		<th scope="col" class="actions last">&nbsp;</th>
	</tr>

<?php 
$_fh0_data = (isset($this->scope["records"]) ? $this->scope["records"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['record'])
	{
/* -- foreach start output */
?>
	<tr class="<?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?> <?php echo Dwoo_Plugin_getRecordBooleanColumnsClassnames($this, (isset($this->scope["record"]) ? $this->scope["record"] : null));?>">
		<td class="icon"></td>
		<td class="recordtype">
			<a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.Records.edit('<?php echo $this->scope["extKey"];?>', '<?php echo $this->scope["type"];?>', <?php echo $this->scope["record"]["id"];?>)" title="ID: <?php echo $this->scope["record"]["id"];?>">
				<?php echo TodoyuLabelManager::getLabel((isset($this->scope["record"]["label"]) ? $this->scope["record"]["label"]:null), true);?>

			</a>
		</td>
		<td class="actions">
			<div class="icon edit" onclick="Todoyu.Ext.sysmanager.Records.edit('<?php echo $this->scope["extKey"];?>', '<?php echo $this->scope["type"];?>', <?php echo $this->scope["record"]["id"];?>)"></div>
			<?php if ((isset($this->scope["record"]["isDeletable"]) ? $this->scope["record"]["isDeletable"]:null)) {
?>
				<div class="icon delete" onclick="Todoyu.Ext.sysmanager.Records.remove('<?php echo $this->scope["extKey"];?>', '<?php echo $this->scope["type"];?>', <?php echo $this->scope["record"]["id"];?>)"></div>
			<?php 
}
else {
?>
				<div class="icon delete disabled"></div>
			<?php 
}?>

		</td>
	</tr>
<?php 
/* -- foreach end output */
	}
}?>


</table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>