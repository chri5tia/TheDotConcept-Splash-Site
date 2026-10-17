<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="contentMessage <?php echo $this->scope["class"];?>">
	<div class="icon"></div>
	<div class="text">
		<?php if ((isset($this->scope["content"]) ? $this->scope["content"] : null)) {
?>
			<?php echo $this->scope["content"];?>

		<?php 
}
else {
?>
			<ul>
				<?php 
$_fh4_data = (isset($this->scope["labels"]) ? $this->scope["labels"] : null);
if ($this->isArray($_fh4_data) === true)
{
	foreach ($_fh4_data as $this->scope['label'])
	{
/* -- foreach start output */
?>
					<li><?php echo TodoyuLabelManager::getLabel((isset($this->scope["label"]) ? $this->scope["label"] : null), null);?></li>
				<?php 
/* -- foreach end output */
	}
}?>

			</ul>
		<?php 
}?>

	</div>
	<div class="clear"></div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>