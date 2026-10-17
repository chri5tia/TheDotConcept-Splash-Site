<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>
<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.company.details', null);?>" class="icon info" onclick="Todoyu.Ext.contact.Company.show(<?php echo $this->scope["id"];?>)"></span>

<?php if (constant('AREA') === constant('EXTID_CONTACT')) {
?>
	<?php if (TodoyuContactCompanyRights::isEditAllowed((isset($this->scope["id"]) ? $this->scope["id"] : null))) {
?>
		<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.company.edit', null);?>" class="icon edit" onclick="Todoyu.Ext.contact.Company.edit(<?php echo $this->scope["id"];?>)"></span>
	<?php 
}
else {
?>
		<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.company.edit', null);?>" class="icon edit disabled"></span>
	<?php 
}?>


	<?php if (TodoyuContactCompanyRights::isDeleteAllowed((isset($this->scope["id"]) ? $this->scope["id"] : null))) {
?>
		<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.company.delete', null);?>" class="icon delete" onclick="Todoyu.Ext.contact.Company.remove(<?php echo $this->scope["id"];?>)"></span>
	<?php 
}
else {
?>
		<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.company.delete', null);?> - <?php echo TodoyuLabelManager::getLabel('contact.ext.company.delete.hasProjects', null);?>" class="icon delete disabled"></span>
	<?php 
}?>

<?php 
}?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>