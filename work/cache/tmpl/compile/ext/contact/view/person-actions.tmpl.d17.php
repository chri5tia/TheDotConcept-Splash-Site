<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>
<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.person.details', null);?>" class="icon info" onclick="Todoyu.Ext.contact.Person.show(<?php echo $this->scope["id"];?>)"></span>

<?php if (constant('AREA') === constant('EXTID_CONTACT')) {
?>
	<?php if (TodoyuContactPersonRights::isEditAllowed((isset($this->scope["id"]) ? $this->scope["id"] : null))) {
?>
		<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.person.edit', null);?>" class="icon edit" onclick="Todoyu.Ext.contact.Person.edit(<?php echo $this->scope["id"];?>)"></span>
	<?php 
}
else {
?>
		<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.person.edit', null);?>" class="icon edit disabled"></span>
	<?php 
}?>


	<?php if (TodoyuContactPersonRights::isDeleteAllowed((isset($this->scope["id"]) ? $this->scope["id"] : null))) {
?>
		<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.person.delete', null);?>" class="icon delete" onclick="Todoyu.Ext.contact.Person.remove(<?php echo $this->scope["id"];?>)"></span>
	<?php 
}
else {
?>
		<span title="<?php echo TodoyuLabelManager::getLabel('contact.ext.person.delete', null);?>" class="icon delete disabled"></span>
	<?php 
}?>

<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>