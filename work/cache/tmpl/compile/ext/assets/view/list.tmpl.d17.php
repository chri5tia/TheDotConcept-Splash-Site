<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
if (function_exists('Dwoo_Plugin_isAssetGDcompatibleImage')===false)
	$this->getLoader()->loadPlugin('isAssetGDcompatibleImage');
if (function_exists('Dwoo_Plugin_taskNumber')===false)
	$this->getLoader()->loadPlugin('taskNumber');
if (function_exists('Dwoo_Plugin_isAssetDeleteAllowed')===false)
	$this->getLoader()->loadPlugin('isAssetDeleteAllowed');
/* end template head */ ob_start(); /* template body */ ?><div id="<?php echo $this->scope["recordType"];?>-<?php echo $this->scope["idRecord"];?>-assets-list" class="tabBlock overflow assetList">
	<table id="<?php echo $this->scope["recordType"];?>-<?php echo $this->scope["idRecord"];?>-assettable" class="assetTable" width="100%">
		<thead>
			<tr class="assets-table-header">
				<th class="checkbox checkbox"><input type="checkbox" id="<?php echo $this->scope["recordType"];?>-<?php echo $this->scope["idRecord"];?>-assets-checkallbox" title="<?php echo TodoyuLabelManager::getLabel('assets.ext.alt.selectall', null);?>"/></th>
				<th class="mimetype">&nbsp;</th>
				<th class="filename"><?php echo TodoyuLabelManager::getLabel('core.file.filename', null);?></th>
				<th class="parent">&nbsp;</th>
				<th class="person"><?php echo TodoyuLabelManager::getLabel('core.global.id_person_create', null);?></th>
				<th class="filesize">&nbsp;</th>
				<th class="uploaddate">&nbsp;</th>
				<th class="actions">&nbsp;</th>
			</tr>
		</thead>
		<tbody id="<?php echo $this->scope["recordType"];?>-<?php echo $this->scope["idRecord"];?>-assets-tablebody">
		<?php 
$_fh1_data = (isset($this->scope["assets"]) ? $this->scope["assets"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['type']=>$this->scope['typeAssets'])
	{
/* -- foreach start output */
?>
			<?php 
$_fh0_data = (isset($this->scope["typeAssets"]) ? $this->scope["typeAssets"] : null);
$this->globals["foreach"]['assetList'] = array
(
	"index"		=> 0,
	"first"		=> null,
);
$_fh0_glob =& $this->globals["foreach"]['assetList'];
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['key']=>$this->scope['asset'])
	{
		$_fh0_glob["first"] = (string) ($_fh0_glob["index"] === 0);
/* -- foreach start output */
?>
				<?php if ((isset($this->globals["foreach"]["assetList"]["first"]) ? $this->globals["foreach"]["assetList"]["first"]:null)) {
?>
					<tr class="typeHeadline">
						<td colspan="8">
							<h4><?php echo TodoyuLabelManager::getLabel('assets.ext.type.'.(isset($this->scope["type"]) ? $this->scope["type"] : null).'', null);?></h4>
						</td>
					</tr>
				<?php 
}?>


				<tr id="<?php echo $this->scope["recordType"];?>-asset-<?php echo $this->scope["asset"]["id"];?>" class="<?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?> asset">
					<td class="checkbox">
						<input type="checkbox" id="<?php echo $this->scope["recordType"];?>-asset-<?php echo $this->scope["asset"]["id"];?>-checkbox" value="<?php echo $this->scope["asset"]["id"];?>" />
					</td>
					<td class="mimetype mime<?php echo strtoupper((isset($this->scope["asset"]["file_ext"]) ? $this->scope["asset"]["file_ext"]:null));?> <?php if (Dwoo_Plugin_isAssetGDcompatibleImage($this, (isset($this->scope["asset"]["id"]) ? $this->scope["asset"]["id"]:null))) {
?>quickInfoAsset<?php 
}?>" id="asset-<?php echo $this->scope["asset"]["id"];?>-mime">
						<span class="icon"></span>
					</td>
					<td class="filename <?php if (Dwoo_Plugin_isAssetGDcompatibleImage($this, (isset($this->scope["asset"]["id"]) ? $this->scope["asset"]["id"]:null))) {
?>quickInfoAsset<?php 
}?>" id="asset-<?php echo $this->scope["asset"]["id"];?>-filename">
						<a href="javascript:void(0)" title="<?php echo TodoyuLabelManager::getLabel('assets.ext.alt.download', null);?>">
							<?php echo $this->scope["asset"]["file_name"];?>

						</a>
					</td>
					<td class="parent">
						<?php if ((isset($this->scope["asset"]["parenttype"]) ? $this->scope["asset"]["parenttype"]:null) == constant('ASSET_PARENTTYPE_TASK') && (isset($this->scope["recordType"]) ? $this->scope["recordType"] : null) !== 'task') {
?>
							<?php echo TodoyuProjectTaskManager::linkTaskIDsInText(Dwoo_Plugin_taskNumber($this, (isset($this->scope["asset"]["id_parent"]) ? $this->scope["asset"]["id_parent"]:null)));?>

						<?php 
}
elseif ((isset($this->scope["asset"]["parenttype"]) ? $this->scope["asset"]["parenttype"]:null) == constant('ASSET_PARENTTYPE_COMMENT')) {
?>
							<?php echo TodoyuCommentCommentManager::linkCommentIDsInText('c'.(isset($this->scope["asset"]["id_parent"]) ? $this->scope["asset"]["id_parent"]:null).'');?>

						<?php 
}?>

					</td>
					<td class="person">
						<?php echo TodoyuContactPersonManager::getPerson((isset($this->scope["asset"]["id_person_create"]) ? $this->scope["asset"]["id_person_create"]:null))->getFullName(true);?>

					</td>
					<td class="filesize">
						<?php echo TodoyuString::formatSize((isset($this->scope["asset"]["file_size"]) ? $this->scope["asset"]["file_size"]:null));?>

					</td>
					<td class="uploaddate">
						<span title="<?php echo TodoyuLabelManager::getLabel('assets.ext.alt.uploadedby', null);?> <?php echo TodoyuContactPersonManager::getPerson((isset($this->scope["asset"]["id_person_create"]) ? $this->scope["asset"]["id_person_create"]:null))->getFullName(true);?>"><?php echo TodoyuTime::format((isset($this->scope["asset"]["date_create"]) ? $this->scope["asset"]["date_create"]:null), 'datetime');?></span>
					</td>
					<td class="actions">
						<?php if (Dwoo_Plugin_isAssetDeleteAllowed($this, (isset($this->scope["asset"]["id"]) ? $this->scope["asset"]["id"]:null))) {
?>
							<a id="<?php echo $this->scope["recordType"];?>-asset-<?php echo $this->scope["asset"]["id"];?>-icon-delete" href="javascript:void(0)" title="<?php echo TodoyuLabelManager::getLabel('assets.ext.alt.delete', null);?>" class="delete asset-icon-delete">
								<span class="hidden"><?php echo TodoyuLabelManager::getLabel('assets.ext.alt.delete', null);?></span>
							</a>
						<?php 
}?>

						<a id="<?php echo $this->scope["recordType"];?>-asset-<?php echo $this->scope["asset"]["id"];?>-icon-download" href="javascript:void(0)" title="<?php echo TodoyuLabelManager::getLabel('assets.ext.alt.download', null);?>" class="download asset-icon-download">
							<span class="hidden"><?php echo TodoyuLabelManager::getLabel('assets.ext.alt.download', null);?></span>
						</a>

						<?php if (TodoyuAuth::isInternal()) {
?>
							<a id="<?php echo $this->scope["recordType"];?>-asset-<?php echo $this->scope["asset"]["id"];?>-icon-public" href="javascript:void(0)" title="<?php echo TodoyuLabelManager::getLabel('assets.ext.alt.changeVisibility', null);?>" class="visibility asset-icon-public <?php if (! (isset($this->scope["asset"]["is_public"]) ? $this->scope["asset"]["is_public"]:null)) {
?>not<?php 
}?>">
								<span class="hidden"><?php echo TodoyuLabelManager::getLabel('assets.ext.alt.changeVisibility', null);?></span>
							</a>
						<?php 
}?>

					</td>
				</tr>
			<?php 
/* -- foreach end output */
		$_fh0_glob["index"]+=1;
	}
}?>

		<?php 
/* -- foreach end output */
	}
}?>

		</tbody>
	</table>
</div>
<script type="text/javascript">
	Todoyu.Ext.assets.List.initList(<?php echo $this->scope["idRecord"];?>, '<?php echo $this->scope["recordType"];?>');
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>