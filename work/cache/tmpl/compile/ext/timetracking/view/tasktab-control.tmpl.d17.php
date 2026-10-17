<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ;
if ((isset($this->scope["trackable"]) ? $this->scope["trackable"] : null) || (isset($this->scope["running"]) ? $this->scope["running"] : null)) {
?>
	<?php echo Dwoo_Plugin_Button($this, (isset($this->scope["buttonLabel"]) ? $this->scope["buttonLabel"] : null), "Todoyu.Ext.timetracking.Task.".(isset($this->scope["function"]) ? $this->scope["function"] : null)."(".(isset($this->scope["idTask"]) ? $this->scope["idTask"] : null).")", (isset($this->scope["class"]) ? $this->scope["class"] : null), "task-".(isset($this->scope["idTask"]) ? $this->scope["idTask"] : null)."-timetracking-button", '', '', true, false, '');?>

<?php 
}?>


<div class="trackingInfo">

	<span class="trackedTime">
		<?php if ((isset($this->scope["totalTrackedTime"]) ? $this->scope["totalTrackedTime"] : null) > 0) {
?>
			<span class="label"><?php echo TodoyuLabelManager::getLabel('timetracking.ext.totalTrackedTime', null);?></span>
			<span id="task-<?php echo $this->scope["idTask"];?>-timetrack-trackedtime" class="time"><?php echo TodoyuTime::formatTime((isset($this->scope["totalTrackedTime"]) ? $this->scope["totalTrackedTime"] : null), true);?></span>
		<?php 
}
else {
?>
			<span><?php echo TodoyuLabelManager::getLabel('timetracking.ext.noTracksYet', null);?></span>
		<?php 
}?>

	</span>

	<span class="currentTime">
		<span class="label">| +</span>
		<span id="task-<?php echo $this->scope["idTask"];?>-timetrack-currentsession" class="time"><?php echo TodoyuTime::formatTime((isset($this->scope["trackedTime"]) ? $this->scope["trackedTime"] : null), true);?></span>
	</span>

	<span class="totalChargeableTime">
		<span class="label"><?php echo TodoyuLabelManager::getLabel('timetracking.ext.totalChargeableTime', null);?>:</span>
		<span class="time" id="task-<?php echo $this->scope["idTask"];?>-timetrack-chargeabletime"><?php echo TodoyuTime::formatTime((isset($this->scope["totalChargeableTime"]) ? $this->scope["totalChargeableTime"] : null), true);?></span>
	</span>

</div>
<div class="clear"><!-- //--></div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>