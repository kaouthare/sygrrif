<?php $this->title = "User settings"?>

<?php echo $navBar?>

<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<div class="page-header">
			<h1>
				User Settings <br> <small></small>
			</h1>
		</div>
		
		<?php 
		foreach ($modulesControllers as $controller){
			
			// add a link to the module settings
			?>
			<div>
				<div>
				<h2>
					<div class="col-md-10">
					<?= $this->clean($controller["module"])?> 
					</div>
					<div class="col-md-2">
					<button type="button" onclick="location.href='<?= $this->clean($controller["controller"]) ?>'" class="btn btn-primary" id="navlink">Edit</button>
					</div>
				</h2>	
				</div>
			</div>
			<?php 
		}
		?>
      
    </div>
</div>