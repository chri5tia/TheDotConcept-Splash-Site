<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="<?php echo $this->scope["itemName"];?>-<?php echo $this->scope["idItem"];?>-tabcontent" class="tabContent overflow">
	<div id="<?php echo $this->scope["itemName"];?>-<?php echo $this->scope["idItem"];?>-tabcontent-<?php echo $this->scope["tabKey"];?>" class="tab <?php echo $this->scope["tabKey"];?>">
		<?php echo $this->scope["tabHtml"];?>

	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>