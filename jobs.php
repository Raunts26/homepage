<?php
	//Lehe nimi
	$page_title = "Tööpakkumised";
	//Faili nimi
	$page_file = "jobs.php";
?>
<?php
	require_once("header.php"); 
	require_once ("functions.php");
?>
<?php

	if(isset($_SESSION['logged_in_user_id'])) {
		if($_SESSION['logged_in_user_group'] == 3) {
			if(isset($_GET["delete"])) {
				$Job->deleteJobData($_GET["delete"]);
			}
			if(isset($_GET["update"])) {
				$Job->updateJobData($_GET["job_id"], $_GET["job_name"], $_GET["job_desc"], $_GET["job_company"], $_GET["job_county"], $_GET["job_parish"], $_GET["job_location"], $_GET["job_address"]);
			}
		}
	}
	if(isset($_GET["view"])) {
		$Job->singleJobData($_GET["view"]);
		$singleJob = $Job->singleJobData($_GET["view"]);
	}


	//kõik tööd objektide kujul massiivis
	$job_array = $Job->getAllData();


	
	$keyword = "";
	if (isset($_GET["keyword"])) {
		$keyword = cleanInput($_GET["keyword"]);
	
		//otsime
		$job_array = $Job->getAllData($keyword);
	} else {
		//Naitame koiki tulemus
		$job_array = $Job->getAllData();
	}
?>
<!-- Modal -->
<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script>

<div class="col-xs-12 col-sm-2 text-center">
	<h4 style="padding-bottom: 30px">FILTER</h4>
	<ul class="nav nav-pills nav-stacked">
		<h4 style="padding-bottom: 30px">Vald</h5>
		<?php
			$job_parish_array = filterParish();
			for($i = 0; $i < count($job_parish_array); $i++) {
				echo "<a href='?keyword=".$job_parish_array[$i]->parish."'>".$job_parish_array[$i]->parish." (".$job_parish_array[$i]->parish_count.")</a><br>";
		}
		?>
		<h4 style="padding-bottom: 30px">Asula</h5>
		<?php
				$job_location_array = filterLocation();
				for($i = 0; $i < count($job_location_array); $i++) {
					echo "<a href='?keyword=".$job_location_array[$i]->location."'>".$job_location_array[$i]->location." (".$job_location_array[$i]->location_count.")</a><br>";
				}
		?>
	</ul>
	<div class="col-xs-12 col-sm-1">
	</div>
</div>

<!--modal-->

<!--<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>-->

<div class="col-xs-12 col-sm-10">
	<form action="jobs.php" method="get" class="col-xs-12 col-sm-12">
		<div class="input-group">
		<input name="keyword" type="text" class="form-control" placeholder="Otsi..." value="<?=$keyword?>">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit" value="otsi">Otsi!</button>
		</span>
		</div>
	</form>
	<div class="col-xs-12 col-sm-12">
	<br>
	
		<div class="list-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php


			for($i = 0; $i < count($job_array); $i++) {
				echo '<div role="tab" id="headingOne" id=headingOne>';
					#echo "<form action='jobs.php' >";
					echo '<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="list-group-item">'.$job_array[$i]->id;
					echo "<h4 class='list-group-item-heading'>".$job_array[$i]->name."</h4>";
					echo "</a>";
					echo '</div>';
					
					echo '<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">';
					echo '<div class="list-group">';
					echo "<p class='list-group-item-text'>".$job_array[$i]->company.", ".$job_array[$i]->county.", ".$job_array[$i]->parish."</p>";
					echo '</div>';
					echo '</div>';
					#echo "</form>";
					
			}
		
			?>
		</div>

	
	</div>
</div>
<?php require_once("footer.php"); ?>