<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!-- <ul id="<?php echo $this->scope["id"];?>-menu"> -->
	<?php 
$_fh8_data = (isset($this->scope["items"]) ? $this->scope["items"] : null);
if ($this->isArray($_fh8_data) === true)
{
	foreach ($_fh8_data as $this->scope['item'])
	{
/* -- foreach start output */
?>
		<li class="<?php echo $this->scope["item"]["class"];?>" id="menuItem-<?php echo $this->scope["item"]["id"];?>">
			<a class="<?php echo $this->scope["name"];?>-item-<?php echo $this->scope["item"]["id"];?>"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["item"]["label"]) ? $this->scope["item"]["label"]:null), null);?></a>
		</li>
	<?php 
/* -- foreach end output */
	}
}?>

<!-- </ul> --><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>