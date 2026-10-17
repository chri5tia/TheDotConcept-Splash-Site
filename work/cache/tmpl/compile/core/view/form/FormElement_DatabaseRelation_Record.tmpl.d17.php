<?php
/* template head */
if (function_exists('Dwoo_Plugin_getRecordBooleanColumnsClassnames')===false)
	$this->getLoader()->loadPlugin('getRecordBooleanColumnsClassnames');
/* end template head */ ob_start(); /* template body */ ?><div id="foreignrecord-<?php echo $this->scope["idRecord"];?>-<?php echo $this->scope["fieldname"];?>-<?php echo $this->scope["record"]["_index"];?>" class="databaseRelation <?php echo Dwoo_Plugin_getRecordBooleanColumnsClassnames($this, (isset($this->scope["record"]) ? $this->scope["record"] : null));?>">
	<div id="foreignrecord-<?php echo $this->scope["idRecord"];?>-<?php echo $this->scope["fieldname"];?>-<?php echo $this->scope["record"]["_index"];?>-trigger" onclick="Todoyu.Form.toggleRecordForm(<?php echo $this->scope["idRecord"];?>, '<?php echo $this->scope["fieldname"];?>', <?php echo $this->scope["record"]["_index"];?>)" class="formtrigger">
		<span class="label <?php if ((isset($this->scope["error"]) ? $this->scope["error"] : null)) {
?>expanded<?php 
}?>" title="<?php echo TodoyuLabelManager::getLabel('core.form.records.edit', null);?>"><?php echo TodoyuString::crop(htmlentities((isset($this->scope["record"]["_label"]) ? $this->scope["record"]["_label"]:null), ENT_QUOTES, 'UTF-8', false), 60, '..', true);?></span>
		<span class="additionalStuff">
			<a href="javascript:void(0)" id="foreignrecord-<?php echo $this->scope["idRecord"];?>-<?php echo $this->scope["fieldname"];?>-<?php echo $this->scope["record"]["_index"];?>-remove" class="icon remove removeForeignRecord remove-<?php echo $this->scope["fieldname"];?>" onclick="Todoyu.Form.removeRecord(<?php echo $this->scope["idRecord"];?>, '<?php echo $this->scope["fieldname"];?>', <?php echo $this->scope["record"]["_index"];?>)" title="<?php echo TodoyuLabelManager::getLabel('core.form.records.remove', null);?>" alt="<?php echo TodoyuLabelManager::getLabel('form.records.remove', null);?>">
				<span class="hidden"><?php echo TodoyuLabelManager::getLabel('core.form.records.remove', null);?></span>
			</a>
		</span>
	</div>
	<div id="foreignrecord-<?php echo $this->scope["idRecord"];?>-<?php echo $this->scope["fieldname"];?>-<?php echo $this->scope["record"]["_index"];?>-formhtml" class="databaseRelationFormhtml" <?php if ((isset($this->scope["error"]) ? $this->scope["error"] : null) != true) {
?>style="display:none"<?php 
}?>>
		<?php echo $this->scope["record"]["_formHTML"];?>

	</div>
	<div class="clear"><!-- --></div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>