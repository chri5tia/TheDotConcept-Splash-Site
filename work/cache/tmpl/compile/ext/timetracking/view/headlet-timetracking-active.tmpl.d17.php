<?php
/* template head */
if (function_exists('Dwoo_Plugin_Button')===false)
	$this->getLoader()->loadPlugin('Button');
/* end template head */ ob_start(); /* template body */ ?><li class="tracking">
	<div class="taskDetails">
		<a href="javascript:void(0)" onclick="Todoyu.Ext.timetracking.Task.goToTask(<?php echo $this->scope["task"]["project"]["id"];?>, 0, true)" title="<?php echo TodoyuLabelManager::getLabel('LLL:timetracking.ext.jumpToProject', null);?>" class="project">
			<?php echo htmlentities((isset($this->scope["task"]["company"]["shortname"]) ? $this->scope["task"]["company"]["shortname"]:null), ENT_QUOTES, 'UTF-8', false);?>: <?php echo htmlentities((isset($this->scope["task"]["project"]["title"]) ? $this->scope["task"]["project"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>

		</a>
		<a href="javascript:void(0)" onclick="Todoyu.Ext.timetracking.Task.goToTask(<?php echo $this->scope["task"]["project"]["id"];?>, <?php echo $this->scope["task"]["id"];?>, true)" title="<?php echo htmlentities((isset($this->scope["task"]["title"]) ? $this->scope["task"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?>" class="title">
			<?php echo $this->scope["task"]["id_project"];?>.<?php echo $this->scope["task"]["tasknumber"];?>: <strong><?php echo htmlentities((isset($this->scope["task"]["title"]) ? $this->scope["task"]["title"]:null), ENT_QUOTES, 'UTF-8', false);?></strong>
		</a>
	</div>
	<div class="taskTime">
		<div class="tracking">
			<?php echo TodoyuLabelManager::getLabel('LLL:timetracking.ext.totalTrackedTime', null);?> <?php echo TodoyuTime::formatTime((isset($this->scope["tracked"]) ? $this->scope["tracked"] : null), true);?> + <span id="<?php echo $this->scope["name"];?>-tracking" class="currentTracking"><?php echo TodoyuTime::formatTime((isset($this->scope["tracking"]) ? $this->scope["tracking"] : null), true);?></span>
		</div>
		<div class="percent">
			<span class="number" id="<?php echo $this->scope["name"];?>-percent"><?php echo $this->scope["percent"];?>%</span>
			<span class="bar">
				<?php $this->scope["max"]=100?>

				<?php $this->scope["length"]=(((isset($this->scope["percent"]) ? $this->scope["percent"] : null) / 100) * (isset($this->scope["max"]) ? $this->scope["max"] : null))?>

				<?php if ((isset($this->scope["length"]) ? $this->scope["length"] : null) > (isset($this->scope["max"]) ? $this->scope["max"] : null)) {
?>
					<?php $this->scope["length"]=(isset($this->scope["max"]) ? $this->scope["max"] : null)?>

				<?php 
}?>

				<span class="progress <?php echo $this->scope["barClass"];?>" id="<?php echo $this->scope["name"];?>-progress" style="width:<?php echo $this->scope["length"];?>px"></span>
			</span>
			<span class="estimatedWorkload">(<?php echo TodoyuLabelManager::getLabel('LLL:timetracking.ext.estimated_workload', null);?>: <?php echo TodoyuTime::formatTime((isset($this->scope["task"]["estimated_workload"]) ? $this->scope["task"]["estimated_workload"]:null), false);?>)</span>
		</div>
	</div>
	<div class="stop">
		<?php echo Dwoo_Plugin_Button($this, "", "Todoyu.Ext.timetracking.Task.stop(".(isset($this->scope["task"]["id"]) ? $this->scope["task"]["id"]:null).")", "stopTracking", '', "LLL:timetracking.ext.stop", '', false, false, '');?>

	</div>
</li><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>