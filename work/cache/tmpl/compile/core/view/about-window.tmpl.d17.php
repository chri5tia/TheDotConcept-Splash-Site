<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="logo"></div>
<div class="version">todoyu <?php echo constant('TODOYU_VERSION');?></div>

<p class="info">
	&copy; 2006-<?php echo date('Y');?> snowflake productions GmbH, Zurich.<br />
	todoyu comes with absolutely no warranty.<br />
	This is free software, and you are welcome to redistribute it <a href="http://www.todoyu.com/index.php?id=bsdlicense" target="_blank">under certain conditions</a>.
	<br /><br />
	Extensions are copyright of their respective owners. Please visit <a href="http://www.todoyu.com" target="_blank">todoyu.com</a> for details.
	<br />
	Obstructing the appearance of this notice is prohibited by law.
	<br /><br />
	We thank the <a href="http://www.todoyu.com/index.php?id=contributors" target="_blank">community</a> for contributing to this project.
</p>

<p class="info">
	<br /><span id="about-credits-dedication">Special thanks go to:</span>

<button onclick="Todoyu.Headlets.getHeadlet('todoyuheadletabout').toggleCredits()" id="about-toggle-credits" type="button" class="button">
	<span class="icon"></span>
	<span class="label">Third party products credits</span>
</button>
</p>

<div class="clear"><!-- --></div>

<div id="about-team" class="creditsbox names">
		<ul id="scrollingnames">
		<?php 
$_fh0_data = (isset($this->scope["names"]) ? $this->scope["names"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['lastname']=>$this->scope['firstname'])
	{
/* -- foreach start output */
?>
			<li><div class="left"><?php echo $this->scope["firstname"];?></div> <div class="right"><?php echo $this->scope["lastname"];?></div></li>
		<?php 
/* -- foreach end output */
	}
}?>

			<li></li>
			<li>and last but not least the whole snowflake team</li>
		</ul>
	</div>
</div>
<div id="about-libs" class="creditsbox" style="display:none;">
	<p>
		<h1>todoyu contains the following third party open source software:</h1>
	</p>

<?php 
$_fh1_data = (isset($this->scope["thirdpartycredits"]) ? $this->scope["thirdpartycredits"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['product']=>$this->scope['credits'])
	{
/* -- foreach start output */
?>
	<p class="product">
		<h2><a href="<?php echo $this->scope["credits"]["url"];?>" target="_blank"><?php echo $this->scope["credits"]["title"];?></a></h2>
		<p>
			Coypright: &copy; <?php echo $this->scope["credits"]["copyright"];?><br />
			Software License Agreement: <?php if (! empty($this->scope["credits"]["licenseUrl"])) {
?><a href="<?php echo $this->scope["credits"]["licenseUrl"];?>" taget="_blank"><?php 
}
echo $this->scope["credits"]["license"];
if (! empty($this->scope["credits"]["licenseUrl"])) {
?></a><?php 
}?>

		</p>
	</p>
<?php 
/* -- foreach end output */
	}
}?>


</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>