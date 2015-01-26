<?php $this->title = "Supplies Orders"?>

<?php echo $navBar?>

<head>
<!-- Bootstrap core CSS -->
<link href="externals/datepicker/css/bootstrap-datetimepicker.min.css"
	rel="stylesheet">
</head>

<?php include "Modules/supplies/View/navbar.php"; ?>

<br>
<div class="contatiner">
	<div class="col-md-6 col-md-offset-3">
	
		<div class="page-header">
			<h1>
				Supplies Orders<br> <small></small>
			</h1>
		</div>

		<table id="dataTable" class="table table-striped">
			<thead>
				<tr>
					<td><a href="suppliesentries/index/id">Id</a></td>
					<td><a href="suppliesentries/index/id">User name</a></td>
					<td><a href="suppliesentries/index/id_status">Status</a></td>
					<td><a href="suppliesentries/index/date_open">Opened date</a></td>
					<td><a href="suppliesentries/index/date_close">Closed date</a></td>
					<td><a href="suppliesentries/index/date_last_modified">Last modified date</a></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $entriesArray as $item ) : 
				
				?> 
				<tr>
					<?php $itemId = $this->clean ( $item ['id'] ); ?>
					<td><?= $itemId ?></td>
				    <td><?= $this->clean ( $item ['user_name'] ); ?></td>
				    <?php 
				    $is_active = $this->clean ( $item ['id_status'] );
				    if ($is_active){$is_active = "Open";}
				    else{$is_active = "Close";}
				    ?>
				    <td><?= $is_active; ?></td>
				    <td><?= $this->clean ( $item ['date_open'] ); ?></td>
				    <td><?= $this->clean ( $item ['date_close'] ); ?></td>
				    <td><?= $this->clean ( $item ['date_last_modified'] ); ?></td>
				    <td>
				      <button type='button' onclick="location.href='suppliesentries/editentries/<?= $itemId ?>'" class="btn btn-xs btn-primary" id="navlink">Edit</button>
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