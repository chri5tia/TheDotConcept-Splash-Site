<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?>

<?php echo Dwoo_Plugin_include($this, "core/view/copyright_notice.tmpl", null, null, null, '_root', null);?>


	// ****************************************************************************
	// ATTENTION - TODOYU MANAGED FILE
	// THIS FILE IS AUTOMATICALLY UPDATED BY TODOYU
	//
	// EVERYTHING EXCEPT THE 'extConf' KEYS WILL BE REMOVED ON NEXT CONFIG UPDATE
	// ****************************************************************************

	// Extension config
<?php 
$_fh0_data = (isset($this->scope["extConf"]) ? $this->scope["extConf"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['extKey']=>$this->scope['confString'])
	{
/* -- foreach start output */
?>
Todoyu::$CONFIG['EXT']['<?php echo $this->scope["extKey"];?>']['extConf'] = unserialize(stripslashes('<?php echo $this->scope["confString"];?>'));
<?php 
/* -- foreach end output */
	}
}?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>