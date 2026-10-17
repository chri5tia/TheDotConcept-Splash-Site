<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
echo TodoyuString::html2text((isset($this->scope["comment"]["comment"]) ? $this->scope["comment"]["comment"]:null), true);?>


<?php echo TodoyuLabelManager::getLabel('comment.ext.mail.showcommentinprojectview', null);?>:
<?php echo TodoyuString::html2text((isset($this->scope["commentlink"]) ? $this->scope["commentlink"] : null), true);?>


========================================================================

<?php echo $this->scope["task"]["title"];?>

------------------------------------------------------------------------
<?php echo TodoyuString::html2text((isset($this->scope["task"]["description"]) ? $this->scope["task"]["description"]:null), true);?>


========================================================================<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>