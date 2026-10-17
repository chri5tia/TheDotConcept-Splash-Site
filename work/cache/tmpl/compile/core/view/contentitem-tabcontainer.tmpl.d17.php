<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="<?php echo $this->scope["itemName"];?>-<?php echo $this->scope["idItem"];?>-tabcontainer" class="<?php echo $this->scope["itemName"];?>Tabs contentItemTabContainer">
	<?php echo $this->scope["tabHeads"];?>

	<?php echo $this->scope["tabContents"];?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>