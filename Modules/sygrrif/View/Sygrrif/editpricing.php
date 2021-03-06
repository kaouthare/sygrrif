<?php $this->title = "SyGRRiF edit pricing"?>

<?php echo $navBar?>

<head>
<!-- Bootstrap core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
#button-div{
	padding-top: 20px;
}

</style>


</head>


<?php include "Modules/sygrrif/View/navbar.php"; ?>

<br>
<div class="container">
	<div class="col-md-8 col-md-offset-2">
	<form role="form" class="form-horizontal" action="sygrrif/editpricingquery"
		method="post">
	
	
		<div class="page-header">
			<h1>
				Edit pricing <br> <small></small>
			</h1>
		</div>
	
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">ID</label>
			<div class="col-xs-10">
				<input class="form-control" id="id" type="text" name="id" value="<?= $this->clean($pricing['id'])?>" readonly
				/>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Name</label>
			<div class="col-xs-10">
				<input class="form-control" id="name" type="text" name="name" value="<?= $this->clean($pricing['tarif_name'])?>"
				/>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Unique price</label>
			<div class="col-xs-10">
					<select class="form-control" name="tarif_unique">
						<?php $unique = $this->clean($pricing['tarif_unique']) ?>
						<OPTION value="oui" <?php if ($unique==1){echo "selected=\"selected\"";}?>> Oui </OPTION>
						<OPTION value="non" <?php if ($unique==0){echo "selected=\"selected\"";}?>> Non </OPTION>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Price night</label>
			<div class="col-xs-10">
					<select class="form-control" name="tarif_nuit">
					    <?php $tnuit = $this->clean($pricing['tarif_nuit']) ?>
						<OPTION value="oui" <?php if ($tnuit==1){echo "selected=\"selected\"";}?>> Oui </OPTION>
						<OPTION value="non" <?php if ($tnuit==0){echo "selected=\"selected\"";}?>> Non </OPTION>
				</select>
			</div>
			<br></br>
			<div class="col-xs-10 col-xs-offset-2">
				<label for="inputEmail" class="control-label col-xs-3">Night beginning</label>
				<div class="col-xs-2">
				<select class="form-control col-xs-2" name="night_start">
				    <?php $snight = $this->clean($pricing['night_start']) ?>
					<OPTION value="18" <?php if ($snight==18){echo "selected=\"selected\"";}?>> 18h </OPTION>
					<OPTION value="19" <?php if ($snight==19){echo "selected=\"selected\"";}?>> 19h </OPTION>
					<OPTION value="20" <?php if ($snight==20){echo "selected=\"selected\"";}?>> 20h </OPTION>
					<OPTION value="21" <?php if ($snight==21){echo "selected=\"selected\"";}?>> 21h </OPTION>
					<OPTION value="22" <?php if ($snight==22){echo "selected=\"selected\"";}?>> 22h </OPTION>
				</select>
				</div>
				<label for="inputEmail" class="control-label col-xs-3">Night end</label>
				<div class="col-xs-2">
				<select class="form-control" name="night_end">
				    <?php $enight = $this->clean($pricing['night_end']) ?>
					<OPTION value="6" <?php if ($enight==6){echo "selected=\"selected\"";}?>> 6h </OPTION>
					<OPTION value="7" <?php if ($enight==7){echo "selected=\"selected\"";}?>> 7h </OPTION>
					<OPTION value="8" <?php if ($enight==8){echo "selected=\"selected\"";}?>> 8h </OPTION>
					<OPTION value="9" <?php if ($enight==9){echo "selected=\"selected\"";}?>> 9h </OPTION>
				</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Price weekend</label>
			<div class="col-xs-10">
					<select class="form-control" name="tarif_we">
					    <?php $tarif_we = $this->clean($pricing['tarif_we']) ?>
						<OPTION value="oui" <?php if ($tarif_we==1){echo "selected=\"selected\"";}?>> Oui </OPTION>
						<OPTION value="non" <?php if ($tarif_we==0){echo "selected=\"selected\"";}?>> Non </OPTION>
				</select>
			</div>
			
			
			<?php 
			$jours = $this->clean($pricing['choice_we']);
			$list = explode(",", $jours);
			if (count($list) < 7){
				$list[0] = 0; $list[1] = 0; $list[2] = 0; $list[3] = 0;
				$list[4] = 0; $list[5] = 1; $list[6] = 1;
			}
			
			?>
			<div class="col-xs-10 col-xs-offset-2">
				<label for="inputEmail" class="control-label col-xs-3">Weekend days</label>
				<div class="col-xs-2">
					<div class="checkbox">
    				<label>
    				    <?php $lundi = $list[0]; ?>
      					<input type="checkbox" name="lundi" <?php if ($lundi==1){echo "checked";}?>> Monday
    				</label>
  					</div>
  					<div class="checkbox">
    				<label>
    				    <?php $mardi = $list[1]; ?>
      					<input type="checkbox" name="mardi" <?php if ($mardi==1){echo "checked";}?>> Tuesday
    				</label>
  					</div>
  					<div class="checkbox">
    				<label>
    					<?php $mercredi = $list[2]; ?>
      					<input type="checkbox" name="mercredi" <?php if ($mercredi==1){echo "checked";}?>> Wednesday
    				</label>
  					</div>
  					<div class="checkbox">
    				<label>
    				    <?php $jeudi = $list[3]; ?>
      					<input type="checkbox" name="jeudi" <?php if ($jeudi==1){echo "checked";}?>> Thursday
    				</label>
  					</div>
  					<div class="checkbox">
    				<label>
    				    <?php $vendredi = $list[4]; ?>
      					<input type="checkbox" name="vendredi" <?php if ($vendredi==1){echo "checked";}?>> Friday
    				</label>
  					</div>
  					<div class="checkbox">
    				<label>
    				    <?php $samedi = $list[5]; ?>
      					<input type="checkbox" name="samedi" <?php if ($samedi==1){echo "checked";}?>> Saturday
    				</label>
  					</div>
  					<div class="checkbox">
    				<label>
    				    <?php $dimanche = $list[6]; ?>
      					<input type="checkbox" name="dimanche" <?php if ($dimanche==1){echo "checked";}?>> Sunday
    				</label>
  					</div>
				</div>
			</div>
		</div>
		
		<div class="col-xs-4 col-xs-offset-8" id="button-div">
		        <input type="submit" class="btn btn-primary" value="Save" />
				<button type="button" onclick="location.href='sygrrif/pricing'" class="btn btn-default" id="navlink">Cancel</button>
		</div>
      </form>
	</div>
</div>

<?php if (isset($msgError)): ?>
<p><?= $msgError ?></p>
<?php endif; ?>
