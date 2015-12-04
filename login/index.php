<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	require_once "class/user.php";
	$username = $_POST['username'];
	$password = SHA1($_POST['password']);
	$User->getLogin($username,$password);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/login.css" media="screen" type="text/css" />
	<link rel="shortcut icon" href="./img/icon.ico"/>
</head>
<body>
<div class="body">
	<div class="header">
		<img class="logo" src="img/logo.png">
	</div>
	<div class="masuk">
    	<h2>Masuk</h2>
    	<table>
    	<form name="login" action="" method="POST">
  			<tr>
    			<td><input type="text" placeholder="Nama Pengguna" name="username" /></td>
			</tr>
			<tr>
				<td><input type="password" placeholder="Kata Sandi" name="password" /></td>
			</tr>
			<tr>
    			<td><input type="submit" name="submit" value="Masuk" /></td>
			</tr>
  		</form>
 		</table>
 	</div>
 	<div class="daftar" >
 		<a>Butuh Akun? </a>
 		<a href="login/daftar.php">Daftar</a>
 	</div>
</div>
 
<?php 
	require_once "class/user.php";
	$User->salah();
?> 

<div class="footer">
	<p>Copyright @2015</p>
	<a>Depeloper By</a><br/>
	<a>Kukuh Triyuliarno Hidayat</a><br/>
	
</div>
</body>
</html>

		
