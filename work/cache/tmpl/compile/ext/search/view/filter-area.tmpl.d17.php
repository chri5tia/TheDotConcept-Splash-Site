<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="filter-controls" class="overflow">
	<?php echo $this->scope["filterControls"];?>

</div>

<div id="action-panel" class="overflow areaBox">
	<?php echo $this->scope["actionPanel"];?>

</div>

<div id="sorting-flags" class="overflow areaBox" style="display:none">

</div>

<div id="widget-area" class="overflow">
	<?php echo $this->scope["activeWidgets"];?>

</div>

<div id="search-results" class="overflow">
	<?php echo $this->scope["searchResults"];?>

</div>

<?php if ((isset($this->scope["init"]) ? $this->scope["init"] : null)) {
?>
<script><?php echo $this->scope["init"];?></script>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>