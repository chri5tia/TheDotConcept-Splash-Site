<?php
/* template head */
if (function_exists('Dwoo_Plugin_isSeeAllCommentsAllowed')===false)
	$this->getLoader()->loadPlugin('isSeeAllCommentsAllowed');
if (function_exists('Dwoo_Plugin_personLabel')===false)
	$this->getLoader()->loadPlugin('personLabel');
if (function_exists('Dwoo_Plugin_mailreceiverLabel')===false)
	$this->getLoader()->loadPlugin('mailreceiverLabel');
if (function_exists('Dwoo_Plugin_isAssetGDcompatibleImage')===false)
	$this->getLoader()->loadPlugin('isAssetGDcompatibleImage');
/* end template head */ ob_start(); /* template body */ ?><article
		class="comment <?php if ((isset($this->scope["isFeedbackPerson"]) ? $this->scope["isFeedbackPerson"] : null)) {
?>withFeedback<?php 
}?> <?php if ((isset($this->scope["person_create"]["id"]) ? $this->scope["person_create"]["id"]:null) == Todoyu::personid()) {
?> ownComment<?php 
}
if ((isset($this->scope["is_public"]) ? $this->scope["is_public"] : null)) {

if (Dwoo_Plugin_isSeeAllCommentsAllowed($this)) {
?> isPublic<?php 
}

}?>"
		id="task-comment-<?php echo $this->scope["id"];?>" xmlns="http://www.w3.org/1999/html">
	<div class="commentBackground">
		<div class="comment-meta" id="task-comment-<?php echo $this->scope["id"];?>-properties">
			<div class="comment-img">
				<?php if ((isset($this->scope["isFeedbackPerson"]) ? $this->scope["isFeedbackPerson"] : null)) {
?>
					<a class="personApproval hasicon <?php if ((isset($this->scope["isUnapproved"]) ? $this->scope["isUnapproved"] : null)) {


}
else {
?>isseen<?php 
}?>" href="javascript:void(0)" id="comment-<?php echo $this->scope["id"];?>-seenstatus" onclick="Todoyu.Ext.comment.Comment.toggleSeen(<?php echo $this->scope["id"];?>, <?php echo Todoyu::personid();?>)"></a>
				<?php 
}?>

				<?php echo TodoyuContactImageManager::getAvatarImage((isset($this->scope["person_create"]["id"]) ? $this->scope["person_create"]["id"]:null), 'person');?>

			</div>

			<div class="clear">
				<p class="personLabel">
					<?php echo Dwoo_Plugin_personLabel($this, (isset($this->scope["person_create"]["id"]) ? $this->scope["person_create"]["id"]:null), "comment-personcreate", (isset($this->scope["id"]) ? $this->scope["id"] : null), 'span', '');?>

				</p>
				<p id="task-comment-<?php echo $this->scope["id"];?>-crdate" class="crdate"><?php echo TodoyuTime::format((isset($this->scope["date_create"]) ? $this->scope["date_create"] : null), 'datetime');?></p>
			</div>
		</div>


		<div class="comment-body">

			<div class="text" id="task-comment-<?php echo $this->scope["id"];?>-text">
				<p><?php echo TodoyuString::substituteLinkableElements(TodoyuHtmlFilter::clean((isset($this->scope["comment"]) ? $this->scope["comment"] : null)));?></p>
			</div>

			<div id="task-comment-<?php echo $this->scope["id"];?>-involved" class="involved">
					<?php if ((isset($this->scope["involvedPersons"]) ? $this->scope["involvedPersons"] : null)) {
?>
					<div class="involvedPersons" id="task-comment-<?php echo $this->scope["id"];?>-involvedPersons">

						<?php 
$_fh0_data = (isset($this->scope["involvedPersons"]) ? $this->scope["involvedPersons"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['involvedPerson'])
	{
/* -- foreach start output */
?>
							<span class="involvedPerson" id="task-comment-<?php echo $this->scope["id"];?>-involvedPerson-<?php echo $this->scope["involvedPerson"]["key"];?>">
								<?php if ((isset($this->scope["involvedPerson"]["feedback"]) ? $this->scope["involvedPerson"]["feedback"]:null)) {
?>
									<?php if ((isset($this->scope["involvedPerson"]["is_dummy"]) ? $this->scope["involvedPerson"]["is_dummy"]:null) == 1 && TodoyuRightsManager::isAllowed('comment','overrideDummy:acknowledgeFeedback')) {
?>
										<a href="javascript:void(0)" onclick="Todoyu.Ext.comment.Comment.toggleDummySeen(<?php echo $this->scope["id"];?>, <?php echo $this->scope["involvedPerson"]["personID"];?>, '<?php echo $this->scope["involvedPerson"]["fullname"];?>')">
									<?php 
}?>

									<?php if ((isset($this->scope["involvedPerson"]["personID"]) ? $this->scope["involvedPerson"]["personID"]:null) == Todoyu::personid()) {
?>
										<a href="javascript:void(0)" onclick="Todoyu.Ext.comment.Comment.toggleSeen(<?php echo $this->scope["id"];?>, <?php echo Todoyu::personid();?>)">
									<?php 
}?>

											<span class="icon feedback <?php echo (((isset($this->scope["involvedPerson"]["feedbackSeen"]) ? $this->scope["involvedPerson"]["feedbackSeen"]:null)) ? 'approved' : 'unapproved');?>"></span>
									<?php if ((isset($this->scope["involvedPerson"]["is_dummy"]) ? $this->scope["involvedPerson"]["is_dummy"]:null) == 1 && TodoyuRightsManager::isAllowed('comment','overrideDummy:acknowledgeFeedback')) {
?>
										</a>
										<?php 
}
else {
?>
										<?php if ((isset($this->scope["involvedPerson"]["personID"]) ? $this->scope["involvedPerson"]["personID"]:null) == Todoyu::personid()) {
?>
											</a>
										<?php 
}?>

									<?php 
}?>



								<?php 
}?>

								<?php if ((isset($this->scope["involvedPerson"]["email"]) ? $this->scope["involvedPerson"]["email"]:null)) {
?>
									<span class="icon email"></span>
								<?php 
}?>


								<span class="label">
									<?php if ((isset($this->scope["involvedPerson"]["personID"]) ? $this->scope["involvedPerson"]["personID"]:null)) {
?>
										<?php echo Dwoo_Plugin_personLabel($this, (isset($this->scope["involvedPerson"]["personID"]) ? $this->scope["involvedPerson"]["personID"]:null), "comment-personfeedback", 0, 'span', '');?>

									<?php 
}
else {
?>
										<?php if ((isset($this->scope["involvedPerson"]["receiverTuple"]) ? $this->scope["involvedPerson"]["receiverTuple"]:null)) {
?>
											<?php echo Dwoo_Plugin_mailreceiverLabel($this, (isset($this->scope["involvedPerson"]["receiverTuple"]) ? $this->scope["involvedPerson"]["receiverTuple"]:null), true);?>

										<?php 
}
else {
?>
											<?php echo htmlentities((isset($this->scope["involvedPerson"]["label"]) ? $this->scope["involvedPerson"]["label"]:null), ENT_QUOTES, 'UTF-8', false);?>

										<?php 
}?>

									<?php 
}?>

								</span>
							</span>
						<?php 
/* -- foreach end output */
	}
}?>

					</div>
				<?php 
}?>



				<?php if ((isset($this->scope["publicFeedbackWarning"]) ? $this->scope["publicFeedbackWarning"] : null)) {
?>
					<div class="warningMessage">
						<span class="icon"></span>
						<span class="label">
							<?php echo $this->scope["publicFeedbackWarning"];?>

						</span>
					</div>
				<?php 
}?>



				<?php if ((isset($this->scope["additionalContentItems"]) ? $this->scope["additionalContentItems"] : null)) {
?>
					<div class="additionalContent">
						<?php 
$_fh1_data = (isset($this->scope["additionalContentItems"]) ? $this->scope["additionalContentItems"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['additionalContentItem'])
	{
/* -- foreach start output */
?>
							<div class="<?php echo $this->scope["additionalContentItem"]["class"];?>"><?php echo $this->scope["additionalContentItem"]["content"];?></div>
						<?php 
/* -- foreach end output */
	}
}?>

					</div>
				<?php 
}?>


				<?php if ((isset($this->scope["assetInfos"]) ? $this->scope["assetInfos"] : null)) {
?>
					<div class="assets">
						<h6><?php echo TodoyuLabelManager::getLabel('comment.ext.assets.title', null);?></h6>
						<ul>
							<?php 
$_fh2_data = (isset($this->scope["assetInfos"]) ? $this->scope["assetInfos"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['asset'])
	{
/* -- foreach start output */
?>
								<li class="<?php if (Dwoo_Plugin_isAssetGDcompatibleImage($this, (isset($this->scope["asset"]["id"]) ? $this->scope["asset"]["id"]:null))) {
?>quickInfoAsset<?php 
}?>" id="asset-<?php echo $this->scope["asset"]["id"];?>-comment">
								 <a class="asset" onclick="Todoyu.Ext.assets.downloadAsset(<?php echo $this->scope["asset"]["id"];?>)"><?php echo $this->scope["asset"]["file_name"];?></a> <span class="filesize">(<?php echo TodoyuString::formatSize((isset($this->scope["asset"]["file_size"]) ? $this->scope["asset"]["file_size"]:null));?>)</span>
								</li>
							<?php 
/* -- foreach end output */
	}
}?>

						</ul>
					</div>
				<?php 
}?>


				<div class="action-bar" >
					<div id="task-comment-<?php echo $this->scope["id"];?>-actions" class="actions">
						<?php 
$_fh3_data = (isset($this->scope["actions"]) ? $this->scope["actions"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['action'])
	{
/* -- foreach start output */
?>
							<a href="<?php echo (($tmp = (isset($this->scope["action"]["href"]) ? $this->scope["action"]["href"]:null))===null||$tmp==='' ? "javascript:void(0)" : $tmp);?>" <?php if ((isset($this->scope["action"]["onclick"]) ? $this->scope["action"]["onclick"]:null)) {
?>onclick="<?php echo $this->scope["action"]["onclick"];?>"<?php 
}?> class="icon <?php echo $this->scope["action"]["class"];?>" title="<?php echo TodoyuLabelManager::getLabel((isset($this->scope["action"]["label"]) ? $this->scope["action"]["label"]:null), null);?>" id="comment-<?php echo $this->scope["id"];?>-action-<?php echo $this->scope["action"]["id"];?>">
								<span class="hidden"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["action"]["label"]) ? $this->scope["action"]["label"]:null), null);?></span>
							</a>
						<?php 
/* -- foreach end output */
	}
}?>

					</div>
					<div id="task-comment-<?php echo $this->scope["id"];?>-id" class="commentId" title="<?php echo TodoyuLabelManager::getLabel('comment.ext.id', null);?>" class="commentId">c<?php echo $this->scope["id"];?></div>

				</div>


				<?php if ((isset($this->scope["updateInfo"]) ? $this->scope["updateInfo"] : null)) {
?>
					<div class="updateInfo"><?php echo $this->scope["updateInfo"];?></div>
				<?php 
}?>


			</div>
		</div>
	</div>
</article>


<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>