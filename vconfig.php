<?php

// configuration file for CTScan

$dbname = 'ctscan';
$dbuser = 'ctview';
$dbpass = '';
$link = mysqli_connect("localhost", $dbuser, $dbpass, $dbname) or die ("Could not connect to server.");
?>
