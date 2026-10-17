<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><ul>
<?php 
$_fh0_data = (isset($this->scope["results"]) ? $this->scope["results"] : null);
if ($this->isArray($_fh0_data, true) === true)
{
	foreach ($_fh0_data as $this->scope['key']=>$this->scope['title'])
	{
/* -- foreach start output */
?>
	<li id="<?php echo $this->scope["key"];?>"><?php echo $this->scope["title"];?></li>
<?php 
/* -- foreach end output */
	}
}
else {
?>
	<li class="empty"></li>
<?php 
}?>

</ul><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>