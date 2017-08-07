<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); 
header('Expires: Sun, 01 Jul 2005 00:00:00 GMT'); 
header('Pragma: no-cache'); 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
require_once('config.php');
			
	$ver=0;														// Version number									
	$teacherId=$_REQUEST['teacherId'];							// Get data					
	$obs=$_REQUEST['obs'];									
	$email=$_REQUEST['email'];									
	$grade=$_REQUEST['grade'];									
	$subject=$_REQUEST['subject'];									
	$numStudents=$_REQUEST['numStudents'];									
	$date=$_REQUEST['date'];									
	$block=$_REQUEST['block'];									
	$setting=$_REQUEST['setting'];									
	$level=$_REQUEST['level'];									
	$video=$_REQUEST['video'];									
	$remind=$_REQUEST['remind'];									
	$research=$_REQUEST['research'];									
	$template=$_REQUEST['template'];									
	$events=$_REQUEST['events'];									
	$stats=$_REQUEST['stats'];									
	$password=$_REQUEST['password'];									


	$query="INSERT INTO sessions (teacherId, obs, email, grade, subject, numStudents, date, block, setting, level, video, remind, research, template, events, password, stats, ver) VALUES ('";
		$query.=addEscapes($link,$teacherId)."','";
		$query.=addEscapes($link,$obs)."','";
		$query.=addEscapes($link,$email)."','";
		$query.=addEscapes($link,$grade)."','";
		$query.=addEscapes($link,$subject)."','";
		$query.=addEscapes($link,$numStudents)."','";
		$query.=addEscapes($link,$date)."','";
		$query.=addEscapes($link,$block)."','";
		$query.=addEscapes($link,$setting)."','";
		$query.=addEscapes($link,$level)."','";
		$query.=addEscapes($link,$video)."','";
		$query.=addEscapes($link,$remind)."','";
		$query.=addEscapes($link,$research)."','";
		$query.=addEscapes($link,$template)."','";
		$query.=addEscapes($link,$events)."','";
		$query.=addEscapes($link,$password)."','";
		$query.=addEscapes($link,$stats)."','";
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
	
