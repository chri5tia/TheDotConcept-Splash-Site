<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><div class="tabBlock overflow assetsButtons" id="<?php echo $this->scope["recordType"];?>-<?php echo $this->scope["idRecord"];?>-assets-commands">

	<form name="asset" id="<?php echo $this->scope["recordType"];?>-<?php echo $this->scope["idRecord"];?>-asset-form" class="directUploadForm directUpload directUploadBox" method="post" enctype="multipart/form-data" action="index.php?ext=assets&amp;controller=upload">
		<input type="hidden"	name="MAX_FILE_SIZlist.tmplE"	value="50000000" />
		<input type="hidden"	name="asset[id_record]"	value="<?php echo $this->scope["idRecord"];?>" />
		<input type="hidden"	name="asset[recordType]" value="<?php echo $this->scope["recordType"];?>" />
		<input type="file"		name="asset[file]"		id="<?php echo $this->scope["recordType"];?>-<?php echo $this->scope["idRecord"];?>-asset-file"		onchange="Todoyu.Ext.assets.Upload.onChange(<?php echo $this->scope["idRecord"];?>, '<?php echo $this->scope["recordType"];?>')" />
	</form>

	<?php echo Dwoo_Plugin_Button($this, "assets.ext.upload.new", '', "upload", "".(isset($this->scope["recordType"]) ? $this->scope["recordType"] : null)."-".(isset($this->scope["idRecord"]) ? $this->scope["idRecord"] : null)."-asset-button-upload", '', '', false, false, '');?>

	<?php echo Dwoo_Plugin_Button($this, "assets.ext.download.selection", "Todoyu.Ext.assets.downloadSelection(".(isset($this->scope["idRecord"]) ? $this->scope["idRecord"] : null).", '".(isset($this->scope["recordType"]) ? $this->scope["recordType"] : null)."')", "downloadSelection", "".(isset($this->scope["recordType"]) ? $this->scope["recordType"] : null)."-".(isset($this->scope["idRecord"]) ? $this->scope["idRecord"] : null)."-asset-button-downloadselection", '', '', false, true, '');?>


	<div id="<?php echo $this->scope["recordType"];?>-<?php echo $this->scope["idRecord"];?>-asset-progress" class="uploadProgress" style="display: none">
		<span class="icon cancelUpload" onclick="Todoyu.Ext.assets.Upload.cancelUpload(<?php echo $this->scope["idRecord"];?>, '<?php echo $this->scope["recordType"];?>')"></span>
		<img src="core/asset/img/progress.gif" alt="Upload" width="128" height="15" />
	</div>

</div>
<script type="text/javascript">
Todoyu.Ext.assets.List.initControl.bind(Todoyu.Ext.assets.List, <?php echo $this->scope["idRecord"];?>, '<?php echo $this->scope["recordType"];?>').defer();
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>