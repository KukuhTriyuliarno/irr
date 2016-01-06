<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dss";
$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno){
	echo "failed".
	$mysqli->connect_error;
}
?>