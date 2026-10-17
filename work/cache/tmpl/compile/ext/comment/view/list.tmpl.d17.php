<?php
/* template head */
if (function_exists('Dwoo_Plugin_isAddInTaskAllowed')===false)
	$this->getLoader()->loadPlugin('isAddInTaskAllowed');
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?>	
<div class="tabBlock overflow commentButtons" id="task-<?php echo $this->scope["idTask"];?>-comment-commands-top">
	<?php if (Dwoo_Plugin_isAddInTaskAllowed($this, (isset($this->scope["idTask"]) ? $this->scope["idTask"] : null))) {
?>
		<?php echo Dwoo_Plugin_Button($this, "comment.ext.button.addComment", "Todoyu.Ext.comment.add(".(isset($this->scope["idTask"]) ? $this->scope["idTask"] : null).")", "addComment", '', '', '', false, false, '');?>

	<?php 
}?>

	<?php if (sizeof((isset($this->scope["comments"]) ? $this->scope["comments"] : null)) > 1) {
?>
		<?php echo Dwoo_Plugin_Button($this, "comment.ext.button.reverseOrder", "Todoyu.Ext.comment.List.toggleSorting(".(isset($this->scope["idTask"]) ? $this->scope["idTask"] : null).")", "order {if ".(isset($this->scope["desc"]) ? $this->scope["desc"] : null)."}desc{/if}", '', '', '', false, false, '');?>

	<?php 
}?>

</div>

<?php if (sizeof((isset($this->scope["comments"]) ? $this->scope["comments"] : null)) > 0) {
?>
	<section class="commentList <?php if ((isset($this->scope["desc"]) ? $this->scope["desc"] : null)) {
?>desc<?php 
}
else {
?>asc<?php 
}?>" id="task-<?php echo $this->scope["idTask"];?>-comments">
	<?php 
$_fh4_data = (isset($this->scope["comments"]) ? $this->scope["comments"] : null);
if ($this->isArray($_fh4_data) === true)
{
	foreach ($_fh4_data as $this->scope['commentHTML'])
	{
/* -- foreach start output */
?>
		<?php echo $this->scope["commentHTML"];?>

	<?php 
/* -- foreach end output */
	}
}?>

	</section>
<?php 
}?>


<div class="tabBlock overflow commentButtons" id="task-<?php echo $this->scope["idTask"];?>-comment-commands-bottom">
	<?php if (Dwoo_Plugin_isAddInTaskAllowed($this, (isset($this->scope["idTask"]) ? $this->scope["idTask"] : null))) {
?>
		<?php echo Dwoo_Plugin_Button($this, "comment.ext.button.addComment", "Todoyu.Ext.comment.add(".(isset($this->scope["idTask"]) ? $this->scope["idTask"] : null).")", "addComment", '', '', '', false, false, '');?>

	<?php 
}?>

	<?php if (sizeof((isset($this->scope["comments"]) ? $this->scope["comments"] : null)) > 1) {
?>
		<?php echo Dwoo_Plugin_Button($this, "comment.ext.button.reverseOrder", "Todoyu.Ext.comment.List.toggleSorting(".(isset($this->scope["idTask"]) ? $this->scope["idTask"] : null).")", "order {if ".(isset($this->scope["desc"]) ? $this->scope["desc"] : null)."}desc{/if}", '', '', '', false, false, '');?>

	<?php 
}?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>