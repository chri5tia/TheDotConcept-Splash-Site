<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->scope["pagetitle"];?></title>
<?php 
$_fh5_data = (isset($this->scope["metatags"]) ? $this->scope["metatags"] : null);
if ($this->isArray($_fh5_data) === true)
{
	foreach ($_fh5_data as $this->scope['metatag'])
	{
/* -- foreach start output */
?>
	<meta <?php if ((isset($this->scope["metatag"]["name"]) ? $this->scope["metatag"]["name"]:null)) {
?>name="<?php echo $this->scope["metatag"]["name"];?>"<?php 
}?> <?php if ((isset($this->scope["metatag"]["httpequiv"]) ? $this->scope["metatag"]["httpequiv"]:null)) {
?>http-equiv="<?php echo $this->scope["metatag"]["httpequiv"];?>"<?php 
}?> content="<?php echo $this->scope["metatag"]["content"];?>" />
<?php 
/* -- foreach end output */
	}
}?>

<?php 
$_fh6_data = (isset($this->scope["cssFiles"]) ? $this->scope["cssFiles"] : null);
if ($this->isArray($_fh6_data) === true)
{
	foreach ($_fh6_data as $this->scope['cssFile'])
	{
/* -- foreach start output */
?>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->scope["cssFile"]["file"];?>" media="<?php echo $this->scope["cssFile"]["media"];?>" />
<?php 
/* -- foreach end output */
	}
}?>

<?php 
$_fh7_data = (isset($this->scope["jsFiles"]) ? $this->scope["jsFiles"] : null);
if ($this->isArray($_fh7_data) === true)
{
	foreach ($_fh7_data as $this->scope['jsFile'])
	{
/* -- foreach start output */
?>
	<script type="text/javascript" src="<?php echo $this->scope["jsFile"]["file"];?>"></script>
<?php 
/* -- foreach end output */
	}
}?>

<?php 
$_fh8_data = (isset($this->scope["additionalHeaderData"]) ? $this->scope["additionalHeaderData"] : null);
if ($this->isArray($_fh8_data) === true)
{
	foreach ($_fh8_data as $this->scope['headerData'])
	{
/* -- foreach start output */
?>
	<?php echo $this->scope["headerData"];?>

<?php 
/* -- foreach end output */
	}
}?>

<!--[if IE 8]>
	<link rel="stylesheet" media="screen" href="cache/css/core/asset/css/compatibility/ie8.css" />
<![endif]-->

<!--[if IE 9]>
	<link rel="stylesheet" media="screen" href="cache/css/core/asset/css/compatibility/ie8.css" />
<![endif]-->

	<link rel="shortcut icon" href="favicon.ico" />
</head><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>