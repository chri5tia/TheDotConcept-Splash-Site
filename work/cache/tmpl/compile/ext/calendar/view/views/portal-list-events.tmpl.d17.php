<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
if (!function_exists('Dwoo_Plugin_eventsHeader_553466d475bb4')) {
function Dwoo_Plugin_eventsHeader_553466d475bb4(Dwoo $dwoo) {
static $_callCnt = 0;
$dwoo->scope[' 553466d475bb4'.$_callCnt] = array();
$_scope = $dwoo->setScope(array(' 553466d475bb4'.($_callCnt++)));
/* -- template start output */?>
		<h1 class="headerLine">
			<span class="first taskDate"><?php echo TodoyuLabelManager::getLabel('core.date.time', null);?></span>
			<span class="eventType"><?php echo TodoyuLabelManager::getLabel('calendar.event.tree.header.eventtype', null);?></span>
			<span class="eventTitle"><?php echo TodoyuLabelManager::getLabel('calendar.event.tree.header.title', null);?></span>
			<span class="rgt"><!-- --></span>
		</h1>
	<?php /* -- template end output */ $dwoo->setScope($_scope, true);
}
}
/* end template head */ ob_start(); /* template body */ ?><div class="portalEventsList">
	

	<?php echo Dwoo_Plugin_eventsHeader_553466d475bb4($this);?>


	<div class="events" id="events">
		<?php $this->scope["todayStart"]=TodoyuTime::getStartOfDay(time())?>

		<?php $this->scope["todayEnd"]=TodoyuTime::getDayEnd(time())?>

		<?php $this->scope["thisWeekStart"]=TodoyuTime::getWeekStart(time())?>

		<?php $this->scope["thisWeekEnd"]=TodoyuTime::getWeekEnd(time())?>

		<?php $this->scope["eventsCounter"]=0?>

		<?php $this->scope["weekTitleShown"]=false?>

		<?php $this->scope["futureTitleShown"]=false?>


		<?php 
$_fh0_data = (isset($this->scope["staticEvents"]) ? $this->scope["staticEvents"] : null);
if ($this->isArray($_fh0_data, true) === true)
{
	foreach ($_fh0_data as $this->scope['event'])
	{
/* -- foreach start output */
?>
			<?php if ((isset($this->scope["event"]["date_start"]) ? $this->scope["event"]["date_start"]:null) >= (isset($this->scope["todayStart"]) ? $this->scope["todayStart"] : null) && (isset($this->scope["event"]["date_start"]) ? $this->scope["event"]["date_start"]:null) <= (isset($this->scope["todayEnd"]) ? $this->scope["todayEnd"] : null)) {
?>
				<?php if ((isset($this->scope["eventsCounter"]) ? $this->scope["eventsCounter"] : null) == 0) {
?>
					<h2><span class="eventsGroupTitle"><?php echo TodoyuLabelManager::getLabel('core.date.today', null);?></span></h2>
				<?php 
}?>

			<?php 
}
else {
?>
				<?php if ((isset($this->scope["weekTitleShown"]) ? $this->scope["weekTitleShown"] : null) == false && (isset($this->scope["event"]["date_start"]) ? $this->scope["event"]["date_start"]:null) >= (isset($this->scope["thisWeekStart"]) ? $this->scope["thisWeekStart"] : null) && (isset($this->scope["event"]["date_start"]) ? $this->scope["event"]["date_start"]:null) <= (isset($this->scope["thisWeekEnd"]) ? $this->scope["thisWeekEnd"] : null)) {
?>
					<?php $this->scope["weekTitleShown"]=true?>

					<h2><span class="eventsGroupTitle"><?php echo TodoyuLabelManager::getLabel('calendar.ext.currentweek', null);?> (<?php echo TodoyuTime::format(time(), 'calendarweek');?>)</span></h2>
				<?php 
}
else {
?>
					<?php if ((isset($this->scope["futureTitleShown"]) ? $this->scope["futureTitleShown"] : null) == false && (isset($this->scope["event"]["date_start"]) ? $this->scope["event"]["date_start"]:null) > (isset($this->scope["thisWeekEnd"]) ? $this->scope["thisWeekEnd"] : null)) {
?>
						<?php $this->scope["futureTitleShown"]=true?>

						<?php $this->scope["eventsCounter"]=0?>

						<h2><span class="eventsGroupTitle"><?php echo TodoyuLabelManager::getLabel('calendar.ext.furtherevents', null);?></span></h2>
					<?php 
}?>

				<?php 
}?>

			<?php 
}?>


			<div id="event-<?php echo $this->scope["event"]["source"];?>-<?php echo $this->scope["event"]["id"];?>" class="event <?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?> source<?php echo ucfirst((isset($this->scope["event"]["source"]) ? $this->scope["event"]["source"]:null));?> type<?php echo ucfirst((isset($this->scope["event"]["type"]) ? $this->scope["event"]["type"]:null));?> contextmenuEventPortal <?php if ((isset($this->scope["event"]["id_series"]) ? $this->scope["event"]["id_series"]:null) > 0) {
?>series<?php echo $this->scope["event"]["id_series"];

}?>">
				<h3 id="event-<?php echo $this->scope["event"]["id"];?>-header" name="event-<?php echo $this->scope["event"]["id"];?>">
					<span class="icon typeIcon" title="<?php echo TodoyuLabelManager::getLabel('calendar.event.attr.eventtype', null);?>: <?php echo TodoyuCalendarEventTypeManager::getEventTypeLabel((isset($this->scope["event"]["type"]) ? $this->scope["event"]["type"]:null));?>"> </span>
					<span id="acknowledge-<?php echo $this->scope["event"]["id"];?>" class="icon acknowledge <?php if (! (isset($this->scope["event"]["isAcknowledged"]) ? $this->scope["event"]["isAcknowledged"]:null)) {
?>not<?php 
}
if ((isset($this->scope["event"]["isUpdated"]) ? $this->scope["event"]["isUpdated"]:null)) {
?> updated<?php 
}?>" <?php if (! (isset($this->scope["event"]["isAcknowledged"]) ? $this->scope["event"]["isAcknowledged"]:null)) {
?>onclick="Todoyu.Ext.calendar.EventPortal.acknowledgeEvent(<?php echo $this->scope["event"]["id"];?>)"<?php 
}?>> </span>
					<span class="label" onclick="Todoyu.Ext.calendar.EventPortal.toggleDetails(<?php echo $this->scope["event"]["id"];?>)">
						<span class="date"><?php echo TodoyuTime::formatRange((isset($this->scope["event"]["date_start"]) ? $this->scope["event"]["date_start"]:null), (isset($this->scope["event"]["date_end"]) ? $this->scope["event"]["date_end"]:null));?> <?php if (((isset($this->scope["event"]["date_end"]) ? $this->scope["event"]["date_end"]:null) - (isset($this->scope["event"]["date_start"]) ? $this->scope["event"]["date_start"]:null))) {
?>(<?php echo TodoyuTime::formatDuration(((isset($this->scope["event"]["date_end"]) ? $this->scope["event"]["date_end"]:null) - (isset($this->scope["event"]["date_start"]) ? $this->scope["event"]["date_start"]:null)));?>)<?php 
}?></span>
						<span class="eventtype"><?php echo TodoyuCalendarEventTypeManager::getEventTypeLabel((isset($this->scope["event"]["eventtype"]) ? $this->scope["event"]["eventtype"]:null));?></span>
						<span class="title"><?php echo htmlentities((isset($this->scope["event"]["title"]) ? $this->scope["event"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?></span>
					</span>
					<div class="clear"><!-- --></div>
				</h3>

				<?php echo $this->scope["event"]["details"];?>

			</div>
			<?php $this->scope["eventsCounter"]=((isset($this->scope["eventsCounter"]) ? $this->scope["eventsCounter"] : null) + 1)?>

		<?php 
/* -- foreach end output */
	}
}
else {
?>
			<?php echo Todoyu::render('core/view/contentMessage.tmpl', array('labels'=>explode('|', 'calendar.event.error.noAppointmentsFound'),'class'=>'','content'=>''));?>

		<?php 
}?>

	</div>

<?php if ((isset($this->scope["holidayEvents"]) ? $this->scope["holidayEvents"] : null)) {

echo Dwoo_Plugin_include($this, "portal-list-events-holiday.tmpl", null, null, null, '_root', null);

}?>


<?php if ((isset($this->scope["birthdayEvents"]) ? $this->scope["birthdayEvents"] : null)) {

echo Dwoo_Plugin_include($this, "portal-list-events-birthday.tmpl", null, null, null, '_root', null);

}?>


</div>

<script type="text/javascript">
	Todoyu.Ext.calendar.ContextMenuEventPortal.attach();
	Todoyu.Ext.calendar.installQuickInfos();
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>