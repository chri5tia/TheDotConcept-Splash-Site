<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="news-local">
	<p>todoyu is optimized for Firefox. We also support Safari, Chrome and Internet Explorer.</p>
</div>

<?php if ((isset($this->scope["content"]) ? $this->scope["content"] : null)) {
?>
	<div id="news-live" style="display:none">
		<?php echo $this->scope["content"];?>

	</div>
<?php 
}?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>