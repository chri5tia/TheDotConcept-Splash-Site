<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><div class="wizard wizard<?php echo ucfirst((isset($this->scope["wizardName"]) ? $this->scope["wizardName"] : null));?>" id="wizard">

	<div class="navi">
		<ol>
			<?php 
$_fh0_data = (isset($this->scope["steps"]) ? $this->scope["steps"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['step'])
	{
/* -- foreach start output */
?>
				<?php $this->scope["done"]=in_array((isset($this->scope["step"]["step"]) ? $this->scope["step"]["step"]:null), (isset($this->scope["doneSteps"]) ? $this->scope["doneSteps"] : null))?>

				<li class="<?php if ((isset($this->scope["stepName"]) ? $this->scope["stepName"] : null) == (isset($this->scope["step"]["step"]) ? $this->scope["step"]["step"]:null)) {
?>active<?php 
}
if ((isset($this->scope["done"]) ? $this->scope["done"] : null)) {
?> done<?php 
}?>" <?php if ((isset($this->scope["done"]) ? $this->scope["done"] : null)) {
?>onclick="Todoyu.Wizard.goToStep('<?php echo $this->scope["step"]["step"];?>')"<?php 
}?>><?php echo TodoyuLabelManager::getLabel((isset($this->scope["step"]["title"]) ? $this->scope["step"]["title"]:null), null);?></li>
			<?php 
/* -- foreach end output */
	}
}?>

		</ol>
	</div>

	<div class="content">
		<h1 class="title"><?php echo $this->scope["title"];?></h1>

		<?php if ((isset($this->scope["info"]) ? $this->scope["info"] : null)) {
?>
			<p class="info"><?php echo $this->scope["info"];?></p>
		<?php 
}?>


		<form method="post" name="data" action="index.php?ext=core&amp;controller=wizard" id="wizard-form">
			<input type="hidden" name="action" value="save" />
			<input type="hidden" name="wizard" value="<?php echo $this->scope["wizardName"];?>" id="wizard-wizard" />
			<input type="hidden" name="step" value="<?php echo $this->scope["stepName"];?>" id="wizard-step" />
			<input type="hidden" name="direction" value="next" id="wizard-direction" />
			<input type="hidden" name="nosave" value="0" id="wizard-nosave" />
			<?php echo $this->scope["content"];?>

		</form>

	</div>

	<div class="help">
		<?php echo $this->scope["help"];?>

	</div>

	<div class="buttons">
		<div class="close">
			<?php echo Dwoo_Plugin_Button($this, "core.global.wizard.close", "Todoyu.Wizard.close()", "close", '', '', '', false, false, '');?>

		</div>
		<div class="main">
			<?php if (! (isset($this->scope["isFirst"]) ? $this->scope["isFirst"] : null)) {
?>
				<?php echo Dwoo_Plugin_Button($this, "core.global.wizard.back", "Todoyu.Wizard.back()", "back", '', '', '', false, false, '');?>

			<?php 
}?>

			<?php if (! (isset($this->scope["isLast"]) ? $this->scope["isLast"] : null)) {
?>
				<?php echo Dwoo_Plugin_Button($this, "core.global.wizard.next", "Todoyu.Wizard.next()", "next", '', '', '', false, false, '');?>

			<?php 
}?>

		</div>

	</div>

	<div class="clear"></div>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>