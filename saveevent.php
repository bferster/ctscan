<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); 
header('Expires: Sun, 01 Jul 2005 00:00:00 GMT'); 
header('Pragma: no-cache'); 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
require_once('config.php');
			
	$ver=0;														// Version number									
	$obsId=$_REQUEST['obsId'];									// Get obsId
	$time=$_REQUEST['time'];									// Get time
	$d1=$_REQUEST['d1'];										// Get data
	$d2=$_REQUEST['d2'];										// Get data
	$d3=$_REQUEST['d3'];										// Get data
	$d4=$_REQUEST['d4'];										// Get data
	$d5=$_REQUEST['d5'];										// Get data
		
	$query="INSERT INTO events (obsId, time, d1, d2, d3, d4, d5, ver) VALUES ('";
		$query.=addEscapes($obsId)."','";
		$query.=addEscapes($time)."','";
		$query.=addEscapes($d1)."','";
		$query.=addEscapes($d2)."','";
		$query.=addEscapes($d3)."','";
		$query.=addEscapes($d4)."','";
		$query.=addEscapes($d5)."','";
		$query.=addEscapes($ver)."')";
		$result=mysql_query($query);							// Add row
		if ($result == false)									// Bad save
			print(mysql_error($connection));										// Show error 
		else
			print(mysql_insert_id()."\n");						// Return ID of new resource

		mysql_close();											// Close session

	
	function addEscapes($str)									// ESCAPE ENTRIES
	{
		if (!$str)												// If nothing
			return $str;										// Quit
		$str=mysql_real_escape_string($str);					// Add slashes
		$str=str_replace("\r","",$str);							// No crs
		return $str;
	}

?>
	
