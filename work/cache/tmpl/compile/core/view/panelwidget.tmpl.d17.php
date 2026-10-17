<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="panelWidget <?php echo $this->scope["class"];?>" id="panelwidget-<?php echo $this->scope["id"];?>">
	<h1 id="panelwidget-<?php echo $this->scope["id"];?>-h1" <?php if ((isset($this->scope["collapsed"]) ? $this->scope["collapsed"] : null)) {
?>class="expand"<?php 
}?> onclick="Todoyu.PanelWidget.toggle('<?php echo $this->scope["id"];?>')" title="<?php echo TodoyuLabelManager::getLabel('core.global.panelwidget.toggle', null);?>">
		<span class="title" id="panelwidget-<?php echo $this->scope["id"];?>-title"><?php echo $this->scope["title"];?></span>
		<span class="toggle <?php if ((isset($this->scope["collapsed"]) ? $this->scope["collapsed"] : null)) {
?>expand<?php 
}?>" id="panelwidget-<?php echo $this->scope["id"];?>-toggle"></span>
	</h1>
	<div class="content" id="panelwidget-<?php echo $this->scope["id"];?>-content" <?php if ((isset($this->scope["collapsed"]) ? $this->scope["collapsed"] : null)) {
?>style="display:none"<?php 
}?>>
		<div><?php echo $this->scope["content"];?></div>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>