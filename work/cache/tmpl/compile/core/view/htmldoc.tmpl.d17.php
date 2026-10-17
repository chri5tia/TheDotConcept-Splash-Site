<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $this->scope["title"];?></title>
</head>
<body>
<?php echo $this->scope["content"];?>

</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>