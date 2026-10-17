<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><tr class="headerLine">
	<th scope="col" class="icon">&nbsp;</th>
	<th scope="col" class="extkey"><?php echo TodoyuLabelManager::getLabel('sysmanager.extension.keyAbbr', null);?></th>
	<th scope="col" class="title"><?php echo TodoyuLabelManager::getLabel('core.global.title', null);?></th>
	<th scope="col" class="edit">&nbsp;</th>
	<th scope="col" class="version"><?php echo TodoyuLabelManager::getLabel('core.global.version', null);?></th>
	<th scope="col" class="download">&nbsp;</th>
	<th scope="col" class="doc">&nbsp;</th>
	<th scope="col" class="status last">&nbsp;</th>
</tr><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>