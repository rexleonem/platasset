<?php
session_start();

// Define database
define('dbhost', 'localhost');
define('dbuser', 'platinu2_bb');
define('dbpass', 'platinu2_bb');
define('dbname', 'platinu2_bb');

// Connecting database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

?>