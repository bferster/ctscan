<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); 
header('Expires: Sun, 01 Jul 2005 00:00:00 GMT'); 
header('Pragma: no-cache'); 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
require_once('vconfig.php');

$q=mysqli_real_escape_string($link,$_GET['q']);			// Get q
$q=str_replace("~","'","$q");							// Turn ~ into '
$query="SELECT * FROM events WHERE ".$q; 				// Make query string
if (strstr($q,"SELECT"))								// If already has a SELECT
	$query=$q;											// Use it whole
$result=mysqli_query($link, $query);					// Run query

if ($result == false)									// Bad query
	print(mysqli_error($link));							// Show error 
else{													// Good query
  	while ($row=$result->fetch_array(MYSQL_ASSOC)) 		// Get data
        $myArray[]=$row;								// Add to array
    if ($myArray)										// If valid
		echo json_encode($myArray);						// Save as JSON
	mysqli_free_result($result);						// Free
 	}

mysqli_close($link);									// Close session
?>
