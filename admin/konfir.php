<?php
require_once "../class/admin.php";
$id_inv = $_GET['not'];
$periode = $_GET['l'];
$tgl_start = date("Y-m-d");
$tambah = mktime(0,0,0,date('m'),date('d'),date('Y')+$periode);
$tgl_finish = date("Y-m-d",$tambah);
$Admin->Konfirmasi($id_inv,$tgl_start,$tgl_finish);
?>