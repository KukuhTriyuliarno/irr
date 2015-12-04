<?php
require_once "../class/admin.php";
$id_inv = $_GET['del'];
$Admin->Delete($id_inv);

?>