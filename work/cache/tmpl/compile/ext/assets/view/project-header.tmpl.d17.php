<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="infoBox assets">
	<h4><?php echo TodoyuLabelManager::getLabel('assets.ext.tab.assets', null);?></h4>
	<div class="content">
		<?php echo $this->scope["listControl"];?>

		<?php echo $this->scope["assetList"];?>

	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>