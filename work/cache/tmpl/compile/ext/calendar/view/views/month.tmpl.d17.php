<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ?><div class="mainGrid month" id="calendarBody">
	<div id="gridContainer" class="monthMode">

		<table class="mv-daynames-table">
			<tbody>
				<tr>
					<?php 
$_fh0_data = (isset($this->scope["dayColumns"]) ? $this->scope["dayColumns"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['dayColumn'])
	{
/* -- foreach start output */
?>
						<th class="mv-dayname <?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>" title="<?php echo $this->scope["dayColumn"]["title"];?>">
							<?php echo $this->scope["dayColumn"]["label"];?>

						</th>
					<?php 
/* -- foreach end output */
	}
}?>

				</tr>
			</tbody>
		</table>

		<div id="mvEventContainer" class="mv-event-container contextmenucalendarbody">

		<?php 
$_fh4_data = (isset($this->scope["eventsPerWeek"]) ? $this->scope["eventsPerWeek"] : null);
if ($this->isArray($_fh4_data) === true)
{
	foreach ($_fh4_data as $this->scope['weekDays'])
	{
/* -- foreach start output */
?>
			<div class="month-row">
				<table class="standardGrid">

					<tr>
						<?php 
$_fh1_data = (isset($this->scope["weekDays"]) ? $this->scope["weekDays"] : null);
$this->globals["foreach"]['weekDayTitles'] = array
(
	"index"		=> 0,
	"first"		=> null,
);
$_fh1_glob =& $this->globals["foreach"]['weekDayTitles'];
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['dateKey']=>$this->scope['dayConfig'])
	{
		$_fh1_glob["first"] = (string) ($_fh1_glob["index"] === 0);
/* -- foreach start output */
?>
							<td id="createEventAt-<?php echo date('Y-m-d', (isset($this->scope["dayConfig"]["date"]) ? $this->scope["dayConfig"]["date"]:null));?>" title="<?php echo $this->scope["dayConfig"]["title"];?> <?php if ((isset($this->scope["dayConfig"]["today"]) ? $this->scope["dayConfig"]["today"]:null)) {
?>(<?php echo TodoyuLabelManager::getLabel('calendar.ext.today', null);?>)<?php 
}?>" class="title<?php if ((isset($this->scope["dayConfig"]["inCurrentMonth"]) ? $this->scope["dayConfig"]["inCurrentMonth"]:null)) {
?> inSelMonthTitle<?php 
}
if ((isset($this->scope["dayConfig"]["today"]) ? $this->scope["dayConfig"]["today"]:null)) {
?> ttoday<?php 
}?>">
								<?php if ((isset($this->globals["foreach"]["weekDayTitles"]["first"]) ? $this->globals["foreach"]["weekDayTitles"]["first"]:null)) {
?>
									<span class="weekNumber" title="<?php echo $this->scope["dayConfig"]["week"];?>" onclick="Todoyu.Ext.calendar.showWeek('<?php echo date('Y-m-d', $this->readVar("timestamps.".(isset($this->scope["dayCounter"]) ? $this->scope["dayCounter"] : null)));?>')">
										<?php echo $this->scope["dayConfig"]["week"];?>

									</span>
								<?php 
}?>

								<span class="month-date" onclick="Todoyu.Ext.calendar.showDay('<?php echo date('Y-m-d', (isset($this->scope["dayConfig"]["date"]) ? $this->scope["dayConfig"]["date"]:null));?>')">
									<?php echo $this->scope["dayConfig"]["label"];?>

								</span>
							</td>
						<?php 
/* -- foreach end output */
		$_fh1_glob["index"]+=1;
	}
}?>

					</tr>

					<tr>
						<?php 
$_fh3_data = (isset($this->scope["weekDays"]) ? $this->scope["weekDays"] : null);
$this->globals["foreach"]['weekDayContents'] = array
(
	"index"		=> 0,
	"first"		=> null,
);
$_fh3_glob =& $this->globals["foreach"]['weekDayContents'];
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['dateKey']=>$this->scope['dayConfig'])
	{
		$_fh3_glob["first"] = (string) ($_fh3_glob["index"] === 0);
/* -- foreach start output */
?>
							<td id="createEventAt-<?php echo date('Y-m-d', (isset($this->scope["dayConfig"]["date"]) ? $this->scope["dayConfig"]["date"]:null));?>" class="content<?php if ((isset($this->scope["dayConfig"]["today"]) ? $this->scope["dayConfig"]["today"]:null)) {
?> ctoday<?php 
}?> <?php if ((isset($this->globals["foreach"]["weekDayContents"]["first"]) ? $this->globals["foreach"]["weekDayContents"]["first"]:null)) {
?> first<?php 
}
if ((isset($this->scope["dayConfig"]["inCurrentMonth"]) ? $this->scope["dayConfig"]["inCurrentMonth"]:null)) {
?> inSelMonthTitle<?php 
}?>">
								<?php 
$_fh2_data = (isset($this->scope["dayConfig"]["events"]) ? $this->scope["dayConfig"]["events"]:null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['eventHtml'])
	{
/* -- foreach start output */
?>
									<?php echo $this->scope["eventHtml"];?>

								<?php 
/* -- foreach end output */
	}
}?>

							</td>
						<?php 
/* -- foreach end output */
		$_fh3_glob["index"]+=1;
	}
}?>

					</tr>

				</table>
			</div>
		<?php 
/* -- foreach end output */
	}
}?>


		</div>
	</div>
</div>

<script type="text/javascript">
	Todoyu.Ext.calendar.setTitle('<?php echo $this->scope["title"];?>');
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>