<?php
/* template head */
if (function_exists('Dwoo_Plugin_rightLabel')===false)
	$this->getLoader()->loadPlugin('rightLabel');
if (function_exists('Dwoo_Plugin_reverse')===false)
	$this->getLoader()->loadPlugin('reverse');
/* end template head */ ob_start(); /* template body */ ?>
<table class="roles">
	<?php 
$_fh0_data = (isset($this->scope["roles"]) ? $this->scope["roles"] : null);
$this->globals["foreach"]['roles'] = array
(
	"index"		=> 0,
	"iteration"		=> 1,
	"total"		=> $this->isArray($_fh0_data) ? count($_fh0_data) : 0,
);
$_fh0_glob =& $this->globals["foreach"]['roles'];
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['key']=>$this->scope['role'])
	{
/* -- foreach start output */
?>
		<tr>
			<td class="name enumColBG<?php echo $this->globals["foreach"]["roles"]["iteration"]%$this->scope["amountColors"];?>">
				<a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.RightsEditor.toggleRoleRights(<?php echo $this->scope["role"]["id"];?>)"><?php echo $this->scope["role"]["title"];?></a>
			</td>
			<?php 
$_for0_from = 1;
$_for0_to = ((isset($this->globals["foreach"]["roles"]["total"]) ? $this->globals["foreach"]["roles"]["total"]:null) - (isset($this->globals["foreach"]["roles"]["index"]) ? $this->globals["foreach"]["roles"]["index"]:null));
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
	for ($this->scope['gA'] = $_for0_from; $this->scope['gA'] <= $_for0_to; $this->scope['gA'] += $_for0_step)
	{
/* -- for start output */
?>
				<td class="enumColBG<?php echo $this->globals["foreach"]["roles"]["iteration"]%$this->scope["amountColors"];?>">&nbsp;</td>
			<?php /* -- for end output */
	}
}
?>

			<?php if ((isset($this->globals["foreach"]["roles"]["iteration"]) ? $this->globals["foreach"]["roles"]["iteration"]:null) > 1) {
?>
				<?php 
$_for1_from = 1;
$_for1_to = ((isset($this->globals["foreach"]["roles"]["iteration"]) ? $this->globals["foreach"]["roles"]["iteration"]:null) - 1);
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
	for ($this->scope['gA'] = $_for1_from; $this->scope['gA'] <= $_for1_to; $this->scope['gA'] += $_for1_step)
	{
/* -- for start output */
?>
					<td class="enumColBG<?php echo ($this->globals["foreach"]["roles"]["iteration"] - (isset($this->scope["gA"]) ? $this->scope["gA"] : null))%$this->scope["amountColors"];?>">&nbsp;</td>
				<?php /* -- for end output */
	}
}
?>

			<?php 
}?>

		</tr>
	<?php 
/* -- foreach end output */
		$_fh0_glob["index"]+=1;
		$_fh0_glob["iteration"]+=1;
	}
}?>

</table>

<form id="rightsmatix-form" action="index.php?ext=sysmanager&amp;controller=rights" method="post">
	<?php 
$_fh3_data = (isset($this->scope["rights"]) ? $this->scope["rights"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['sectionName']=>$this->scope['section'])
	{
/* -- foreach start output */
?>
		<fieldset>
		<legend><?php echo $this->scope["section"]["label"];?></legend>
		<table class="sectionrights"><tbody>
		<?php 
$_fh2_data = (isset($this->scope["section"]["rights"]) ? $this->scope["section"]["rights"]:null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['right'])
	{
/* -- foreach start output */
?>
			<tr class="right" id="right-<?php echo $this->scope["sectionName"];?>-<?php echo $this->scope["right"]["right"];?>">
				<td class="label">
					<a href="javascript:void(0)" onclick="Todoyu.Ext.sysmanager.RightsEditor.toggleRight('<?php echo $this->scope["sectionName"];?>:<?php echo $this->scope["right"]["right"];?>')" title="[<?php echo $this->scope["sectionName"];?>:<?php echo $this->scope["right"]["right"];?>] <?php echo $this->scope["right"]["comment"];?>"><?php echo $this->scope["right"]["label"];?></a>
					<?php if (sizeof((isset($this->scope["right"]["require"]) ? $this->scope["right"]["require"]:null)) > 0) {

echo Dwoo_Plugin_rightLabel($this, (isset($this->scope["extension"]) ? $this->scope["extension"] : null), (isset($this->scope["sectionName"]) ? $this->scope["sectionName"] : null), (isset($this->scope["right"]["right"]) ? $this->scope["right"]["right"]:null), 'right', 'span', '');

}?>

				</td>
				<?php 
$_fh1_data = Dwoo_Plugin_reverse($this, (isset($this->scope["roles"]) ? $this->scope["roles"] : null), false);
$this->globals["foreach"]['roleRights'] = array
(
	"index"		=> 0,
	"total"		=> $this->isArray($_fh1_data) ? count($_fh1_data) : 0,
);
$_fh1_glob =& $this->globals["foreach"]['roleRights'];
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['key']=>$this->scope['role'])
	{
/* -- foreach start output */
?>
					<td class="enumColBG<?php echo ($this->globals["foreach"]["roleRights"]["total"] - (isset($this->globals["foreach"]["roleRights"]["index"]) ? $this->globals["foreach"]["roleRights"]["index"]:null))%$this->scope["amountColors"];?> roleRight">
						<input type="checkbox" id="<?php echo $this->scope["sectionName"];?>-<?php echo $this->scope["right"]["right"];?>-<?php echo $this->scope["role"]["id"];?>" name="rights[<?php echo $this->scope["sectionName"];?>:<?php echo $this->scope["right"]["right"];?>][<?php echo $this->scope["role"]["id"];?>]" value="1" <?php if ($this->readVar("activeRights.".(isset($this->scope["right"]["full"]) ? $this->scope["right"]["full"]:null).".".(isset($this->scope["role"]["id"]) ? $this->scope["role"]["id"]:null))) {
?>checked="checked"<?php 
}?> />
					</td>
				<?php 
/* -- foreach end output */
		$_fh1_glob["index"]+=1;
	}
}?>

			</tr>
		<?php 
/* -- foreach end output */
	}
}?>

		</tbody></table>
			</fieldset>
	<?php 
/* -- foreach end output */
	}
}?>

	<input type="hidden" name="extension" value="<?php echo $this->scope["extension"];?>" />

	<?php if (empty($this->scope["rights"])) {

echo Todoyu::render('core/view/contentMessage.tmpl', array('labels'=>explode('|', 'sysmanager.ext.rights.notAvailable'),'class'=>'','content'=>''));

}?>


</form>

<script type="text/javascript">
	Todoyu.Ext.sysmanager.RightsEditor.initMatrix(<?php echo json_encode((isset($this->scope["required"]) ? $this->scope["required"] : null));?>);
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>