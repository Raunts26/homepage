<?php
class Insert {
	private $connection;
	
	function __construct($mysqli){
        $this->connection = ($mysqli);
    }
	
	function insertLocation($job_county, $job_parish, $job_location) {
		
		$response = new StdClass();
	
        $stmt = $this->connection->prepare("INSERT INTO job_location (county, parish, location) VALUES (?,?,?)");
        $stmt->bind_param("sss", $job_county, $job_parish, $job_location);
        
		if($stmt->execute()) {
			$success = new StdClass();
			$success->id = 0;
			$success->message = "Asula on edukalt sisestatud!";
			$response->success = $success;
			
			return $response;
		}
		
        $stmt->close();
        
        

    }
	
	
}
?>