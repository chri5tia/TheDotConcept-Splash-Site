<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
if (sizeof((isset($this->scope["records"]) ? $this->scope["records"] : null)) > 0) {
?>
	<span class="icon"></span>
	<span class="label"><?php echo TodoyuLabelManager::getLabel('contact.form.warning.duplicatedEntries', null);?>:</span>

	<ul class="duplicatedList">
		<?php 
$_fh0_data = (isset($this->scope["records"]) ? $this->scope["records"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['record'])
	{
/* -- foreach start output */
?>
			<li><?php echo $this->scope["record"]["title"];?></li>
		<?php 
/* -- foreach end output */
	}
}?>

	</ul>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>