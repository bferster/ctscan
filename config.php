<?php

// configuration file for CTScan

$dbms = 'mysql';
$dbhost = 'localhost';
$dbname = 'ctscan';
$dbuser = 'ctscan';
$dbpasswd = 'MKctscan2017';
$connection = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Could not connect to server.");
$dc = mysql_select_db($dbname,$connection) or die ("Couldn't select database.");
?>