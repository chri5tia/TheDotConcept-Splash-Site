<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
echo $this->scope["form"];?>


<ul class="list">
	<?php 
$_fh1_data = (isset($this->scope["items"]) ? $this->scope["items"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['item'])
	{
/* -- foreach start output */
?>
		<li id="item-<?php echo $this->scope["item"]["id"];?>"><?php echo $this->scope["item"]["label"];?><span class="remove"></span></li>
	<?php 
/* -- foreach end output */
	}
}?>

</ul><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>