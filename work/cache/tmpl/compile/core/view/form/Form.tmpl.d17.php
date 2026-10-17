<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
if (! (isset($this->scope["noFormTag"]) ? $this->scope["noFormTag"] : null)) {
?>
	<form name="<?php echo $this->scope["name"];?>" id="<?php echo $this->scope["htmlId"];?>" class="fForm form<?php echo ucfirst((isset($this->scope["name"]) ? $this->scope["name"] : null));?> <?php echo $this->scope["class"];?>" method="<?php echo (($tmp = (isset($this->scope["method"]) ? $this->scope["method"] : null))===null||$tmp==='' ? 'post' : $tmp);?>" action="<?php echo $this->scope["action"];?>" onsubmit="<?php echo (($tmp = (isset($this->scope["onsubmit"]) ? $this->scope["onsubmit"] : null))===null||$tmp==='' ? 'return false' : $tmp);?>" <?php if ((isset($this->scope["enctype"]) ? $this->scope["enctype"] : null)) {
?>enctype="<?php echo $this->scope["enctype"];?>"<?php 
}?> <?php if ((isset($this->scope["target"]) ? $this->scope["target"] : null)) {
?>target="<?php echo $this->scope["target"];?>"<?php 
}?> <?php echo $this->scope["extraAttributes"];?>>
<?php 
}?>


<?php echo $this->scope["hiddenFields"];?>

<?php echo $this->scope["fieldsets"];?>


<?php if (! (isset($this->scope["noFormTag"]) ? $this->scope["noFormTag"] : null)) {
?>
	</form>

	<script type="text/javascript">
	<?php if ((isset($this->scope["isAjax"]) ? $this->scope["isAjax"] : null)) {
?>
		Todoyu.Form.onFormDisplay('<?php echo $this->scope["htmlId"];?>', '<?php echo $this->scope["name"];?>', '<?php echo $this->scope["id"];?>');
		<?php if ((isset($this->scope["onDisplayJsCallback"]) ? $this->scope["onDisplayJsCallback"] : null)) {

echo $this->scope["onDisplayJsCallback"];?>;<?php 
}?>

		<?php if ((isset($this->scope["extraOnDisplay"]) ? $this->scope["extraOnDisplay"] : null)) {

echo $this->scope["extraOnDisplay"];?>;<?php 
}?>

	<?php 
}
else {
?>
		document.observe('dom:loaded', function(){
			(function() {
				Todoyu.Form.onFormDisplay('<?php echo $this->scope["htmlId"];?>', '<?php echo $this->scope["name"];?>', '<?php echo $this->scope["id"];?>');
				<?php if ((isset($this->scope["onDisplayJsCallback"]) ? $this->scope["onDisplayJsCallback"] : null)) {

echo $this->scope["onDisplayJsCallback"];?>;<?php 
}?>

				<?php if ((isset($this->scope["extraOnDisplay"]) ? $this->scope["extraOnDisplay"] : null)) {

echo $this->scope["extraOnDisplay"];?>;<?php 
}?>

			}).defer();
		});
	<?php 
}?>

	</script>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>