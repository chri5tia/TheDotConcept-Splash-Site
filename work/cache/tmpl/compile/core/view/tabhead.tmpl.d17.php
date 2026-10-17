<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><li title="<?php echo htmlentities((isset($this->scope["tab"]["label"]) ? $this->scope["tab"]["label"]:null), ENT_QUOTES, 'UTF-8', false);?>" id="<?php echo $this->scope["name"];?>-tab-<?php echo $this->scope["tab"]["id"];?>" class="item bcg05 tabkey-<?php echo (($tmp = (isset($this->scope["tab"]["id"]) ? $this->scope["tab"]["id"]:null))===null||$tmp==='' ? "0" : $tmp);?> <?php echo $this->scope["tab"]["id"];?> <?php echo $this->scope["tab"]["class"];?> <?php if ((isset($this->scope["tab"]["id"]) ? $this->scope["tab"]["id"]:null) == (isset($this->scope["active"]) ? $this->scope["active"] : null)) {
?>active<?php 
}?>">
	<p id="<?php echo $this->scope["name"];?>-tab-<?php echo $this->scope["tab"]["id"];?>-label" class="label">
		<span class="icon"><!-- icon --></span>
		<span class="labeltext"><?php echo htmlentities((isset($this->scope["tab"]["label"]) ? $this->scope["tab"]["label"]:null), ENT_QUOTES, 'UTF-8', false);?></span>
	</p>
</li><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>