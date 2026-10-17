<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><a id="<?php echo $this->scope["id"];?>-button" <?php 
$_fh6_data = (isset($this->scope["buttonAttributes"]) ? $this->scope["buttonAttributes"] : null);
if ($this->isArray($_fh6_data) === true)
{
	foreach ($_fh6_data as $this->scope['buttonAttributeName']=>$this->scope['buttonAttributeValue'])
	{
/* -- foreach start output */

echo $this->scope["buttonAttributeName"];?>="<?php echo $this->scope["buttonAttributeValue"];?>" <?php 
/* -- foreach end output */
	}
}?>>&nbsp;</a>

<?php if ((isset($this->scope["content"]) ? $this->scope["content"] : null)) {
?>
<ul id="<?php echo $this->scope["id"];?>-content" class="content " <?php if (! (isset($this->scope["open"]) ? $this->scope["open"] : null)) {
?>style="display:none"<?php 
}?>>
	<?php echo $this->scope["content"];?>

</ul>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>