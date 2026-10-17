<?php
/* template head */
if (function_exists('Dwoo_Plugin_Header')===false)
	$this->getLoader()->loadPlugin('Header');
/* end template head */ ob_start(); /* template body */ ;
echo Dwoo_Plugin_Header($this, (isset($this->scope["header"]) ? $this->scope["header"] : null), '', true);?>


<div id="contact-form-content">
	<?php echo $this->scope["formhtml"];?>

</div>

<script type="text/javascript">
	Todoyu.Ext.contact.Upload.initRemoveContactImageButton();
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>