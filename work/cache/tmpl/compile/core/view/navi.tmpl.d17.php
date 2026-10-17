<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="navi-main">
	<ul id="navi-main-list" class="navilist">
<?php 
$_fh1_data = (isset($this->scope["navigation"]) ? $this->scope["navigation"] : null);
$this->globals["foreach"]['navimain'] = array
(
	"index"		=> 0,
	"iteration"		=> 1,
	"first"		=> null,
	"last"		=> null,
	"total"		=> $this->isArray($_fh1_data) ? count($_fh1_data) : 0,
);
$_fh1_glob =& $this->globals["foreach"]['navimain'];
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['entry'])
	{
		$_fh1_glob["first"] = (string) ($_fh1_glob["index"] === 0);
		$_fh1_glob["last"] = (string) ($_fh1_glob["iteration"] === $_fh1_glob["total"]);
/* -- foreach start output */
?>
		<li class="item level1 item<?php echo ucfirst((isset($this->scope["entry"]["key"]) ? $this->scope["entry"]["key"]:null));?> bcl01<?php if ((isset($this->scope["entry"]["active"]) ? $this->scope["entry"]["active"]:null)) {
?> active bcl02<?php 
}
if ((isset($this->scope["entry"]["submenu"]) ? $this->scope["entry"]["submenu"]:null)) {
?> hasSub<?php 
}
if ((isset($this->globals["foreach"]["navimain"]["first"]) ? $this->globals["foreach"]["navimain"]["first"]:null)) {
?> first<?php 
}
if ((isset($this->globals["foreach"]["navimain"]["last"]) ? $this->globals["foreach"]["navimain"]["last"]:null)) {
?> last<?php 
}?>">
			<a href="<?php echo $this->scope["entry"]["href"];?>"<?php if ((isset($this->scope["entry"]["target"]) ? $this->scope["entry"]["target"]:null) !== null) {
?> target="<?php echo $this->scope["entry"]["target"];?>"<?php 
}?> title="<?php echo $this->scope["entry"]["desc"];?>"<?php if ((isset($this->scope["entry"]["active"]) ? $this->scope["entry"]["active"]:null)) {
?> class="active"<?php 
}?>><?php echo $this->scope["entry"]["label"];?></a>
			<?php if ((isset($this->scope["entry"]["submenu"]) ? $this->scope["entry"]["submenu"]:null)) {
?>
			<ul id="navi-main-list-<?php echo $this->scope["entry"]["key"];?>" class="navilist">
				<?php 
$_fh0_data = (isset($this->scope["entry"]["submenu"]) ? $this->scope["entry"]["submenu"]:null);
$this->globals["foreach"]['navimainsub'] = array
(
	"index"		=> 0,
	"first"		=> null,
);
$_fh0_glob =& $this->globals["foreach"]['navimainsub'];
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['sub'])
	{
		$_fh0_glob["first"] = (string) ($_fh0_glob["index"] === 0);
/* -- foreach start output */
?>
					<li class="item item<?php echo ucfirst((isset($this->scope["sub"]["key"]) ? $this->scope["sub"]["key"]:null));
if ((isset($this->scope["sub"]["active"]) ? $this->scope["sub"]["active"]:null)) {
?> active<?php 
}
if ((isset($this->globals["foreach"]["navimainsub"]["first"]) ? $this->globals["foreach"]["navimainsub"]["first"]:null)) {
?> first<?php 
}?> bcl02">
						<a href="<?php echo $this->scope["sub"]["href"];?>" title="<?php if ((isset($this->scope["sub"]["desc"]) ? $this->scope["sub"]["desc"]:null)) {

echo htmlentities((isset($this->scope["sub"]["desc"]) ? $this->scope["sub"]["desc"]:null), ENT_QUOTES, 'UTF-8', false);

}
else {

echo htmlentities((isset($this->scope["sub"]["label"]) ? $this->scope["sub"]["label"]:null), ENT_QUOTES, 'UTF-8', false);

}?>" <?php if ((isset($this->scope["sub"]["active"]) ? $this->scope["sub"]["active"]:null)) {
?>class="active"<?php 
}?>><?php echo htmlentities(TodoyuString::crop((isset($this->scope["sub"]["label"]) ? $this->scope["sub"]["label"]:null), 29, '..', false), ENT_QUOTES, 'UTF-8', false);?></a>
					</li>
				<?php 
/* -- foreach end output */
		$_fh0_glob["index"]+=1;
	}
}?>

				<li class="item last bcl02"> </li>
			</ul>
			<?php 
}?>

		</li>
<?php 
/* -- foreach end output */
		$_fh1_glob["index"]+=1;
		$_fh1_glob["iteration"]+=1;
	}
}?>

	</ul>
</div>

<div id="to-top" style="display:none" onclick="Todoyu.Ui.scrollToTop()">
	<h1>
		<span class="label">Top</span>
		<span class="arrow"></span>
	</h1>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>