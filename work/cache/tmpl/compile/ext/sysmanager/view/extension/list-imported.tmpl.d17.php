<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
if (function_exists('Dwoo_Plugin_ExtensionStatusIcon')===false)
	$this->getLoader()->loadPlugin('ExtensionStatusIcon');
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ;
'';// checking for modification in file:ext/sysmanager/view/extension/list-base.tmpl
if (!("1363899064" == filemtime('ext/sysmanager/view/extension/list-base.tmpl'))) { ob_end_clean(); return false; };
echo $this->scope["tabs"];?>


<?php echo '<h5>' . htmlentities(Todoyu::Label("LLL:sysmanager.ext.notInstalledExtensions"), ENT_QUOTES, 'UTF-8', false) . '</h5>';?>


	<?php if (sizeof((isset($this->scope["extensions"]) ? $this->scope["extensions"] : null)) > 0) {
?>
		<?php echo Todoyu::render('core/view/contentMessage.tmpl', array('labels'=>explode('|', "sysmanager.extension.imported.info"),'class'=>"importInfo",'content'=>''));?>

	<?php 
}?>


<?php if (sizeof((isset($this->scope["extensions"]) ? $this->scope["extensions"] : null)) > 0) {
?>
	<table class="list extlist">
		<colgroup>
			<col class="icon" />
			<col class="extkey" />
			<col class="title" />
			<col class="edit" />
			<col class="version" />
			<col class="state" />
			<col class="download" />
			<col class="doc" />
		</colgroup>

		<?php echo Dwoo_Plugin_include($this, "list-header.tmpl", null, null, null, '_root', null);?>

		<?php 
$_fh0_data = (isset($this->scope["extensions"]) ? $this->scope["extensions"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['extKey']=>$this->scope['extInfo'])
	{
/* -- foreach start output */
?>
			<?php if ((isset($this->scope["extInfo"]) ? $this->scope["extInfo"] : null)) {
?>
				<?php $this->scope["extTitle"]=((isset($this->scope["extKey"]) ? $this->scope["extKey"] : null)).('.ext.ext.title')?>

			<?php 
}
else {
?>
				<?php $this->scope["extTitle"]='sysmanager.extension.missing'?>

			<?php 
}?>

			<?php $this->scope["extTitle"]=TodoyuLabelManager::getLabel((isset($this->scope["extTitle"]) ? $this->scope["extTitle"] : null), null)?>

			<tr class="<?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?> <?php echo $this->scope["extKey"];
if (! (isset($this->scope["extInfo"]) ? $this->scope["extInfo"] : null)) {
?> missing<?php 
}?>">
				<td class="icon"><a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.Extensions.showTab('<?php echo $this->scope["extKey"];?>', 'info')"><?php echo '<img src="ext/' . (isset($this->scope["extKey"]) ? $this->scope["extKey"] : null) . '/asset/img/exticon.png" width="16" height="16" />';?></a></td>
				<td class="extkey" title="<?php echo $this->scope["extKey"];?>"><div class="overflow"><?php echo $this->scope["extKey"];?></div></td>
				<td class="title"><div class="overflow"><?php echo htmlentities((isset($this->scope["extTitle"]) ? $this->scope["extTitle"] : null), ENT_QUOTES, 'UTF-8', false);?></div></td>

					<td class="edit">
		<a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.Extensions.Install.install('<?php echo $this->scope["extKey"];?>')" title="<?php echo TodoyuLabelManager::getLabel('sysmanager.extension.install', null);?>" class="install">
			<span class="hidden">install</span>
		</a>

		<a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.Extensions.remove('<?php echo $this->scope["extKey"];?>')" title="<?php echo TodoyuLabelManager::getLabel('sysmanager.extension.remove', null);?>" class="remove">
			<span class="hidden">remove</span>
		</a>

		<a href="javascript:void(0)" title="<?php echo TodoyuLabelManager::getLabel('sysmanager.extension.showInfo', null);?>"
			<?php if (TodoyuSysmanagerExtManager::getExtInfos((isset($this->scope["extKey"]) ? $this->scope["extKey"] : null)) !== false) {
?>
				onclick="Todoyu.Ext.sysmanager.Extensions.showTab('<?php echo $this->scope["extKey"];?>', 'info')" class="info">
			<?php 
}
else {
?>
				class="info disabled">
			<?php 
}?>

			<span class="hidden">info</span>
		</a>
	</td>

				<td class="version"><?php echo $this->scope["extInfo"]["version"];?></td>
				<td class="state">
					<?php if ((isset($this->scope["extInfo"]) ? $this->scope["extInfo"] : null)) {
?>
						<?php echo Dwoo_Plugin_ExtensionStatusIcon($this, (isset($this->scope["extInfo"]["state"]) ? $this->scope["extInfo"]["state"]:null));?>

					<?php 
}?>

				</td>
				<?php if( TodoyuRightsManager::isAllowed('sysmanager','extensions:download') ) {?>
					<td class="download">
						<?php if ((isset($this->scope["extInfo"]) ? $this->scope["extInfo"] : null)) {
?>
						<a title="<?php echo TodoyuLabelManager::getLabel('sysmanager.extension.download', null);?>" class="icon download" href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.Extensions.download('<?php echo $this->scope["extKey"];?>')">
							<span class="hidden"><?php echo TodoyuLabelManager::getLabel('core.file.download', null);?></span>
						</a>
						<?php 
}?>

					</td>
				<?php }?>

				<td class="doc">
					<?php if ((isset($this->scope["extInfo"]) ? $this->scope["extInfo"] : null)) {
?>
					<a title="<?php echo TodoyuLabelManager::getLabel('sysmanager.extension.documentation', null);?>" class="icon doc" href="<?php echo $this->scope["extInfo"]["urlDocumentation"];?>" target="_blank">
						<span class="hidden"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.documentation', null);?></span>
					</a>
					<?php 
}?>

				</td>
			</tr>
		<?php 
/* -- foreach end output */
	}
}?>


	</table>
<?php 
}
else {
?>
		<div class="contentMessage importInfo">
		<div class="icon"></div>
		<?php echo TodoyuLabelManager::getLabel('sysmanager.extension.install.allinstalled', null);?>

	</div>
<?php 
}?>


	<div class="installAlternatives">
		<?php echo Dwoo_Plugin_Button($this, "sysmanager.extension.loadfromter", "Todoyu.Ext.sysmanager.Extensions.showTab('', 'search')", "ter", '', '', '', false, false, '');?>

		<?php echo Dwoo_Plugin_Button($this, "sysmanager.extension.importfromarchive", "Todoyu.Ext.sysmanager.Extensions.Import.showImportDialog()", "upload", '', '', '', false, false, '');?>

	</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>