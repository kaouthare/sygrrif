<?php $this->title = "Anticorps: sources"?>

<?php echo $navBar?>

<head>
<!-- Bootstrap core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<?php include "Modules/anticorps/View/navbar.php"; ?>

<br>
<div class="contatiner">
	<div class="col-md-6 col-md-offset-3">
	
		<div class="page-header">
			<h1>
				Sources<br> <small></small>
			</h1>
		</div>

		<table id="dataTable" class="table table-striped">
			<thead>
				<tr>
					<td><a href="sources/index/id">Id</a></td>
					<td><a href="sources/index/nom">Name</a></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $sources as $source ) : ?> 
				<tr>
					<?php $sourceId = $this->clean ( $source ['id'] ); ?>
					<td><?= $sourceId ?></td>
				    <td><?= $this->clean ( $source ['nom'] ); ?></td>
				    <td>
				      <button type='button' onclick="location.href='sources/edit/<?= $sourceId ?>'" class="btn btn-xs btn-primary" id="navlink">Edit</button>
				    </td>  
	    		</tr>
	    		<?php endforeach; ?>
				
			</tbody>
		</table>

	</div>
</div>

<?php if (isset($msgError)): ?>
<p><?= $msgError ?></p>
<?php endif; ?>
