<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><span title="<?php echo TodoyuLabelManager::getLabel('sysmanager.ext.roles.edit', null);?>" class="icon edit" onclick="Todoyu.Ext.sysmanager.Roles.edit(<?php echo $this->scope["id"];?>)"></span>
<span title="<?php echo TodoyuLabelManager::getLabel('sysmanager.ext.roles.delete', null);?>" class="icon delete" onclick="Todoyu.Ext.sysmanager.Roles.remove(<?php echo $this->scope["id"];?>)"></span><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>