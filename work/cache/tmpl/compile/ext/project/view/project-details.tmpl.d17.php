<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><div id="project-<?php echo $this->scope["idProject"];?>-data" class="data infoBoxOuter overflow">
	<div id="project-<?php echo $this->scope["idProject"];?>-tabcontainer">
		<div class="projectDetailRight">
			<div class="projectDetailLeft">
				<div class="projectDetailsTabs">
					<?php echo Dwoo_Plugin_include($this, "project-details-tabs.tmpl", null, null, null, '_root', null);?>

				</div>

				<div class="projectDetailsContent overflow" id="project-<?php echo $this->scope["idProject"];?>-tabcontent">
					<div id="project-<?php echo $this->scope["idProject"];?>-tabcontent-<?php echo $this->scope["activeTab"];?>" class="tab projectDetails<?php echo ucfirst((isset($this->scope["activeTab"]) ? $this->scope["activeTab"] : null));?>">
						<?php echo $this->scope["content"];?>

					</div>
				</div>
			</div>
		</div>
		<div id="project-<?php echo $this->scope["idProject"];?>-ajaxloader" class="ajaxLoader" style="display:none"><?php echo TodoyuLabelManager::getLabel('core.global.load', null);?></div>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>