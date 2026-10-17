<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="taskListing">

	<h1 class="headerLine">
		<span class="first taskDate"><?php echo TodoyuLabelManager::getLabel('portal.ext.tasktree.header.date', null);?></span>
		<span class="customer"><?php echo TodoyuLabelManager::getLabel('portal.ext.tasktree.header.customer', null);?></span>
		<span class="projectName"><?php echo TodoyuLabelManager::getLabel('project.ext.project', null);?> - <?php echo TodoyuLabelManager::getLabel('project.task.task', null);?></span>
		<span class="taskNumber"><?php echo TodoyuLabelManager::getLabel('portal.ext.tasktree.header.tasknumber', null);?></span>
		<span class="rgt"><!-- right --></span>
	</h1>

	<div class="tasks" id="tasks">
		<?php 
$_fh0_data = (isset($this->scope["tasks"]) ? $this->scope["tasks"] : null);
if ($this->isArray($_fh0_data, true) === true)
{
	foreach ($_fh0_data as $this->scope['taskHTML'])
	{
/* -- foreach start output */
?>
			<?php echo $this->scope["taskHTML"];?>

		<?php 
/* -- foreach end output */
	}
}
else {
?>
			<?php echo Todoyu::render('core/view/contentMessage.tmpl', array('labels'=>explode('|', 'portal.ext.selection.noTasksFound'),'class'=>'','content'=>''));?>

		<?php 
}?>

	</div>
</div>
<script type="text/javascript">
<?php echo $this->scope["javascript"];?>

</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>