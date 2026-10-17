<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="panelwidget-<?php echo $this->scope["id"];?>-jscalendar" class="<?php echo $this->scope["class"];?>">
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>