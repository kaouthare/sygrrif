<?php $this->title = "SyGRRiF Database users"?>

<?php echo $navBar?>

<head>

	<link href="externals/datepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="externals/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<script src="externals/datepicker/js/moments.js"></script>
	<script src="externals/jquery-1.11.1.js"></script>

</head>


<?php include "Modules/core/View/Users/usersnavbar.php"; ?>

<br>
<div class="container">
	<div class="col-md-10 col-md-offset-1">
	  <form role="form" class="form-horizontal" action="users/addquery" method="post">
		<div class="page-header">
			<h1>
			<?= CoreTranslator::Add_User($lang) ?>
			<br> <small></small>
			</h1>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Name($lang) ?></label>
			<div class="col-xs-10">
				<input class="form-control" id="name" type="text" name="name" 
				/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Firstname($lang) ?></label>
			<div class="col-xs-10">
				<input class="form-control" id="firstname" type="text" name="firstname"
				/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="login" class="control-label col-xs-2"><?= CoreTranslator::Login($lang) ?></label>
			<div class="col-xs-10">
				<input class="form-control" id="login" type="text" name="login"
				/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="pwd" class="control-label col-xs-2"><?= CoreTranslator::Password($lang) ?></label>
			<div class="col-xs-4">
				<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
			</div>
			<label for="pwdc" class="control-label col-xs-2"><?= CoreTranslator::Confirm($lang) ?></label>
			<div class="col-xs-4">
				<input type="password" class="form-control" id="pwdc" name="pwdc" placeholder="Password">
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Email($lang) ?></label>
			<div class="col-xs-10">
				<input class="form-control" id="email" type="text" name="email"
				/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Phone($lang) ?></label>
			<div class="col-xs-10">
				<input class="form-control" id="phone" type="text" name="phone"
				/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Unit($lang) ?></label>
			<div class="col-xs-10">
				<select class="form-control" name="unit">
					<?php foreach ($unitsList as $unit):?>
					    <?php $unitname = $this->clean( $unit['name'] );
					          $unitId = $this->clean( $unit['id'] );
					    ?>
						<OPTION value="<?= $unitId ?>" > <?= $unitname ?> </OPTION>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Responsible($lang) ?></label>
			<div class="col-xs-10">
				<select class="form-control" name="responsible">   
					<?php foreach ($respsList as $resp):?>
					    <?php   $respId = $this->clean( $resp['id'] );
					    		if ($resp['id'] > 1){
							    	$respSummary = $respId . " " . $this->clean( $resp['firstname'] ) . " " . $this->clean( $resp['name'] );
					    		}
					    		else{
					    			$respSummary = "--";
					    		}
						?>
						<OPTION value="<?= $respId ?> " > <?= $respSummary ?> </OPTION>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"></label>
			<div class="col-xs-10">
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="is_responsible" > <?= CoreTranslator::is_responsible($lang) ?>
			    </label>
              </div>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Status($lang) ?></label>
			<div class="col-xs-10">
				<select class="form-control" name="status">
					<?php foreach ($statusList as $status):?>
					    <?php $statusname = $this->clean( $status['name'] );
					          $statusid = $this->clean( $status['id'] );
					    ?>
						<OPTION value="<?= $statusid ?>"> <?= $statusname ?> </OPTION>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Convention($lang) ?></label>
			<div class="col-xs-10">
				<select class="form-control" name="convention">
					<OPTION value="-1" > auto </OPTION>
					<?php foreach ($conventionsList as $convention):?>
					    <?php $convention = $this->clean( $convention[0] );
					    ?>
						<OPTION value="<?= $convention ?>" > <?= $convention ?> </OPTION>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<br>
		<div class="form-group ">
		
				<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Date_convention($lang) ?></label>
				<div class="col-xs-10">
				<div class='input-group date' id='datetimepicker5'>
					<input type='text' class="form-control" data-date-format="YYYY-MM-DD" name="date_convention"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			
			<script src="externals/datepicker/js/bootstrap-datetimepicker.min.js"></script>
      		<script type="text/javascript">
			$(function () {
				$('#datetimepicker5').datetimepicker({
					pickTime: false
				});
			});
		    </script>
		    </div>
		</div>
		<br>
		<div class="form-group ">
			<label for="inputEmail" class="control-label col-xs-2"><?= CoreTranslator::Date_end_contract($lang) ?></label>
				<div class="col-xs-10">
				<div class='input-group date' id='datetimepicker6'>
					<input type='text' class="form-control" data-date-format="YYYY-MM-DD" name="date_end_contract"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			
			<script src="externals/datepicker/js/bootstrap-datetimepicker.min.js"></script>
      		<script type="text/javascript">
			$(function () {
				$('#datetimepicker6').datetimepicker({
					pickTime: false
				});
			});
		    </script>
		    </div>
		</div>		
		
		<br>
		<div class="col-xs-4 col-xs-offset-8" id="button-div">
		        <input type="submit" class="btn btn-primary" value="<?= CoreTranslator::Save($lang)?>" />
				<button type="button" onclick="location.href='users'" class="btn btn-default" id="navlink"><?= CoreTranslator::Cancel($lang) ?></button>
		</div>
      </form>

	</div>
</div>

<?php if (isset($msgError)): ?>
<p><?= $msgError ?></p>
<?php endif; ?>
