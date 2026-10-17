<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><input type="hidden" name="<?php echo $this->scope["htmlName"];?>" id="<?php echo $this->scope["htmlId"];?>" value="<?php echo htmlentities((isset($this->scope["value"]) ? $this->scope["value"] : null), ENT_QUOTES, 'UTF-8', false);?>" /><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>