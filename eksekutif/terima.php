<?php
include "../config/connect.php";

$id_inv = $_GET['p'];
$id_user = $_GET['u'];

$query = mysql_query("UPDATE tbl_inv SET yn='y' WHERE id_inv='$id_inv'");
$queri = mysql_query("INSERT INTO tbl_run_inv VALUES ('','','$id_inv','$id_user','','')");

if($query){
	header("location:../../?page=dat#flash");
}
?>