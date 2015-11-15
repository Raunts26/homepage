<?php
	//Lehe nimi
	$page_title = "Sisesta";
	//Faili nimi
	$page_file = "insert.php";
	require_once("header.php");
	require_once("functions.php");
?>
<?php
	$job_county = $job_parish = $job_location = "";
	$job_county_error = $job_parish_error = $job_location_error = "";
	$response = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        
		if(isset($_POST["add_location"])){
			if (empty($_POST["job_county"])) {
				$job_county_error = "Maakond on kohustuslik";
			} else {
				$job_county = cleanInput($_POST["job_county"]);
			}
			
			if (empty($_POST["job_parish"])) {
				$job_parish_error = "Vald on kohustuslik";
			} else {
				$job_parish = cleanInput($_POST["job_parish"]);
			}
			
			if (empty($_POST["job_location"])) {
				$job_location_error = "Asula on kohustuslik";
			} else {
				$job_location = cleanInput($_POST["job_location"]);
			}
			
			if ($job_county_error == "" && $job_parish_error == "" && $job_location_error == "") {
				$response = $Insert->insertLocation($job_county, $job_parish, $job_location);
			}
			
      if (isset($response->success)) {
				$job_location = "";
			} 
			
		}
	}
	
	
	
?>


<h1>Lisa asula</h1>
<form class="col-xs-12 col-md-12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <?php if(isset($response->success)): ?>

  <p class="col-sm-12 col-md-12" style="color:green;">
	<?=$response->success->message;?>
  </p>
  
  <?php elseif(isset($response->error)): ?>
  
  <p class="col-sm-12 col-md-12" style="color:red;">
	<?=$response->error->message;?>
  </p>
   
  <?php endif; ?>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label for="job_county"> Maakond </label>
			<?=$Job->countyDropdown();?>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label for="job_parish"> Vald </label>
			<?=$Job->parishDropdown();?>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label for="job_location"> Asula </label>
			<input id="job_location" class="form-control" name="job_location" type="text" value="<?=$job_location;?>"> <?=$job_location_error;?>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label for="add_location">Lisa</label>
			<input type="submit" class="btn btn-success btn-block" name="add_location" value="Lisa">
		</div>	
	</div>
</form>


<?php
	require_once("footer.php");
?>