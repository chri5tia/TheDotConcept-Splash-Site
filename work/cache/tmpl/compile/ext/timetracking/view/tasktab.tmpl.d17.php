<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
if( TodoyuRightsManager::isAllowed('timetracking','task:track') ) {?>
	<div id="task-<?php echo $this->scope["idTask"];?>-timetrack-control" class="trackingControl tabBlock overflow">
		<?php echo $this->scope["trackingControl"];?>

	</div>
<?php }?>


<div id="task-<?php echo $this->scope["idTask"];?>-timetracks" class="timetracks">
	<?php echo $this->scope["tracksList"];?>

</div>
<div class="clear"><!-- --></div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>