<?php $this->title = "SyGRRiF Database users"?>

<?php echo $navBar?>

<head>
<!-- Bootstrap core CSS -->
<link href="bootstrap/datepicker/css/bootstrap-datetimepicker.min.css"
	rel="stylesheet">
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<?php include "Modules/core/View/Users/usersnavbar.php"; ?>

<br>
<div class="container">
	<div class="col-md-10 col-md-offset-1">
	  <form role="form" class="form-horizontal" action="users/editquery" method="post">
		<div class="page-header">
			<h1>
				Edit User <br> <small></small>
			</h1>
		</div>
	
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Name</label>
			<div class="col-xs-10">
				<input class="form-control" id="name" type="text" name="name" 
				       value="<?= $this->clean($user['name']); ?>"
				/>
			</div>
		</div>
		<br></br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Firstname</label>
			<div class="col-xs-10">
				<input class="form-control" id="firstname" type="text" name="firstname"
					   value="<?= $this->clean($user['firstname']); ?>"
				/>
			</div>
		</div>
		<br></br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Login</label>
			<div class="col-xs-10">
				<input class="form-control" id="login" type="text" name="login"
					value="<?= $this->clean($user['login']); ?>"
				/>
			</div>
		</div>
		<br></br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Email</label>
			<div class="col-xs-10">
				<input class="form-control" id="email" type="text" name="email"
					value="<?= $this->clean($user['email']); ?>"
				/>
			</div>
		</div>
		<br></br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Phone</label>
			<div class="col-xs-10">
				<input class="form-control" id="phone" type="text" name="phone"
				    value="<?= $this->clean($user['tel']); ?>"
				/>
			</div>
		</div>
		<br></br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Unit</label>
			<div class="col-xs-10">
				<select class="form-control" name="unit">
					<?php foreach ($unitsList as $unit):?>
					    <?php $unitname = $this->clean( $unit['name'] ); 
					          $userunit = $this->clean( $user['unit']);
					          $selected = "";
					          if ($unitname == $userunit){
					          	$selected = "selected";
					          }
					    ?>
						<OPTION value="<?= $unitname ?>" <?= $selected ?>> <?= $unitname ?> </OPTION>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<br></br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Team</label>
			<div class="col-xs-10">
				<select class="form-control" name="team">
					<?php foreach ($teamsList as $team):?>
					    <?php $teamname = $this->clean( $team['name'] ); 
					          $userteam = $this->clean( $user['team']);
					          $selected = "";
					          if ($teamname == $userteam){
					          	$selected = "selected";
					          }
					    ?>
						<OPTION value="<?= $teamname ?>" <?= $selected ?>> <?= $teamname ?> </OPTION>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		
		
		<br></br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Responsible</label>
			<div class="col-xs-10">
				<select class="form-control" name="responsible">   
					<?php foreach ($respsList as $resp):?>
					    <?php $respname = $this->clean( $resp ); 
					          $userteam = $this->clean( $user['resp_summary']);
					          $selected = "";
					          if ($teamname == $userteam){
					          	$selected = "selected";
					          }
					    ?>
						<OPTION value="<?= $respname ?> " <?= $selected ?>> <?= $respname ?> </OPTION>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		
		
		<br></br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"></label>
			<div class="col-xs-10">
			  <div class="checkbox">
			    <label>
			    <?php $checked=''; if ($isResponsible){$checked = "checked disabled";} ?>
			      <input type="checkbox" name="is_responsible" <?= $checked ?> > is responsible
			    </label>
              </div>
			</div>
		</div>
		<br></br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2">Status</label>
			<div class="col-xs-10">
				<select class="form-control" name="status">
					<?php foreach ($statusList as $status):?>
					    <?php $statusname = $this->clean( $status['name'] ); 
					          $userstatus = $this->clean($user['status']);
					          $selected = "";
					          if ($userstatus == $statusname){
					          	$selected = "selected";
					          }
					    ?>
						<OPTION value="<?= $statusname ?>" <?= $selected ?>> <?= $statusname ?> </OPTION>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<br></br>
		<div class="col-xs-4 col-xs-offset-8" id="button-div">
		        <input type="submit" class="btn btn-primary" value="Save" />
				<button type="button" onclick="location.href='users'" class="btn btn-default" id="navlink">Cancel</button>
		</div>
      </form>

	</div>
</div>

<?php if (isset($msgError)): ?>
<p><?= $msgError ?></p>
<?php endif; ?>
