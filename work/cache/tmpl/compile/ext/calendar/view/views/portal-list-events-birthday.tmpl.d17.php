<?php
/* template head */
if (function_exists('Dwoo_Plugin_Header')===false)
	$this->getLoader()->loadPlugin('Header');
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
if (function_exists('Dwoo_Plugin_personLabel')===false)
	$this->getLoader()->loadPlugin('personLabel');
/* end template head */ ob_start(); /* template body */ ?><br />
<?php $this->scope["headerTitle"]=implode(array(0=>count((isset($this->scope["birthdayEvents"]) ? $this->scope["birthdayEvents"] : null)), 1=>TodoyuLabelManager::getLabel('calendar.event.eventslist.birthdaysWithinTheNextweeks', null)), ' ')?>

<?php echo Dwoo_Plugin_Header($this, (isset($this->scope["headerTitle"]) ? $this->scope["headerTitle"] : null), '', true);?>

<div id="portalListBirthdays">
	<?php 
$_fh0_data = (isset($this->scope["birthdayEvents"]) ? $this->scope["birthdayEvents"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['birthday'])
	{
/* -- foreach start output */
?>
		<div class="event typeBirthday <?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>" title="<?php echo TodoyuLabelManager::getLabel('calendar.event.type.birthday', null);?> <?php echo $this->scope["birthday"]["person"]["firstname"];?> <?php echo $this->scope["birthday"]["person"]["lastname"];?> (<?php echo $this->scope["birthday"]["age"];?> <?php echo TodoyuLabelManager::getLabel('calendar.ext.yearsold', null);?>)">
			<div class="type">&nbsp;</div>
			<div class="date"><?php echo TodoyuTime::format((isset($this->scope["birthday"]["date"]) ? $this->scope["birthday"]["date"]:null), 'DlongD2MlongY4');?></div>
			<div class="name"><?php echo Dwoo_Plugin_personLabel($this, (isset($this->scope["birthday"]["person"]["id"]) ? $this->scope["birthday"]["person"]["id"]:null), 'birthdayperson', 0, 'span', '');?></div>
			<div class="age"><?php echo $this->scope["birthday"]["age"];?> <?php echo TodoyuLabelManager::getLabel('calendar.ext.yearsold', null);?></div>
		</div>
	<?php 
/* -- foreach end output */
	}
}?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>