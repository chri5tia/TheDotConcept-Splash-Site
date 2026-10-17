<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="head">
	<ul id="headlets">
		<?php 
$_fh9_data = (isset($this->scope["headlets"]) ? $this->scope["headlets"] : null);
if ($this->isArray($_fh9_data) === true)
{
	foreach ($_fh9_data as $this->scope['headlet'])
	{
/* -- foreach start output */
?>
			<li id="<?php echo $this->scope["headlet"]["name"];?>" class="headlet <?php echo $this->scope["headlet"]["type"];?> <?php echo $this->scope["headlet"]["class"];?>" title="<?php echo $this->scope["headlet"]["label"];?>">
				<?php echo $this->scope["headlet"]["content"];?>

			</li>
		<?php 
/* -- foreach end output */
	}
}?>

	</ul>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>