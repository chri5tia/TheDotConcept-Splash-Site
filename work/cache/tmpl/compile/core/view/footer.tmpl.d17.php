<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="footer">
	<div class="inner">
		<div id="footer-line"></div>
		<div id="footer-info">
			<?php if (TodoyuAuth::isLoggedIn()) {
?>
				<?php echo TodoyuLabelManager::getLabel('core.global.footer.version', null);?>: <?php echo constant('TODOYU_VERSION');?>, <?php echo constant('TODOYU_UPDATE');?><br />
			<?php 
}?>

			<a href="https://code.todoyu.com/wiki/bugtracker" target="_blank" title="<?php echo TodoyuLabelManager::getLabel('core.global.footer.bugreport.title', null);?>"><?php echo TodoyuLabelManager::getLabel('core.global.footer.bugreport', null);?></a> |
			<a href="http://www.todoyu.com/community/forum/?utm_source=<?php echo constant('TODOYU_VERSION');?>&amp;utm_medium=web&amp;utm_campaign=todoyu" target="_blank" title="<?php echo TodoyuLabelManager::getLabel('core.global.footer.forum.title', null);?>"><?php echo TodoyuLabelManager::getLabel('core.global.footer.forum', null);?></a><br />
		</div>
		<div id="footer-logo">
			<a href="http://www.todoyu.com/?utm_source=<?php echo constant('TODOYU_VERSION');?>&amp;utm_medium=web&amp;utm_campaign=todoyu" target="_blank" title="todoyu | get tasks done with your team"><img src="core/asset/img/logo.png" alt="todoyu" width="85" height="60" /></a>
		</div>
		<div id="footer-address">
			<a href="http://www.todoyu.com/?utm_source=<?php echo constant('TODOYU_VERSION');?>&amp;utm_medium=web&amp;utm_campaign=todoyu" target="_blank">&copy; <strong>todoyu</strong></a> by <a href="http://www.snowflake.ch/?utm_source=<?php echo constant('TODOYU_VERSION');?>&amp;utm_medium=web&amp;utm_campaign=todoyu" target="_blank">snowflake productions GmbH</a><br />
			<a href="mailto:feedback@todoyu.com">feedback@todoyu.com</a><br />
			<a href="http://www.todoyu.com/?utm_source=<?php echo constant('TODOYU_VERSION');?>&amp;utm_medium=web&amp;utm_campaign=todoyu" target="_blank">www.todoyu.com</a>
		</div>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>