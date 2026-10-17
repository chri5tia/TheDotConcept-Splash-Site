<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><h1 class="headerLine">
	<span class="first"><?php echo TodoyuLabelManager::getLabel('profile.ext.general.main.header', null);?></span>
	<span class="rgt"></span>
</h1>

<?php echo $this->scope["form"];
 /* end template body */
return $this->buffer . ob_get_clean();
?>