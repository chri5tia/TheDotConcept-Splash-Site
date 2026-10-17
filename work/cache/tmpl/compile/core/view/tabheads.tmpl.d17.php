<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><ul id="<?php echo $this->scope["name"];?>-tabs" class="tabs <?php echo $this->scope["class"];?>" >
	<?php 
$_fh3_data = (isset($this->scope["tabs"]) ? $this->scope["tabs"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['tab'])
	{
/* -- foreach start output */
?>
		<?php echo Dwoo_Plugin_include($this, "tabhead.tmpl", null, null, null, '_root', null);?>

	<?php 
/* -- foreach end output */
	}
}?>

</ul>
<script type="text/javascript">
Todoyu.Tabs.create('<?php echo $this->scope["name"];?>', <?php echo $this->scope["jsHandler"];?>);
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>