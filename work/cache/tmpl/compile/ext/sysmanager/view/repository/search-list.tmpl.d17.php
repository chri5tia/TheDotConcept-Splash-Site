<?php
/* template head */
if (function_exists('Dwoo_Plugin_LabelFormat')===false)
	$this->getLoader()->loadPlugin('LabelFormat');
if (function_exists('Dwoo_Plugin_ExtensionStatusIcon')===false)
	$this->getLoader()->loadPlugin('ExtensionStatusIcon');
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><div class="resultinfo">
	<?php if ((isset($this->scope["numResults"]) ? $this->scope["numResults"] : null) == 0) {
?>
		<?php if ((isset($this->scope["query"]) ? $this->scope["query"] : null) == '') {
?>
			<?php echo TodoyuLabelManager::getLabel('sysmanager.repository.noNewExtensionsFound', null);?>

		<?php 
}
else {
?>
			<?php echo TodoyuLabelManager::getLabel('sysmanager.repository.noExtensionsFoundForQuery', null);?>: <strong><?php echo htmlentities((isset($this->scope["query"]) ? $this->scope["query"] : null), ENT_QUOTES, 'UTF-8', false);?></strong>
		<?php 
}?>

	<?php 
}
else {
?>
		<?php echo Dwoo_Plugin_LabelFormat($this, 'sysmanager.repository.extensionsFound', array(0=>(isset($this->scope["numResults"]) ? $this->scope["numResults"] : null)), null);?>: <strong><?php echo htmlentities((isset($this->scope["query"]) ? $this->scope["query"] : null), ENT_QUOTES, 'UTF-8', false);?></strong>
	<?php 
}?>

</div>

<?php 
$_fh2_data = (isset($this->scope["extensions"]) ? $this->scope["extensions"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['extension'])
	{
/* -- foreach start output */
?>
	<div class="extension" id="repository-search-ext-<?php echo $this->scope["extension"]["ext_key"];?>">

		<div class="main">
			<h5>
				<img src="<?php echo $this->scope["extension"]["icon"];?>" border="0" />
				<div class="title"><?php echo $this->scope["extension"]["title"];?></div>
				<div class="author"><?php echo TodoyuLabelManager::getLabel('sysmanager.repository.by', null);?> <?php echo $this->scope["extension"]["author"]["name"];?></div>

			</h5>
			<div class="description"><?php echo $this->scope["extension"]["description"];?></div>
			<?php if ((isset($this->scope["extension"]["version"]["dependencies"]) ? $this->scope["extension"]["version"]["dependencies"]:null)) {
?>
				<div class="warning dependency">
					<p><?php echo TodoyuLabelManager::getLabel('sysmanager.repository.error.unresolvedDependencies', null);?></p>
					<ul>
						<?php 
$_fh0_data = (isset($this->scope["extension"]["version"]["dependencies"]) ? $this->scope["extension"]["version"]["dependencies"]:null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['dependency'])
	{
/* -- foreach start output */
?>
							<li id="<?php echo $this->scope["extension"]["ext_key"];?>-dependency-<?php echo $this->scope["dependency"]["ext_key"];?>"><?php echo $this->scope["dependency"]["title_short"];?> <?php echo $this->scope["dependency"]["version"];?> (<?php echo $this->scope["dependency"]["ext_key"];?>)</li>
						<?php 
/* -- foreach end output */
	}
}?>

					</ul>
				</div>
			<?php 
}?>

			<?php if ((isset($this->scope["extension"]["version"]["conflicts"]) ? $this->scope["extension"]["version"]["conflicts"]:null)) {
?>
				<div class="warning conflicts">
					<p><?php echo TodoyuLabelManager::getLabel('sysmanager.repository.error.unresolvedConflicts', null);?></p>
					<ul>
						<?php 
$_fh1_data = (isset($this->scope["extension"]["version"]["conflicts"]) ? $this->scope["extension"]["version"]["conflicts"]:null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['conflict'])
	{
/* -- foreach start output */
?>
							<li id="<?php echo $this->scope["extension"]["ext_key"];?>-conflict-<?php echo $this->scope["conflict"]["ext_key"];?>"><?php echo $this->scope["conflict"]["title_short"];?> (<?php echo $this->scope["conflict"]["ext_key"];?>)</li>
						<?php 
/* -- foreach end output */
	}
}?>

					</ul>
				</div>
			<?php 
}?>

		</div>

		<div class="right">
			<div class="version"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.version', null);?>: <?php echo $this->scope["extension"]["version"]["version"];?></div>
			<div class="state"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.state', null);?>: <?php echo Dwoo_Plugin_ExtensionStatusIcon($this, (isset($this->scope["extension"]["version"]["state"]) ? $this->scope["extension"]["version"]["state"]:null));?></div>
			<div class="costs"><?php if ((isset($this->scope["extension"]["commercial"]) ? $this->scope["extension"]["commercial"]:null)) {

echo TodoyuLabelManager::getLabel('sysmanager.repository.extension.costs.commercial', null);

}
else {

echo TodoyuLabelManager::getLabel('sysmanager.repository.extension.costs.free', null);

}?></div>
			<?php if (! (isset($this->scope["extension"]["commercial"]) ? $this->scope["extension"]["commercial"]:null)) {
?>
				<div class="downloads"><?php echo $this->scope["extension"]["downloads"];?> <?php echo TodoyuLabelManager::getLabel('sysmanager.repository.extension.downloads', null);?></div>
			<?php 
}?>

		</div>

		<div class="bottom">
				<?php $this->scope["hasDependencies"]=sizeof((isset($this->scope["extension"]["version"]["dependencies"]) ? $this->scope["extension"]["version"]["dependencies"]:null))?>

				<?php $this->scope["hasConflicts"]=sizeof((isset($this->scope["extension"]["version"]["conflicts"]) ? $this->scope["extension"]["version"]["conflicts"]:null))?>

				<?php $this->scope["preventInstall"]=((isset($this->scope["hasDependencies"]) ? $this->scope["hasDependencies"] : null) + (isset($this->scope["hasConflicts"]) ? $this->scope["hasConflicts"] : null))?>

				<?php echo Dwoo_Plugin_Button($this, "sysmanager.repository.extension.install", "Todoyu.Ext.sysmanager.Repository.Search.showExtensionInstallDialog('".(isset($this->scope["extension"]["ext_key"]) ? $this->scope["extension"]["ext_key"]:null)."')", "install", '', '', '', false, (isset($this->scope["preventInstall"]) ? $this->scope["preventInstall"] : null), '');?>

				<?php echo Dwoo_Plugin_Button($this, "sysmanager.repository.moreInfo", "Todoyu.Ext.sysmanager.Repository.showExtensionInTER('".(isset($this->scope["extension"]["ter_link"]) ? $this->scope["extension"]["ter_link"]:null)."')", "info", '', '', '', false, false, '');?>

		</div>

		<div class="clear"></div>
	</div>
<?php 
/* -- foreach end output */
	}
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>