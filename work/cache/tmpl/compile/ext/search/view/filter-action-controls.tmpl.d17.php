<?php
/* template head */
if (function_exists('Dwoo_Plugin_select')===false)
	$this->getLoader()->loadPlugin('select');
/* end template head */ ob_start(); /* template body */ ?><h1 class="headerLine searchControls">

	<span class="filters">
		<select id="filtercontrol-conditions" name="conditions">
			<option value="none" class="default"><?php echo TodoyuLabelManager::getLabel('search.ext.filtercontrol.add.condition', null);?></option>
			<?php 
$_fh3_data = (isset($this->scope["groupedConditionOptions"]) ? $this->scope["groupedConditionOptions"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['groupLabel']=>$this->scope['groupConditionOptions'])
	{
/* -- foreach start output */
?>
				<optgroup label="<?php echo TodoyuLabelManager::getLabel((isset($this->scope["groupLabel"]) ? $this->scope["groupLabel"] : null), null);?>">
					<?php 
$_fh2_data = (isset($this->scope["groupConditionOptions"]) ? $this->scope["groupConditionOptions"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['key']=>$this->scope['conditionOption'])
	{
/* -- foreach start output */
?>
						<option value="<?php echo $this->scope["type"];?>_<?php echo $this->scope["key"];?>"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["conditionOption"]["label"]) ? $this->scope["conditionOption"]["label"]:null), null);?></option>
					<?php 
/* -- foreach end output */
	}
}?>

				</optgroup>
			<?php 
/* -- foreach end output */
	}
}?>

		</select>
	</span>

	<span class="conjunction">
		<?php echo Dwoo_Plugin_select($this, (isset($this->scope["conjunctionOptions"]) ? $this->scope["conjunctionOptions"] : null), (isset($this->scope["conjunction"]) ? $this->scope["conjunction"] : null), "filtercontrol-conjunction", "conjunction", '', 1, false, false, '', '', true);?>

	</span>

	<?php if (sizeof((isset($this->scope["groupedSortingOptions"]) ? $this->scope["groupedSortingOptions"] : null)) > 0) {
?>
		<span class="sorting">
			<select id="filtercontrol-sorting" name="sorting">
				<option value="none" class="default"><?php echo TodoyuLabelManager::getLabel('search.ext.filtercontrol.add.sorting', null);?></option>
				<?php 
$_fh5_data = (isset($this->scope["groupedSortingOptions"]) ? $this->scope["groupedSortingOptions"] : null);
if ($this->isArray($_fh5_data) === true)
{
	foreach ($_fh5_data as $this->scope['groupLabel']=>$this->scope['groupSortingOptions'])
	{
/* -- foreach start output */
?>
					<optgroup label="<?php echo TodoyuLabelManager::getLabel((isset($this->scope["groupLabel"]) ? $this->scope["groupLabel"] : null), null);?>">
						<?php 
$_fh4_data = (isset($this->scope["groupSortingOptions"]) ? $this->scope["groupSortingOptions"] : null);
if ($this->isArray($_fh4_data) === true)
{
	foreach ($_fh4_data as $this->scope['sortingOption'])
	{
/* -- foreach start output */
?>
							<option value="<?php echo $this->scope["sortingOption"]["value"];?>"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["sortingOption"]["label"]) ? $this->scope["sortingOption"]["label"]:null), null);?></option>
						<?php 
/* -- foreach end output */
	}
}?>

					</optgroup>
				<?php 
/* -- foreach end output */
	}
}?>

			</select>
		</span>
	<?php 
}?>


</h1><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>