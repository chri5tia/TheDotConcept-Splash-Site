<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="mainGrid">
	<div id="gridContainer" class="dayMode">
		<?php if ((isset($this->scope["dayEvents"]) ? $this->scope["dayEvents"] : null)) {
?>
			<div class="gridHeader" id="gridHeader">
				<table class="wk-weektop"><tbody>
					<tr>
						<td class="timeSpacer"></td>
						<td class="dayEvents">
							<?php 
$_fh0_data = (isset($this->scope["dayEvents"]) ? $this->scope["dayEvents"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['dayEventHtml'])
	{
/* -- foreach start output */
?>
								<?php echo $this->scope["dayEventHtml"];?>

							<?php 
/* -- foreach end output */
	}
}?>

						</td>
					</tr>
				</tbody></table>
			</div>
		<?php 
}?>

		<div id="calendarBody" class="wk-scrolltimedevents <?php if ((isset($this->scope["showFullDay"]) ? $this->scope["showFullDay"] : null)) {
?>full<?php 
}?> contextmenucalendarbody">
			<table class="tg-timedevents" id="tgTable"><tbody>
				<tr>
					<td class="wid40"></td>
					<td>
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
	for ($this->scope['markercounter'] = $_for0_from; $this->scope['markercounter'] <= $_for0_to; $this->scope['markercounter'] += $_for0_step)
	{
/* -- for start output */
?>
								<div class="tg-dualmarker"></div>
							<?php /* -- for end output */
	}
}
?>

							</div>
						</div>
					</td>
				</tr><tr>
					<td class="colHours">
						<?php $this->scope["hourTimestamp"]=(isset($this->scope["timestamp"]) ? $this->scope["timestamp"] : null)?>

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
							<div class="hour" id="createEventAt-<?php echo $this->scope["hourTimestamp"];?>">
								<?php if ((isset($this->scope["hour"]) ? $this->scope["hour"] : null) < 10) {
?>0<?php 
}
echo $this->scope["hour"];?>:00
							</div>
							<?php $this->scope["hourTimestamp"]+=3600?>

						<?php /* -- for end output */
	}
}
?>

					</td>
					<td class="dayCol dayview<?php if (date('d.m.y', (isset($this->scope["timestamp"]) ? $this->scope["timestamp"] : null)) == date('d.m.y', time())) {
?>Today<?php 
}?>">
						<div id="tgCol0" class="tg-colwrapper">
						<?php 
$_fh1_data = (isset($this->scope["events"]) ? $this->scope["events"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['event'])
	{
/* -- foreach start output */
?>
							<?php echo $this->scope["event"];?>

						<?php 
/* -- foreach end output */
	}
}?>

						</div>
					</td>
				</tr>
			</tbody></table>
		</div>
	</div>
</div>

<script type="text/javascript">
	Todoyu.Ext.calendar.setTitle('<?php echo $this->scope["title"];?>');
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>