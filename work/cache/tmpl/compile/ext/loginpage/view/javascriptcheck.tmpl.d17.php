<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><noscript>
	<div id="loginform-javascriptcheck">
		<?php echo TodoyuLabelManager::getLabel('LLL:loginpage.ext.form.javascriptcheck', null);?><br />
		<a href="<?php echo $this->scope["javaScriptManual"];?>" target="blank"><?php echo TodoyuLabelManager::getLabel('LLL:loginpage.ext.form.javascriptcheck.linklabel', null);?></a>

	</div>
</noscript>
<script type="text/javascript">
	Todoyu.Ext.loginpage.checkCookie();
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>