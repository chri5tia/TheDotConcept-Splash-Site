<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="left description">
	<?php echo TodoyuString::substituteLinkableElements(TodoyuHtmlFilter::clean((isset($this->scope["task"]["description"]) ? $this->scope["task"]["description"]:null)));?>

</div>
<div class="right properties">
	<dl>
	<?php 
$_fh0_data = (isset($this->scope["attributes"]) ? $this->scope["attributes"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['attribute'])
	{
/* -- foreach start output */
?>
		<?php echo $this->scope["attribute"]["wrap"]["0"];?>

		<dt<?php if ((isset($this->scope["attribute"]["classNameLabel"]) ? $this->scope["attribute"]["classNameLabel"]:null)) {
?> class="<?php echo $this->scope["attribute"]["classNameLabel"];?>"<?php 
}
else {

if ((isset($this->scope["attribute"]["className"]) ? $this->scope["attribute"]["className"]:null)) {
?> class="<?php echo $this->scope["attribute"]["className"];?>"<?php 
}

}?>><?php echo TodoyuLabelManager::getLabel((isset($this->scope["attribute"]["label"]) ? $this->scope["attribute"]["label"]:null), null);?></dt>
		<dd<?php if ((isset($this->scope["attribute"]["id"]) ? $this->scope["attribute"]["id"]:null)) {
?> id="<?php echo $this->scope["attribute"]["id"];?>"<?php 
}
if ((isset($this->scope["attribute"]["className"]) ? $this->scope["attribute"]["className"]:null)) {
?> class="<?php echo $this->scope["attribute"]["className"];?>"<?php 
}
if ((isset($this->scope["attribute"]["title"]) ? $this->scope["attribute"]["title"]:null)) {
?> title="<?php echo $this->scope["attribute"]["title"];?>"<?php 
}?>>
			<?php if ((isset($this->scope["attribute"]["className"]) ? $this->scope["attribute"]["className"]:null)) {
?><span class="icon"></span><?php 
}?>

			<?php if ((isset($this->scope["attribute"]["value"]) ? $this->scope["attribute"]["value"]:null)) {
?>
				<?php echo $this->scope["attribute"]["value"];?>

			<?php 
}
else {
?>
				&#8203;
			<?php 
}?>

		</dd>
		<?php echo $this->scope["attribute"]["wrap"]["1"];?>

	<?php 
/* -- foreach end output */
	}
}?>

	</dl>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>