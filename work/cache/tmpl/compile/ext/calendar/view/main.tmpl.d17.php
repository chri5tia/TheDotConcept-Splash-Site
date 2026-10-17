<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="calendar" <?php if (! (isset($this->scope["showCalendar"]) ? $this->scope["showCalendar"] : null)) {
?>style="display:none"<?php 
}?>>

	<h1 id="calendar-header" class="headerLine">
		<span id="calendar-title"></span>
		<span id="calendar-quicknav" class="dateNavi">
			<span id="calendar-quicknav-backward" title="<?php echo TodoyuLabelManager::getLabel('calendar.ext.quicknav.backward.title', null);?>" class="icon goBackward" onclick="Todoyu.Ext.calendar.Navi.goBackward()"></span>
			<span id="calendar-quicknav-today" title="<?php echo TodoyuLabelManager::getLabel('calendar.ext.quicknav.today.title', null);?>" class="icon goToday" onclick="Todoyu.Ext.calendar.Navi.goToday()"></span>
			<span id="calendar-quicknav-forward" title="<?php echo TodoyuLabelManager::getLabel('calendar.ext.quicknav.forward.title', null);?>" class="icon goForward" onclick="Todoyu.Ext.calendar.Navi.goForward()"></span>
			<span id="calendar-quicknav-toggleDayView" title="<?php echo TodoyuLabelManager::getLabel('calendar.ext.quicknav.toggleDayView.title', null);?>" class="icon toggleDayView" onclick="Todoyu.Ext.calendar.CalendarBody.toggleFullDayView()"></span>
			<span id="calendar-quicknav-toggleWeekend" title="<?php echo TodoyuLabelManager::getLabel('calendar.ext.quicknav.toggleWeekend.title', null);?>" class="icon toggleWeekend" onclick="Todoyu.Ext.calendar.CalendarBody.toggleWeekend()"></span>
		</span>
	</h1>

	<div id="calendar-body">
		<?php if ((isset($this->scope["showCalendar"]) ? $this->scope["showCalendar"] : null)) {
?>
			<?php echo $this->scope["content"];?>

			<script type="text/javascript">
				Todoyu.Ext.calendar.CalendarBody.setCompactViewRange(<?php echo $this->scope["rangeStart"];?>, <?php echo $this->scope["rangeEnd"];?>, false);
			</script>
		<?php 
}?>

	</div>

</div>

<div id="calendar-edit" <?php if ((isset($this->scope["tab"]) ? $this->scope["tab"] : null) != 'edit') {
?>style="display:none"<?php 
}?>>
<?php if ((isset($this->scope["tab"]) ? $this->scope["tab"] : null) == 'edit') {
?>
	<?php echo $this->scope["content"];?>

<?php 
}?>

</div>

<div id="calendar-view" <?php if ((isset($this->scope["tab"]) ? $this->scope["tab"] : null) != 'view') {
?>style="display:none"<?php 
}?>>
<?php if ((isset($this->scope["tab"]) ? $this->scope["tab"] : null) == 'view') {
?>
	<?php echo $this->scope["content"];?>

	<script>
	Todoyu.Ext.calendar.setTime.bind(Todoyu.Ext.calendar).delay(1, <?php echo $this->scope["date"];?>, true);
	</script>
<?php 
}?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>