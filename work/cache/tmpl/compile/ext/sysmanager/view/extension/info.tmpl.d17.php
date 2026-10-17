<?php
/* template head */
if (function_exists('Dwoo_Plugin_Header')===false)
	$this->getLoader()->loadPlugin('Header');
/* end template head */ ob_start(); /* template body */ ?><div>
	<?php echo Dwoo_Plugin_Header($this, ((isset($this->scope["ext"]["title"]) ? $this->scope["ext"]["title"]:null)).(" (").((isset($this->scope["extKey"]) ? $this->scope["extKey"] : null)).(")"), ("extIcon").(ucfirst((isset($this->scope["extKey"]) ? $this->scope["extKey"] : null))).(" ").("hasIcon"), true);?>


	<table class="extInfo" cellspacing="2" cellpadding="3">
		<tr>
			<th class="label" scope="row"><?php echo TodoyuLabelManager::getLabel('core.global.title', null);?></th>
			<td class="value"><?php echo $this->scope["ext"]["title"];?></td>
		</tr>
		<tr>
			<th scope="row"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.key', null);?></th>
			<td><?php echo $this->scope["extKey"];?></td>
		</tr>
		<tr>
			<th scope="row"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.version', null);?> / <?php echo TodoyuLabelManager::getLabel('sysmanager.extension.state', null);?></th>
			<td><?php echo $this->scope["ext"]["version"];?> / <?php echo $this->scope["ext"]["state"];?></td>
		</tr>
		<tr>
			<th scope="row"><?php echo TodoyuLabelManager::getLabel('core.global.description', null);?></th>
			<td><?php echo $this->scope["ext"]["description"];?></td>
		</tr>
		<tr>
			<th scope="row"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.author', null);?></th>
			<td><?php if ((isset($this->scope["ext"]["author"]["name"]) ? $this->scope["ext"]["author"]["name"]:null)) {

echo $this->scope["ext"]["author"]["name"];?>, <?php 
}?> <?php echo $this->scope["ext"]["author"]["company"];?> (<?php echo $this->scope["ext"]["author"]["email"];?>)</td>
		</tr>
		<tr>
			<th scope="row"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.dependencies', null);?></th>
			<td>
				<?php if ((isset($this->scope["ext"]["constraints"]["depends"]) ? $this->scope["ext"]["constraints"]["depends"]:null)) {
?>
					<ul>
						<?php 
$_fh0_data = (isset($this->scope["ext"]["constraints"]["depends"]) ? $this->scope["ext"]["constraints"]["depends"]:null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['extkey']=>$this->scope['version'])
	{
/* -- foreach start output */
?>
							<li><?php echo $this->scope["extkey"];?> (<?php echo $this->scope["version"];?>)</li>
						<?php 
/* -- foreach end output */
	}
}?>

					</ul>
				<?php 
}
else {
?>
					-
				<?php 
}?>

			</td>
		</tr>
		<tr>
			<th scope="row"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.conflicts', null);?></th>
			<td>
				<?php if ((isset($this->scope["ext"]["constraints"]["conflicts"]) ? $this->scope["ext"]["constraints"]["conflicts"]:null)) {
?>
					<ul>
						<?php 
$_fh1_data = (isset($this->scope["ext"]["constraints"]["conflicts"]) ? $this->scope["ext"]["constraints"]["conflicts"]:null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['extkey']=>$this->scope['version'])
	{
/* -- foreach start output */
?>
							<li><?php echo $this->scope["extkey"];?> (<?php echo $this->scope["version"];?>)</li>
						<?php 
/* -- foreach end output */
	}
}?>

					</ul>
				<?php 
}
else {
?>
					-
				<?php 
}?>

			</td>
		</tr>
	</table>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>