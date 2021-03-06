<?php $this->title = "SyGRRiF Database users"?>

<?php echo $navBar?>

<head>
<!-- Bootstrap core CSS -->
<link href="bootstrap/datepicker/css/bootstrap-datetimepicker.min.css"
	rel="stylesheet">
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<?php include "Modules/anticorps/View/navbar.php"; ?>

<br>
<div class="contatiner">

	<div class="col-md-12">

		<div class="page-header">
			<h1>
				Users<br> <small></small>
			</h1>
		</div>
	
		<table id="dataTable" class="table table-striped">
			<thead>
				<tr>
					<td class="text-center"><a href="anticorps/index/id">ID</a></td>
					<td class="text-center"><a href="anticorps/index/nom">Nom</a></td>
					<td class="text-center"><a href="anticorps/index/no_h2p2">No H2P2</a></td>
					<td class="text-center"><a href="anticorps/index/fournisseur">Fournisseur</a></td>
					<td class="text-center"><a href="anticorps/index/id_source">Source</a></td>
					<td class="text-center"><a href="anticorps/index/reference">Référence</a></td>
					<td class="text-center"><a href="anticorps/index/clone">Clone</a></td>
					<td class="text-center"><a href="anticorps/index/lot">lot</a></td>
					<td class="text-center"><a href="anticorps/index/id_isotype">Isotype</a></td>
					<td class="text-center"><a href="anticorps/index/stockage">Stockage</a></td>
					<td class="text-center"><a href="anticorps/"><p style="border-bottom: 1px solid #f1f1f1">Tissus</p> espèce - organe - validé - ref. bloc</a></td>
					<td class="text-center"><a href="anticorps/index/disponible">Disponible</a></td>
					<td class="text-center"><a href="anticorps/index/id">Propriétaires</a></td>
					<td class="text-center"><a href="anticorps/index/date_recept">Date réception</a></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $anticorpsArray as $anticorps ) : ?> 
				<tr>
					<?php $anticorpsId = $this->clean ( $anticorps['id'] ); ?>
					<td class="text-center"><?= $anticorpsId ?></td>
					<td class="text-center"><?= $this->clean ( $anticorps ['nom'] ); ?></td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['no_h2p2'] ); ?></td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['fournisseur'] ); ?></td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['source'] ); ?></td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['reference'] ); ?></td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['clone'] ); ?></td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['lot'] ); ?></td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['isotype'] ); ?></td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['stockage'] ); ?></td>
				    
				    <td class="text-center" style="min-width: 300px; "><?php 
				    	$tissus = $anticorps ['tissus'];
				    	$val = "";
				    	for( $i = 0 ; $i < count($tissus) ; ++$i){
				    		$val = $val . "<p>"  . $tissus[$i]['espece'] . " - "
		                                . $tissus[$i]['organe'] . " - "
		                                . $tissus[$i]['valide'] . " - "
										. $tissus[$i]['ref_bloc'] . "</p>";  
				    	}
					    echo $val;
				    ?></td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['disponible'] ); ?></td>
				    <td class="text-center"><?php
				    	$owner =  $anticorps ['proprietaire'];
				    	if (count($owner) > 0){
					    	$name = $owner[0]['firstname'] . " " . $owner[0]['name'];
					    	$name = $this->clean ( $name ); 
					        echo $name;
				    	}
				    	?>
				    </td>
				    <td class="text-center"><?= $this->clean ( $anticorps ['date_recept'] ); ?></td>
				    <td><button onclick="location.href='anticorps/edit/<?= $anticorpsId ?>'" class="btn btn-xs btn-primary" id="navlink">Edit</button></td>  
	    		</tr>
	    		<?php endforeach; ?>
				
			</tbody>
		</table>

	</div>
</div>

<?php if (isset($msgError)): ?>
<p><?= $msgError ?></p>
<?php endif; ?>
