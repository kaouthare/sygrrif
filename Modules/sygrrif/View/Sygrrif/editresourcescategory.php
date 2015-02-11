<?php $this->title = "SyGRRiF Edit VISA"?>

<?php echo $navBar?>

<head>
<style>
#button-div{
	padding-top: 20px;
}

</style>


</head>


<?php include "Modules/sygrrif/View/navbar.php"; ?>

<br>
<div class="container">
	<div class="col-md-6 col-md-offset-3">
	<form role="form" class="form-horizontal" action="sygrrif/editresourcescategoryquery"
		method="post">
	
	
		<div class="page-header">
			<h1>
				<?= SyTranslator::Edit_a_resources_category($lang) ?>
				<br> <small></small>
			</h1>
		</div>
	
		<input class="form-control" id="id" type="hidden"  name="id" value="<?= $rc['id']?>" />
	
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"><?= SyTranslator::Name($lang) ?></label>
			<div class="col-xs-10">
				<input class="form-control" id="name" type="text" name="name"
				       value="<?= $rc['name'] ?>"  
				/>
			</div>
		</div>
		<br></br>
		<div class="col-xs-6 col-xs-offset-6" id="button-div">
		        <input type="submit" class="btn btn-primary" value="<?= SyTranslator::Save($lang) ?>" />
		        <button type="button" onclick="location.href='<?="sygrrif/deleteresourcecategory/".$this->clean($rc['id']) ?>'" class="btn btn-danger" id="navlink"><?= SyTranslator::Delete($lang) ?></button>
				<button type="button" onclick="location.href='sygrrif/resourcescategory'" class="btn btn-default" id="navlink"><?= SyTranslator::Cancel($lang) ?></button>
		</div>
      </form>
	</div>
</div>

<?php if (isset($msgError)): ?>
<p><?= $msgError ?></p>
<?php endif; ?>
