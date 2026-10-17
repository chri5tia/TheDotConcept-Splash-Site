<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ;
if (sizeof((isset($this->scope["tracks"]) ? $this->scope["tracks"] : null)) > 0) {
?>
	<ul class="ulList tracksList ulListDotted" id="task-<?php echo $this->scope["idTask"];?>-timetracks-list">
		<?php 
$_fh1_data = (isset($this->scope["tracks"]) ? $this->scope["tracks"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['index']=>$this->scope['track'])
	{
/* -- foreach start output */
?>
			<li id="task-<?php echo $this->scope["track"]["id_task"];?>-track-<?php echo $this->scope["track"]["id"];?>" class="listItem track <?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?> <?php if ((isset($this->scope["track"]["editable"]) ? $this->scope["track"]["editable"]:null)) {
?>contextmenuTrack edit<?php 
}?>">
				<?php echo Dwoo_Plugin_include($this, "tasktab-listitem.tmpl", null, null, null, '_root', null);?>

			</li>
		<?php 
/* -- foreach end output */
	}
}?>

	</ul>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>