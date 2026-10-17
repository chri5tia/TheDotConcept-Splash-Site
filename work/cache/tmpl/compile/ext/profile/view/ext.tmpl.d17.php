<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ;
'';// checking for modification in file:core/view/base.tmpl
if (!("1320439604" == filemtime('core/view/base.tmpl'))) { ob_end_clean(); return false; };
echo Dwoo_Plugin_include($this, "core/view/pageheader.tmpl", null, null, null, '_root', null);?>


<body id="todoyu-<?php echo constant('EXT');?>" class="todoyu-<?php echo constant('EXT');?> <?php echo trim((isset($this->scope["bodyClass"]) ? $this->scope["bodyClass"] : null));?>" <?php 
$_fh1_data = (isset($this->scope["bodyAttributes"]) ? $this->scope["bodyAttributes"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['attribut'])
	{
/* -- foreach start output */

echo $this->scope["attribute"]["name"];?>="<?php echo $this->scope["attribute"]["value"];?>" <?php 
/* -- foreach end output */
	}
}?>>

<?php 
$_fh2_data = (isset($this->scope["bodyElements"]) ? $this->scope["bodyElements"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['bodyElement'])
	{
/* -- foreach start output */
?>
<?php echo $this->scope["bodyElement"];?>

<?php 
/* -- foreach end output */
	}
}?>


<div id="header">
	<div class="inner bclFF">
		<?php echo Dwoo_Plugin_include($this, "core/view/toppanel.tmpl", null, null, null, '_root', null);?>

		<?php echo $this->scope["navigation"];?>

	</div>
</div>

<div id="notifications">
	<div class="notes" id="notes"></div>
</div>

<div id="box">
	<div id="contentBox">
		<div id="main">
			<div id="panel" class="panel">
				<?php echo $this->scope["panelWidgets"];?>

				<div class="panelFooter"><!-- panel footer --></div>
			</div>
			<div id="right" class="bclFF">
				<div id="content" class="content">
					<?php if ((isset($this->scope["fullContent"]) ? $this->scope["fullContent"] : null)) {
?>
						<?php echo $this->scope["fullContent"];?>

					<?php 
}
else {
?>
						<div id="content-tabs">
								<?php echo $this->scope["tabs"];?>

						</div>
						<div id="content-body">
								<?php echo $this->scope["content"];?>

						</div>
					<?php 
}?>

				</div><!-- /inner -->
			</div>
			<div class="clear"><!-- --></div>
		</div>
		<div class="clear"><!-- --></div>
	</div>
</div>

<?php echo Dwoo_Plugin_include($this, "core/view/footer.tmpl", null, null, null, '_root', null);?>


<ul id="contextmenu"></ul>

<?php if ((isset($this->scope["jsInlines"]) ? $this->scope["jsInlines"] : null)) {
?>
<script type="text/javascript">
<?php 
$_fh3_data = (isset($this->scope["jsInlines"]) ? $this->scope["jsInlines"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['jsInline'])
	{
/* -- foreach start output */
?>
	<?php echo $this->scope["jsInline"]["code"];?>

<?php 
/* -- foreach end output */
	}
}?>

</script>
<?php 
}?>


</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>