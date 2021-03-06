<?php $this->title = "SyGRRiF edit pricing"?>

<?php echo $navBar?>


<head>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include "Modules/sygrrif/View/navbar.php"; ?>

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		
		<div class="page-header">
			<h1>
				Associate a pricing to a unit  <br> <small></small>
			</h1>
		</div>
		
		<div>
		<?php if (isset($msgError)){ ?>
			<p> Unable to modify the pricing</p>
			<p> <?= $msgError ?></p>
		<?php }else{?>
			<p> The pricing has been successfully modified !</p>
		<?php } ?>
		</div>
		<div class="col-md-1 col-md-offset-10">
			<button onclick="location.href='sygrrif/unitpricing'" class="btn btn-success" id="navlink">Ok</button>
		</div>
		
     </div>
</div>