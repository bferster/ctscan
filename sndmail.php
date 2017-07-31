<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); 
header('Expires: Sun, 01 Jul 2005 00:00:00 GMT'); 
header('Pragma: no-cache'); 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
	
	if ($_REQUEST['id'] != "1936")
		exit();	
	$email=$_REQUEST['email'];									
	$subject=$_REQUEST['subject'];	
	$body=$_REQUEST['body'];									
	ini_set("sendmail_from",$email);								// Close
	mail($email,$subject,$body,"From: $email\nReply-To: $email\n");	// Mail it
?>
	
