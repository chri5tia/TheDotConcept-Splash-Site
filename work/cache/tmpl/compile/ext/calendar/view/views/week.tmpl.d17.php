<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ;
if ((isset($this->scope["displayWeekend"]) ? $this->scope["displayWeekend"] : null)) {
?>
	<?php $this->scope["amountDaysShown"]=7?>

<?php 
}
else {
?>
	<?php $this->scope["amountDaysShown"]=5?>

<?php 
}?>

<?php $this->scope["dateKeyToday"]=date('Ymd')?>


<div class="mainGrid">
	<div id="gridContainer" class="weekMode <?php if ((isset($this->scope["amountDaysShown"]) ? $this->scope["amountDaysShown"] : null) == 5) {
?> fiveDays<?php 
}?>">

		<div class="gridHeader" id="gridHeader">
			<table class="wk-weektop"><tbody>
				<tr class="dayLabels">
					<td rowspan="2" class="timeSpacer"></td>
					<?php 
$_fh1_data = (isset($this->scope["dayColumns"]) ? $this->scope["dayColumns"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['dayColumn'])
	{
/* -- foreach start output */
?>
						<th class="dayName dayCol <?php if ((isset($this->scope["dayColumn"]["today"]) ? $this->scope["dayColumn"]["today"]:null)) {
?>today todaywk-dayname<?php 
}?> <?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>" title="<?php echo $this->scope["dayColumn"]["title"];
if ((isset($this->scope["dayColumn"]["today"]) ? $this->scope["dayColumn"]["today"]:null)) {
?> (<?php echo TodoyuLabelManager::getLabel('calendar.ext.today', null);?>)<?php 
}?>" scope="col" onclick="Todoyu.Ext.calendar.showDay('<?php echo $this->scope["dayColumn"]["date"];?>')">
						<?php echo $this->scope["dayColumn"]["label"];?>

						</th>
					<?php 
/* -- foreach end output */
	}
}?>


				</tr>

				<?php if (sizeof((isset($this->scope["dayEvents"]) ? $this->scope["dayEvents"] : null)) > 0) {
?>
				<tr>
					<td class="dayEvents" colspan="<?php echo $this->scope["amountDaysShown"];?>">
						<table>

							<?php 
$_fh3_data = (isset($this->scope["dayEvents"]) ? $this->scope["dayEvents"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['dayDayEvents'])
	{
/* -- foreach start output */
?>
								<tr>
									<?php 
$_fh2_data = (isset($this->scope["dayDayEvents"]) ? $this->scope["dayDayEvents"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['dayEvent'])
	{
/* -- foreach start output */
?>
										<?php if (is_array((isset($this->scope["dayEvent"]) ? $this->scope["dayEvent"] : null))) {
?>
											<td <?php if ((isset($this->scope["dayEvent"]["length"]) ? $this->scope["dayEvent"]["length"]:null) > 1) {
?>colspan="<?php echo $this->scope["dayEvent"]["length"];?>"<?php 
}?>>
												<?php echo $this->scope["dayEvent"]["html"];?>

											</td>
										<?php 
}
elseif ((isset($this->scope["dayEvent"]) ? $this->scope["dayEvent"] : null) == false) {
?>
											<td>&nbsp;</td>
										<?php 
}?>

									<?php 
/* -- foreach end output */
	}
}?>

								</tr>
							<?php 
/* -- foreach end output */
	}
}?>


							<tr>
								<?php 
$_fh4_data = (isset($this->scope["dayColumns"]) ? $this->scope["dayColumns"] : null);
if ($this->isArray($_fh4_data) === true)
{
	foreach ($_fh4_data as $this->scope['dayColumn'])
	{
/* -- foreach start output */
?>
									<td class="dayCol"></td>
								<?php 
/* -- foreach end output */
	}
}?>

							</tr>

						</table>
					</td>
				</tr>
				<?php 
}?>

			</tbody></table>
		</div>

		<div id="calendarBody" class="wk-scrolltimedevents <?php if ((isset($this->scope["showFullDay"]) ? $this->scope["showFullDay"] : null)) {
?>full<?php 
}?> contextmenucalendarbody">
			<table class="tg-timedevents" id="tgTable">
				<tbody><tr>
					<td class="wid40"></td>
					<td colspan="<?php echo $this->scope["amountDaysShown"];?>">
						<div class="tg-hourmarkerwrapper">
							<div class="tg-hourmarkers">
								<?php 
$_for0_from = 0;
$_for0_to = 23;
$_for0_step = abs(1);
if (is_numeric($_for0_from) && !is_numeric($_for0_to)) { $this->triggerError('For requires the <em>to</em> parameter when using a numerical <em>from</em>'); }
$tmp_shows = $this->isArray($_for0_from, true) || (is_numeric($_for0_from) && (abs(($_for0_from - $_for0_to)/$_for0_step) !== 0 || $_for0_from == $_for0_to));
if ($tmp_shows)
{
	if ($this->isArray($_for0_from, true)) {
		$_for0_to = is_numeric($_for0_to) ? $_for0_to - $_for0_step : count($_for0_from) - 1;
		$_for0_from = 0;
	}
	if ($_for0_from > $_for0_to) {
				$tmp = $_for0_from;
				$_for0_from = $_for0_to;
				$_for0_to = $tmp;
			}
	for ($this->scope['hourmarker'] = $_for0_from; $this->scope['hourmarker'] <= $_for0_to; $this->scope['hourmarker'] += $_for0_step)
	{
/* -- for start output */
?><div class="tg-dualmarker"></div><?php /* -- for end output */
	}
}
?>

							</div>
						</div>
					</td>
				</tr><tr>
					<td class="colHours">
						<?php 
$_for1_from = 0;
$_for1_to = 23;
$_for1_step = abs(1);
if (is_numeric($_for1_from) && !is_numeric($_for1_to)) { $this->triggerError('For requires the <em>to</em> parameter when using a numerical <em>from</em>'); }
$tmp_shows = $this->isArray($_for1_from, true) || (is_numeric($_for1_from) && (abs(($_for1_from - $_for1_to)/$_for1_step) !== 0 || $_for1_from == $_for1_to));
if ($tmp_shows)
{
	if ($this->isArray($_for1_from, true)) {
		$_for1_to = is_numeric($_for1_to) ? $_for1_to - $_for1_step : count($_for1_from) - 1;
		$_for1_from = 0;
	}
	if ($_for1_from > $_for1_to) {
				$tmp = $_for1_from;
				$_for1_from = $_for1_to;
				$_for1_to = $tmp;
			}
	for ($this->scope['hour'] = $_for1_from; $this->scope['hour'] <= $_for1_to; $this->scope['hour'] += $_for1_step)
	{
/* -- for start output */
?>
							<div class="hour">
								<?php if ((isset($this->scope["hour"]) ? $this->scope["hour"] : null) < 10) {
?>0<?php 
}
echo $this->scope["hour"];?>:00
							</div>
						<?php /* -- for end output */
	}
}
?>

					</td>
					<?php 
$_fh6_data = (isset($this->scope["events"]) ? $this->scope["events"] : null);
$this->globals["foreach"]['weekdays'] = array
(
	"index"		=> 0,
);
$_fh6_glob =& $this->globals["foreach"]['weekdays'];
if ($this->isArray($_fh6_data) === true)
{
	foreach ($_fh6_data as $this->scope['dayKey']=>$this->scope['eventsOfDay'])
	{
/* -- foreach start output */
?>
						<td class="dayCol <?php if ((isset($this->scope["dayKey"]) ? $this->scope["dayKey"] : null) == (isset($this->scope["dateKeyToday"]) ? $this->scope["dateKeyToday"] : null)) {
?>today<?php echo $this->scope["amountDaysShown"];

}?>">
							<div class="tg-colwrapper">
								<div id="tgCol<?php echo $this->globals["foreach"]["weekdays"]["index"];?>">
									<?php 
$_fh5_data = (isset($this->scope["eventsOfDay"]) ? $this->scope["eventsOfDay"] : null);
if ($this->isArray($_fh5_data) === true)
{
	foreach ($_fh5_data as $this->scope['eventHtml'])
	{
/* -- foreach start output */
?>
										<?php echo $this->scope["eventHtml"];?>

									<?php 
/* -- foreach end output */
	}
}?>

								</div>
							</div>
						</td>
					<?php 
/* -- foreach end output */
		$_fh6_glob["index"]+=1;
	}
}?>


				</tr></tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	Todoyu.Ext.calendar.setTitle('<?php echo $this->scope["title"];?>');
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>