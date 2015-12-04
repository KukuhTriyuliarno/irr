<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/dashboard.css"  type="text/css" />
	<link rel="stylesheet" href="css/flash.css"  type="text/css" />
	<link rel="shortcut icon" href="./img/icon.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="header">
	<img class="logo" src="img/logo.png">
	<div class="user">
	<a href=""><?php echo $_SESSION['username'];?></a>
	</div>
<div class="panel">
	<ul>
	<a href="./" ><li><img src="img/beranda1.png"></li></a>
	<a href="?page=dss"><li><img src="img/hitung1.png"></a></li>
	<a href="?page=kkh"><li><img src="img/data1.png"></a></li>
	<a href="?page=inv"><li><img src="img/investasi1.png"></li>
	<a href="?page=notif"><li><img src="img/notif1.png"></a></li>
	<a href="login/logout.php"><li><img src="img/keluar1.png"></a></li>
</ul>
</div>
</div>
<div class="menu">
<ul>
	<a href="./" ><li><img src="img/beranda.png"><br/>Beranda</li></a>
	<a href="?page=dss"><li><img src="img/hitung.png"><br/>Hitung IRR</a></li>
	<a href="?page=kkh"><li><img src="img/data.png"><br/>Data Investasi</a></li>
	<a href="?page=inv"><li><img src="img/investasi.png"><br/>Investasi</a></li>
	<a href="?page=notif"><li><img src="img/notif.png"><br/>Pemberitahuan</a></li>
	<a href="login/logout.php"><li><img src="img/keluar.png"><br/>Keluar</a></li>
</ul>
</div>
<div class="container">
<?php
$page	= isset($_GET['page']) ? $_GET['page'] : "";		
if($page=="") {
	include "welcome.php";
} else if($page=="kkh") {
	include "data.php";
} else if($page=="dss") {
	include "irr.php";
} else if($page=="notif") {
	include "notif.php";
} else if($page=="inv") {
	include "inv.php";
}
?>
</body>
</html>