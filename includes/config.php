<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','platinu2_bb');
define('DB_PASS','platinu2_bb');
define('DB_NAME','platinu2_bb');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
