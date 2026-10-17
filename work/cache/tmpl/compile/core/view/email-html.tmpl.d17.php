<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $this->scope["subject"];?></title>
<style type="text/css">
body {
	margin:10px;
	padding:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}

.mailFooter pre {
	color: #666;
}

/* ------------------------- */

.commentLink {
	margin-top: 30px;
}

.commentTask {
	border: dashed #666;
	border-width: 1px 0;
	padding: 10px 0;
}

.commentCompany {
	margin: 5px 0;
	font-size: 12px;
}

.commentTaskHeader {
	 margin: 5px 0 15px 0;
	 font-size: 12px;
}

.commentTask,
.commentTask * {
	color: #666;
}

</style>
</head>

<body>
<div class="mailContent">
	<?php echo $this->scope["content"];?>

</div>
<div class="mailFooter">
<?php if ((isset($this->scope["signature"]) ? $this->scope["signature"] : null)) {
?>
<?php echo $this->scope["signature"];?>

<?php 
}?>

<pre>This email was sent with todoyu: <a href="<?php echo constant('TODOYU_URL');?>"><?php echo constant('TODOYU_URL');?></a></pre>
</div>
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>