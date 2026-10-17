<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
if (! (isset($this->scope["listOnly"]) ? $this->scope["listOnly"] : null)) {
?>
	<?php echo $this->scope["searchForm"];?>

<?php 
}?>


<?php if (! (isset($this->scope["listOnly"]) ? $this->scope["listOnly"] : null)) {
?>
<ul id="panelwidget-<?php echo $this->scope["id"];?>-list" class="searchList">
<?php 
}?>


<?php 
$_fh0_data = (isset($this->scope["items"]) ? $this->scope["items"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['item'])
	{
/* -- foreach start output */
?>
	<li id="panelwidget-<?php echo $this->scope["id"];?>-item-<?php echo $this->scope["item"]["id"];?>" class="<?php echo $this->scope["item"]["class"];?>">
		<a href="javascript:void(0)" <?php if ((isset($this->scope["item"]["title"]) ? $this->scope["item"]["title"]:null)) {
?>title="<?php echo $this->scope["item"]["title"];?>"<?php 
}?>>
			<?php echo htmlentities((isset($this->scope["item"]["label"]) ? $this->scope["item"]["label"]:null), ENT_QUOTES, 'UTF-8', false);?>

		</a>
	</li>
<?php 
/* -- foreach end output */
	}
}?>


<?php if (! (isset($this->scope["listOnly"]) ? $this->scope["listOnly"] : null)) {
?>
</ul>
<?php 
}?>



<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>