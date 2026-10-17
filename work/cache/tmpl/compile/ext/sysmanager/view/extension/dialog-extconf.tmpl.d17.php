<?php
/* template head */
if (function_exists('Dwoo_Plugin_Header')===false)
	$this->getLoader()->loadPlugin('Header');
/* end template head */ ob_start(); /* template body */ ;
echo Dwoo_Plugin_Header($this, "LLL:sysmanager.ext.extconf.header", '', true);?>


<?php if ((isset($this->scope["hasConf"]) ? $this->scope["hasConf"] : null)) {
?>
	<div class="extconfForm">
		<?php echo $this->scope["form"];?>

	</div>
<?php 
}
else {
?>
	<?php echo Todoyu::render('core/view/contentMessage.tmpl', array('labels'=>explode('|', 'sysmanager.ext.extconf.noExtConf'),'class'=>'','content'=>''));?>

<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>