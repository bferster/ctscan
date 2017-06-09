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
		$query.=addEscapes($link,$obsId)."','";
		$query.=addEscapes($link,$time)."','";
		$query.=addEscapes($link,$d1)."','";
		$query.=addEscapes($link,$d2)."','";
		$query.=addEscapes($link,$d3)."','";
		$query.=addEscapes($link,$d4)."','";
		$query.=addEscapes($link,$d5)."','";
		$query.=addEscapes($link,$ver)."')";
		$result=mysqli_query($link,$query);						// Add row
		if ($result == false)									// Bad save
			print(mysqli_error($link));							// Show error 
		else
			print(mysqli_insert_id($link)."\n");				// Return ID of new resource
	
	function addEscapes($link, $str)						// ESCAPE ENTRIES
	{
		if (!$str)												// If nothing
			return $str;										// Quit
		$str=mysqli_real_escape_string($link,$str);				// Add slashes
		$str=str_replace("\r","",$str);							// No crs
		return $str;
	}

	mysqli_close($link);										// Close session
?>
	
