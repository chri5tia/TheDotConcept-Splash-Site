<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="commentComment">
	<?php echo TodoyuHtmlFilter::clean((isset($this->scope["comment"]["comment"]) ? $this->scope["comment"]["comment"]:null));?>

</div>

<p class="commentLink"><a href="<?php echo $this->scope["commentlink"];?>"><?php echo TodoyuLabelManager::getLabel('comment.ext.mail.showcommentinprojectview', null);?> (C<?php echo $this->scope["comment"]["id"];?>)</a></p>
<div class="commentTask">
	<h2 class="commentTaskHeader"><a href="<?php echo $this->scope["tasklink"];?>"><?php echo htmlentities((isset($this->scope["task"]["title"]) ? $this->scope["task"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?></a></h2>
	<div class="commentTaskDescription"><?php echo TodoyuHtmlFilter::clean((isset($this->scope["task"]["description"]) ? $this->scope["task"]["description"]:null));?></div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>