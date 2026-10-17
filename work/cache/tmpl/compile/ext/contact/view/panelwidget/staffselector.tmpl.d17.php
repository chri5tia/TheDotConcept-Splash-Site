<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><h5><?php echo TodoyuLabelManager::getLabel('contact.panelwidget-staffselector.selection', null);?></h5>
<ul class="selection" id="panelwidget-staffselector-selection">
	<?php 
$_fh0_data = (isset($this->scope["items"]) ? $this->scope["items"] : null);
if ($this->isArray($_fh0_data, true) === true)
{
	foreach ($_fh0_data as $this->scope['item'])
	{
/* -- foreach start output */
?>
		<li id="panelwidget-<?php echo $this->scope["id"];?>-item-<?php echo $this->scope["item"]["id"];?>" class="<?php echo $this->scope["item"]["class"];?>">
			<a href="javascript:void(0)" <?php if ((isset($this->scope["item"]["title"]) ? $this->scope["item"]["title"]:null)) {
?>title="<?php echo $this->scope["item"]["title"];?>"<?php 
}?>>
				<?php echo htmlentities((isset($this->scope["item"]["label"]) ? $this->scope["item"]["label"]:null), ENT_QUOTES, 'UTF-8', false);?>

			</a>
		</li>
	<?php 
/* -- foreach end output */
	}
}
else {
?>
		<p><?php echo TodoyuLabelManager::getLabel('contact.panelwidget-staffselector.selection.empty', null);?></p>
	<?php 
}?>

</ul>

<br/><br/>
<?php echo Dwoo_Plugin_Button($this, "contact.panelwidget-staffselector.button.save.newgroup", '', "save", "panelwidget-".(isset($this->scope["id"]) ? $this->scope["id"] : null)."-button-savegroup", '', '', false, false, '');
 /* end template body */
return $this->buffer . ob_get_clean();
?>