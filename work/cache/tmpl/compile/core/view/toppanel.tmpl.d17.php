<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="toppanel">
	<div id="companyLogo"><img src="config/img/logo.png" alt="" /></div>
	<?php echo $this->scope["head"];?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>