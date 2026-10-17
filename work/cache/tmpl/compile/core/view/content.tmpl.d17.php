<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="content-tabs">
	<?php echo $this->scope["tabs"];?>

</div>
<div id="content-body">
	<?php echo $this->scope["body"];?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>