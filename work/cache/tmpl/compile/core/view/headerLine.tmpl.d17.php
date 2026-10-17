<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><h1 class="headerLine <?php echo $this->scope["class"];?>">
	<span class="title"><?php if ((isset($this->scope["encode"]) ? $this->scope["encode"] : null)) {

echo htmlentities((isset($this->scope["title"]) ? $this->scope["title"] : null), ENT_QUOTES, 'UTF-8', false);

}
else {

echo $this->scope["title"];

}?></span>
	<span class="rgt"><!--right--></span>
</h1>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>