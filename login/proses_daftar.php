<?php
include "../config/connect.php";
$email = $_POST['email'];
$username = $_POST['username'];
$password = SHA1($_POST['password']);
$twitter = $_POST['twitter'];
$fb = $_POST['facebook'];
$phone = $_POST['phone'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];

$query = mysql_query("INSERT INTO tbl_user VALUES ('','$username','$password','$fname','$lname','$address','$email','$phone','$fb','$twitter','eksekutif')");
if ($query){
	header("location:../");
}
?>