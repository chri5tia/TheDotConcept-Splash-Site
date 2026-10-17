<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><li>
<form action="?ext=search" method="get" name="search" id="<?php echo $this->scope["name"];?>-form" onsubmit="return false" class="searchModeAll">
	<input type="hidden" name="mode" value="all" id="<?php echo $this->scope["name"];?>-mode" />

	<input name="query" class="query" id="<?php echo $this->scope["name"];?>-query" type="text" autocomplete="off" value="<?php echo $this->scope["query"];?>" />

	<a id="<?php echo $this->scope["name"];?>-mode-button" class="button mode">&nbsp;</a>

	<div style="clear:both"><!-- --></div>

	<?php if ((isset($this->scope["searchModes"]) ? $this->scope["searchModes"] : null)) {
?>
		<div id="<?php echo $this->scope["name"];?>-modes" style="display:none">
			<ul>
				<?php 
$_fh5_data = (isset($this->scope["searchModes"]) ? $this->scope["searchModes"] : null);
if ($this->isArray($_fh5_data) === true)
{
	foreach ($_fh5_data as $this->scope['searchMode'])
	{
/* -- foreach start output */
?>
					<li class="searchmode<?php echo ucfirst((isset($this->scope["searchMode"]["type"]) ? $this->scope["searchMode"]["type"]:null));?>">
						<a href="javascript:void(0)">
							<?php echo TodoyuLabelManager::getLabel((isset($this->scope["searchMode"]["labelMode"]) ? $this->scope["searchMode"]["labelMode"]:null), null);?>

						</a>
					</li>
				<?php 
/* -- foreach end output */
	}
}?>

			</ul>
		</div>
	<?php 
}?>


	<div id="<?php echo $this->scope["name"];?>-suggest" class="searchSuggest" style="display:none"></div>

</form>
</li><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>