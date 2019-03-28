<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); 
header('Expires: Sun, 01 Jul 2005 00:00:00 GMT'); 
header('Pragma: no-cache'); 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
require_once('vconfig.php');

	$e=false;												// Assume getting events
	$q=mysqli_real_escape_string($link,$_GET['q']);			// Get q
	if (isSet($_GET['e'])) 									// If variable set
		$e=true;											// Don't load them
	$q=str_replace("~","'","$q");							// Turn ~ into '
	$query="SELECT * FROM sessions WHERE ".$q; 				// Make query string
	if (strstr($q,"SELECT"))								// If already has a SELECT
		$query=$q;											// Use it whole
	$result=mysqli_query($link, $query);					// Run query
	$myArray=array();										// Array to hold results
	if ($result == false)									// Bad query
		print(mysqli_error($link));							// Show error 
	else{													// Good query
		while ($row=$result->fetch_array(MYSQL_ASSOC)) {	// Get data
			if ($e)											// If hiding events
				$row["events"]=[];							// Empty array
			$myArray[]=$row;								// Add row to array	
			}
		echo json_encode($myArray);							// Save as JSON
		mysqli_free_result($result);						// Free
		}
	mysqli_close($link);									// Close session
?>



