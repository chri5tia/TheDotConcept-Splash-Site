<?php
/* template head */
if (function_exists('Dwoo_Plugin_Header')===false)
	$this->getLoader()->loadPlugin('Header');
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ;
echo Dwoo_Plugin_Header($this, "LLL:sysmanager.ext.rights.header", '', true);?>

<?php echo $this->scope["form"];?>


<div class="saveButtonBox">
	<?php echo Dwoo_Plugin_Button($this, "sysmanager.ext.rights.save", "Todoyu.Ext.sysmanager.RightsEditor.saveRights()", "save", '', '', '', false, false, '');?>

</div>

<div id="rightsmatrix">
	<?php echo $this->scope["matrix"];?>

</div>

<div class="saveButtonBox">
	<?php echo Dwoo_Plugin_Button($this, "sysmanager.ext.rights.save", "Todoyu.Ext.sysmanager.RightsEditor.saveRights()", "fElement save", '', '', '', false, false, '');?>

</div>

<script type="text/javascript">
	Todoyu.Ext.sysmanager.RightsEditor.init();
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>