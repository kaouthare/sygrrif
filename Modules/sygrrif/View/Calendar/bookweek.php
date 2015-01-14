<?php $this->title = "SyGRRiF Booking"?>

<?php echo $navBar?>
<?php 
require_once 'Modules/sygrrif/Model/SyBookingSettings.php';
require_once 'Modules/sygrrif/View/Calendar/bookfunction.php'
?>

<head>

<style>
#tcell{
	border-left: 1px solid #f1f1f1;
	border-right: 1px solid #f1f1f1;
	border-bottom: 1px solid #f1f1f1;
}

#tcelltop{
	border: 1px solid #f1f1f1;
}

#colDiv{
	padding:0;
    margin:0;
}

#colDivleft{
	padding-right:0px;
	margin-right:0px;
}

#colDivright{
	padding-left:0px;
	margin-left:0px;
}


#tcellResa{
	-moz-border-radius: 9px;
	border-radius: 9px;
	border: 1px solid #f1f1f1;
}

@media (min-width: 1200px) {
  .seven-cols .col-md-1,
  .seven-cols .col-sm-1,
  .seven-cols .col-lg-1 {
    width: 14.285714285714285714285714285714%;
    *width: 14.285714285714285714285714285714%;
  }
}
/* 14% = 100% (full-width row) divided by 7 */

img{
  max-width: 100%;
}

</style>
</head>

<?php include "Modules/sygrrif/View/bookingnavbar.php"; ?>




<!-- Add the table title -->
<br></br>
<div class="col-lg-12">
<div class="col-lg-10 col-lg-offset-1">
	<?php if ($message != ""): 
		if (strpos($message, "Error") === false){?>
			<div class="alert alert-success text-center">	
		<?php 
		}
		else{
		?>
		 	<div class="alert alert-danger text-center">
		<?php 
		}
	?>
    	<p><?= $message ?></p>
    	</div>
	<?php endif; ?>

</div>
</div>

<div class="col-lg-12">

<?php include "Modules/sygrrif/View/colorcodenavbar.php"; ?>
<div class="col-lg-10">

<div class="col-lg-12">

<div class="col-md-8 text-left">
<button type="submit" class="btn btn-default" onclick="location.href='calendar/bookweek/dayweekbefore'"><</button>
<button type="submit" class="btn btn-default" onclick="location.href='calendar/bookweek/dayweekafter'">></button>
<button type="submit" class="btn btn-default" onclick="location.href='calendar/bookweek/thisWeek'">This week</button>
<?php 
$d = explode("-", $mondayDate);
$time = mktime(0,0,0,$d[1],$d[2],$d[0]);
$dayStream = date("l", $time);
$monthStream = date("F", $time);
$dayNumStream = date("d", $time);
$yearStream = date("Y", $time);
$sufixStream = date("S", $time);

?>
<b><?php echo $dayStream . ", " . $monthStream . " " .$dayNumStream. $sufixStream . " " .$yearStream  ?>  -  </b>
<?php 
$d = explode("-", $sundayDate);
$time = mktime(0,0,0,$d[1],$d[2],$d[0]);
$dayStream = date("l", $time);
$monthStream = date("F", $time);
$dayNumStream = date("d", $time);
$yearStream = date("Y", $time);
$sufixStream = date("S", $time);

?>
<b><?php echo $dayStream . ", " . $monthStream . " " .$dayNumStream. $sufixStream . " " .$yearStream  ?> </b>

</div>


<div class="col-md-4 text-right">
<button type="button" onclick="location.href='calendar/book'" class="btn btn-default">Day</button>
<button type="button" class="btn btn-default active">Week</button>

</div>
</div>

<br></br>

<?php 
$day_begin = $this->clean($resourceInfo['day_begin']);
$day_end = $this->clean($resourceInfo['day_end']);
$size_bloc_resa = $this->clean($resourceInfo['size_bloc_resa']);
?>

<!-- hours column -->
<div class="col-xs-12">
<div class="col-xs-1" id="colDiv">

	<div id="tcelltop" style="height: 100px;"></div> <!-- For the resource title space -->
	
	<?php 
	// Hours
	for ($h = $day_begin ; $h < $day_end ; $h++){
		$heightCol = "0px";
		if ($size_bloc_resa == 900){
			$heightCol = "100px";
		}
		else if($size_bloc_resa == 1800){
			$heightCol = "50px";
		}
		else if($size_bloc_resa == 3600){
			$heightCol = "50px";
		}
		?>
	
		<div id="tcell" style="height: <?= $heightCol ?>;">
		<?=$h?>:00
		</div>
	<?php 	
	}
	?>	
</div>	
	
<!-- hours reservation -->
<div class="col-xs-11" id="colDiv">

	<div id="tcelltop" style="height: 50px;">
	<p class="text-center"><b><?= $this->clean($resourceBase['name']) ?></b></br><?= $this->clean($resourceBase['description']) ?></p>
	</div>

	
	<div class="row seven-cols">
	
	<?php 
	for ($d = 0 ; $d < 7 ; $d++){
		
		$idcss = "colDiv";
		if ($d == 0){
			$idcss = "colDivleft";
		}
		if ($d == 6){
			$idcss = "colDivright";
		}
		
		// day title
		
		$temp = explode("-", $mondayDate);
		$date_unix = mktime(0,0,0,$temp[1], $temp[2]+$d, $temp[0]);
		$dayStream = date("l", $date_unix);
		$monthStream = date("M", $date_unix);
		$dayNumStream = date("d", $date_unix);
		$sufixStream = date("S", $date_unix);
		
		$dayTitle = $dayStream . " " . $monthStream . ". " . $dayNumStream . $sufixStream;
		
		?>
		
		
		<div class="col-lg-1 col-md-3 col-sm-4 col-xs-6" id="<?= $idcss ?>">
		
		<div id="tcelltop" style="height: 50px;">
		<p class="text-center"><b> <?= $dayTitle ?> </p>
		</div>
		
		<?php 
		//$temp = explode("-", $mondayDate);
		//$date_unix = mktime(0,0,0,$temp[1], $temp[2]+$d, $temp[0]);
		bookday($size_bloc_resa, $date_unix, $day_begin, $day_end, $calEntries, $isUserAuthorizedToBook);
		?>
		
		</div>
			<?php 
		
	}
	
	?>
	</div>
	
</div>

</div>
</div>

</div>
<?php if (isset($msgError)): ?>
<p><?= $msgError ?></p>
<?php endif; ?>