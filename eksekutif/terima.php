<?php
include "../config/connect.php";

$id_inv = $_GET['p'];
$id_user = $_GET['u'];

$res = $mysqli->query("UPDATE tbl_inv SET yn='y' WHERE id_inv='$id_inv'");
$resu = $mysqli->query("INSERT INTO tbl_run_inv VALUES ('','','$id_inv','$id_user','','')");

if($res && $resu){
	header("location:../../?page=dat#flash");
}
?>