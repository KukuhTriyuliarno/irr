<?php

require_once "../class/admin.php";
$investasi = $_POST['investasi'];
$tk_bunga = $_POST['tk_bunga'];
$diskon1 = $_POST['diskon1'];
$diskon2 = $_POST['diskon2'];
$irr = $_POST['irr'];
$period = $_POST['period'];
$cash = $_POST['cash'];
$rekomendasi = $_POST['rekomendasi'];
$Admin->Save_calc($investasi,$tk_bunga,$diskon1,$diskon2,$irr,$period,$cash,$rekomendasi);

?>

