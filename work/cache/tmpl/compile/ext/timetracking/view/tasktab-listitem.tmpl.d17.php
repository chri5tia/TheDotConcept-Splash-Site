<?php
/* template head */
if (function_exists('Dwoo_Plugin_personLabel')===false)
	$this->getLoader()->loadPlugin('personLabel');
/* end template head */ ob_start(); /* template body */ ?><span <?php if ((isset($this->scope["track"]["editable"]) ? $this->scope["track"]["editable"]:null)) {
?>class="link" onclick="Todoyu.Ext.timetracking.Task.editTrack(<?php echo $this->scope["idTask"];?>, <?php echo $this->scope["track"]["id"];?>)"<?php 
}?>>
	<span class="icon"></span>
	<span class="date"><?php echo TodoyuTime::format((isset($this->scope["track"]["date_track"]) ? $this->scope["track"]["date_track"]:null), 'D2M2Y2');?></span>
	<span class="trackedTime<?php if ((isset($this->scope["track"]["workload_chargeable"]) ? $this->scope["track"]["workload_chargeable"]:null)) {
?> hasChargeableTime<?php 
}?>"><?php echo TodoyuTime::formatTime((isset($this->scope["track"]["workload_tracked"]) ? $this->scope["track"]["workload_tracked"]:null), true);?></span>
	<span class="chargeableTime"><?php if ((isset($this->scope["track"]["workload_chargeable"]) ? $this->scope["track"]["workload_chargeable"]:null)) {

echo TodoyuTime::formatTime((isset($this->scope["track"]["workload_chargeable"]) ? $this->scope["track"]["workload_chargeable"]:null), true);

}
else {
?>&nbsp;<?php 
}?></span>
	<span class="name"><?php echo Dwoo_Plugin_personLabel($this, (isset($this->scope["track"]["id_person_create"]) ? $this->scope["track"]["id_person_create"]:null), "track_personowner", "".(isset($this->scope["track"]["id"]) ? $this->scope["track"]["id"]:null)."", 'span', '');?></span>
	<span class="comment"><?php echo htmlentities((isset($this->scope["track"]["comment"]) ? $this->scope["track"]["comment"]:null), ENT_QUOTES, 'UTF-8', false);?></span>
</span><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>