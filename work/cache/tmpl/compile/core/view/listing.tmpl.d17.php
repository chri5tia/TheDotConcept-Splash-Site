<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ;
if ((isset($this->scope["noPaging"]) ? $this->scope["noPaging"] : null) || (isset($this->scope["page"]) ? $this->scope["page"] : null) == 1) {
?>
	<div class="paging-container" id="paging-<?php echo $this->scope["config"]["name"];?>">
<?php 
}?>


<?php if (! empty($this->scope["rows"])) {
?>
	<table class="list <?php echo $this->scope["config"]["name"];?>Listing withMouseHover" id="paging-<?php echo $this->scope["config"]["name"];?>-table-<?php echo $this->scope["page"];?>" >
		<colgroup>
			<?php 
$_fh0_data = (isset($this->scope["config"]["columns"]) ? $this->scope["config"]["columns"]:null);
$this->globals["foreach"]['default'] = array
(
	"iteration"		=> 1,
	"last"		=> null,
	"total"		=> $this->isArray($_fh0_data) ? count($_fh0_data) : 0,
);
$_fh0_glob =& $this->globals["foreach"]['default'];
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['colName']=>$this->scope['label'])
	{
		$_fh0_glob["last"] = (string) ($_fh0_glob["iteration"] === $_fh0_glob["total"]);
/* -- foreach start output */
?>
				<col class="<?php echo $this->scope["colName"];?>" />
			<?php 
/* -- foreach end output */
		$_fh0_glob["iteration"]+=1;
	}
}?>

		</colgroup>

		<thead>
			<tr class="headerLine">
				<?php 
$_fh1_data = (isset($this->scope["config"]["columns"]) ? $this->scope["config"]["columns"]:null);
$this->globals["foreach"]['default'] = array
(
	"iteration"		=> 1,
	"last"		=> null,
	"total"		=> $this->isArray($_fh1_data) ? count($_fh1_data) : 0,
);
$_fh1_glob =& $this->globals["foreach"]['default'];
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['colName']=>$this->scope['label'])
	{
		$_fh1_glob["last"] = (string) ($_fh1_glob["iteration"] === $_fh1_glob["total"]);
/* -- foreach start output */
?>
					<th scope="col" class="<?php echo $this->scope["colName"];?> <?php if ((isset($this->globals["foreach"]["default"]["last"]) ? $this->globals["foreach"]["default"]["last"]:null)) {
?>last<?php 
}?>"><?php echo TodoyuLabelManager::getLabel((isset($this->scope["label"]) ? $this->scope["label"] : null), null);?>&nbsp;</th>
				<?php 
/* -- foreach end output */
		$_fh1_glob["iteration"]+=1;
	}
}?>

			</tr>
		</thead>

		<tbody>
		<?php 
$_fh3_data = (isset($this->scope["rows"]) ? $this->scope["rows"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
			<tr class="<?php echo $this->classCall('cycle', array('default', "odd,even", true, true, ',', null, false));?>" id="<?php echo $this->scope["config"]["name"];?>-listingrow-<?php echo $this->scope["row"]["id"];?>">
				<?php 
$_fh2_data = (isset($this->scope["config"]["columns"]) ? $this->scope["config"]["columns"]:null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['colName']=>$this->scope['label'])
	{
/* -- foreach start output */
?>
					<?php $this->scope["fieldClass"]=((isset($this->scope["colName"]) ? $this->scope["colName"] : null)).('Class')?>

					<?php if (is_array($this->readVar("row.columns.".(isset($this->scope["colName"]) ? $this->scope["colName"] : null)))) {
?>
						<?php $this->scope["colContent"]=$this->readVar("row.columns.".(isset($this->scope["colName"]) ? $this->scope["colName"] : null).".content")?>

						<?php $this->scope["className"]=$this->readVar("row.columns.".(isset($this->scope["colName"]) ? $this->scope["colName"] : null).".classname")?>

						<?php $this->scope["spanID"]=$this->readVar("row.columns.".(isset($this->scope["colName"]) ? $this->scope["colName"] : null).".spanID")?>

						<?php $this->scope["onClick"]=$this->readVar("row.columns.".(isset($this->scope["colName"]) ? $this->scope["colName"] : null).".onClick")?>

					<?php 
}
else {
?>
						<?php $this->scope["colContent"]=$this->readVar("row.columns.".(isset($this->scope["colName"]) ? $this->scope["colName"] : null))?>

						<?php $this->scope["className"]=''?>

						<?php $this->scope["spanID"]=''?>

						<?php $this->scope["onClick"]=''?>

					<?php 
}?>

					<td class="<?php echo $this->scope["colName"];?> <?php echo $this->readVar("row.".(isset($this->scope["fieldClass"]) ? $this->scope["fieldClass"] : null));?>">
						<span <?php if ((isset($this->scope["spanID"]) ? $this->scope["spanID"] : null)) {
?>id="<?php echo $this->scope["spanID"];?>"<?php 
}?> class="<?php echo $this->scope["colName"];?> <?php echo $this->scope["className"];?>" <?php if ((isset($this->scope["colContent"]) ? $this->scope["colContent"] : null) && (isset($this->scope["colName"]) ? $this->scope["colName"] : null) != 'actions') {
?>title="<?php echo htmlentities((isset($this->scope["colContent"]) ? $this->scope["colContent"] : null), ENT_QUOTES, 'UTF-8', false);?>"<?php 
}?> <?php if ((isset($this->scope["onClick"]) ? $this->scope["onClick"] : null)) {
?>onclick="<?php echo $this->scope["onClick"];?>"<?php 
}?>>
							<?php if ((isset($this->scope["colName"]) ? $this->scope["colName"] : null) == 'actions') {
?>
								<?php echo TodoyuHtmlFilter::clean((isset($this->scope["colContent"]) ? $this->scope["colContent"] : null));?>

							<?php 
}
else {
?>
								<?php echo htmlentities((isset($this->scope["colContent"]) ? $this->scope["colContent"] : null), ENT_QUOTES, 'UTF-8', false);?>

							<?php 
}?>

						</span>
					</td>
				<?php 
/* -- foreach end output */
	}
}?>

			</tr>
		<?php 
/* -- foreach end output */
	}
}?>


		</tbody>
	</table>
<?php 
}
else {
?>
	<?php echo Todoyu::render('core/view/contentMessage.tmpl', array('labels'=>explode('|', 'core.global.listing.noItems'),'class'=>'','content'=>''));?>

<?php 
}?>



<?php if (! (isset($this->scope["noPaging"]) ? $this->scope["noPaging"] : null) && (isset($this->scope["page"]) ? $this->scope["page"] : null) < (isset($this->scope["pages"]) ? $this->scope["pages"] : null)) {
?>
	<div id="extendlisting">
		<a onclick='Todoyu.Listing.more("<?php echo $this->scope["name"];?>", <?php echo $this->scope["page"];?>, <?php echo $this->scope["listingParams"];?>)'><?php echo TodoyuLabelManager::getLabel('core.global.showMore', null);?></a>
	</div>

	<script type="text/javascript">
	Todoyu.Listing.init('<?php echo $this->scope["config"]["name"];?>', '<?php echo $this->scope["config"]["update"];?>', <?php echo $this->scope["config"]["size"];?>, <?php echo $this->scope["offset"];?>, <?php echo $this->scope["total"];?>);
	</script>
<?php 
}?>


<?php if ((isset($this->scope["noPaging"]) ? $this->scope["noPaging"] : null) || (isset($this->scope["page"]) ? $this->scope["page"] : null) == 1) {
?>
	</div> 
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>