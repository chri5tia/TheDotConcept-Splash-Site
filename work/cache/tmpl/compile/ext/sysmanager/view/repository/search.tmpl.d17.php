<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
echo '<h5>' . htmlentities(Todoyu::Label("LLL:sysmanager.ext.browse.title"), ENT_QUOTES, 'UTF-8', false) . '</h5>';?>


<div class="extensionSearch">
	<div class="control">
		<?php echo $this->scope["form"];?>

	</div>

	<div class="results extListing" id="repository-search-results">
		<?php echo $this->scope["results"];?>

	</div>
</div>

<script type="text/javascript">
	Todoyu.Ext.sysmanager.Repository.Search.init();
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>