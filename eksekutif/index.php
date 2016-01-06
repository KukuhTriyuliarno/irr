<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/dashboard.css"  type="text/css" />
	<link rel="stylesheet" href="css/pop.css" type="text/css" />
	<link rel="stylesheet" href="css/tootip.css"  type="text/css" />
	<link rel="shortcut icon" href="./img/icon.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
include "config/connect.php";
$username = $_SESSION['username'];
$res = $mysqli->query("SELECT * FROM tbl_user WHERE username='$username'");
$data = $res->fetch_assoc();
?>

<div class="header">
	<img class="logo" src="img/logo.png">
	<div class="user">
	<a href="#popup"><?php echo $data['username'];?></a>
	</div>
<div class="panel">
	<ul>
	<a href="./" ><li><img src="img/beranda1.png"></li></a>
	<a href="?page=dat"><li><img src="img/data1.png"></a></li>
	<a href="?page=inv"><li><img src="img/investasi1.png"></a></li>
	<a href="?page=notif"><li><img src="img/notif1.png"></li>
	<a href="login/logout.php"><li><img src="img/keluar1.png"></a></li>
</ul>
</div>
</div>

<div class="menu">
<ul>
	<a href="./" ><li><img src="img/beranda.png"><br/>Beranda</li></a>
	<a href="?page=dat"><li><img src="img/data.png"><br/>Data Investasi</a></li>
	<a href="?page=inv"><li><img src="img/investasi.png"><br/>Investasi</a></li>
	<a href="?page=notif"><li><img src="img/notif.png"><br/>Pemberitahuan</a></li>
	<a href="login/logout.php"><li><img src="img/keluar.png"><br/>Keluar</a></li>
</ul>
</div>

	<div id="popup">
			<div class="window">
			<div class="close">
				<div class="close-button"><a href=""  title="Close">x</a></div>
				</div>
				<table border="0" cellpadding="5" cellspacing="0">
					<tr>
						<td class="td">Nama Pengguna</td>
						<td>:</td>
						<td><?php echo $data['username'];?></td>
					</tr>
					<tr>
						<td class="td">Nama Lengkap</td>
						<td>:</td>
						<td><?php echo $data['fname'].''.$data['lname'];?></td>
					</tr>
					<tr>
						<td class="td">Email</td>
						<td>:</td>
						<td><?php echo $data['email'];?></td>
					</tr>
					<tr>
						<td class="td">Telepon/HP</td>
						<td>:</td>
						<td><?php echo $data['phone'];?></td>
					</tr>
					<tr>
						<td class="td">Facebook</td>
						<td>:</td>
						<td><?php echo $data['fb'];?></td>
					</tr>
				</table>
			</div>
		</div>


<div class="container">
<?php
$page	= isset($_GET['page']) ? $_GET['page'] : "";		
if($page=="") {
	include "welcome.php";
} else if($page=="dat") {
	include "data.php";
} else if($page=="inv") {
	include "inv.php";
} else if($page=="notif") {
	include "notif.php";
}
?>
</div>
</body>
</html>