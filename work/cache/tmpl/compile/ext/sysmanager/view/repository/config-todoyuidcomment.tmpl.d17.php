<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><br/>
<?php echo TodoyuLabelManager::getLabel('sysmanager.ext.config.tab.repository.todoyuid.comment', null);?><br />
<a href="<?php echo $this->scope["url"];?>" target="_blank"><?php echo $this->scope["url"];?></a><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>