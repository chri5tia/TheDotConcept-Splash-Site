<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="event-<?php echo $this->scope["source"];?>-<?php echo $this->scope["id"];?>" class="<?php echo $this->scope["classNames"];?>">
	<div class="head enumColBG<?php echo $this->scope["color"]["id"];?>">
		<div class="typeIcon"></div>

		<?php if ((isset($this->scope["isPrivate"]) ? $this->scope["isPrivate"] : null)) {
?>
			<?php if ((isset($this->scope["isCurrentPersonAssigned"]) ? $this->scope["isCurrentPersonAssigned"] : null)) {
?>
				<div class="private"></div>
			<?php 
}
else {
?>
				<div class="privateEvent"></div>
			<?php 
}?>

		<?php 
}?>


		<div class="title">
			<?php echo htmlentities((isset($this->scope["title"]) ? $this->scope["title"] : null), ENT_QUOTES, 'UTF-8', false);?>

		</div>
	</div>



</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>