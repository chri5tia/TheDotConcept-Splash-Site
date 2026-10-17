<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><form id="panelwidget-<?php echo $this->scope["id"];?>-form">
	<label for="panelwidget-<?php echo $this->scope["id"];?>-searchword"><?php echo TodoyuLabelManager::getLabel('core.global.search', null);?></label>
	<input type="text" id="panelwidget-<?php echo $this->scope["id"];?>-searchword" value="<?php echo htmlentities((isset($this->scope["searchWord"]) ? $this->scope["searchWord"] : null), ENT_QUOTES, 'UTF-8', false);?>" />
	<a class="icon clearIcon hidden" id="panelwidget-<?php echo $this->scope["id"];?>-clear"></a>
</form>
<script type="text/javascript">
<?php echo $this->scope["jsInit"];?>

</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>