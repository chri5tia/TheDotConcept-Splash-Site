<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><ul class="<?php echo $this->scope["listClass"];?> autoextend">
	<?php 
$_fh0_data = (isset($this->scope["items"]) ? $this->scope["items"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['item'])
	{
/* -- foreach start output */
?>
		<li>
			<input type="text" name="data[<?php echo $this->scope["fieldName"];?>][]" value="<?php echo $this->scope["item"];?>"/>
			<span class="remove"></span>
		</li>
	<?php 
/* -- foreach end output */
	}
}?>

	<li>
		<input type="text" name="data[<?php echo $this->scope["fieldName"];?>][]" value=""/>
		<span class="remove" style="display:none"></span>
	</li>
</ul><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>