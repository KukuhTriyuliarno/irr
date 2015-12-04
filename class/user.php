<?php
require_once "config/connect.php";
class User{
	//Proses Login
	public function getLogin($username,$password){
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

		if (empty($username) && empty($password)) {
			//kalau nama dan password kosong
			header('location:./?kesalahan=1');
			break;
		} else if (empty($username)) {
			//kalau nama saja yang kosong
			header('location:./?kesalahan=2');
			break;
		} else if (empty($password)) {
			//kalau nama saja yang kosong
			header('location:./?kesalahan=3');
			break;
		}
	
		$login = mysql_query("SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
		$ketemu = mysql_num_rows($login);
		$r = mysql_fetch_array($login);
		// Apabila username dan password ditemukan
		$_SESSION['level'] = $r['level'];
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		
		if (isset($_SESSION['level'])){
			if ($_SESSION['level'] == "admin"){
				header("location:./");
   			} else if ($_SESSION['level'] == "eksekutif"){
       			header("location:./");
       		}
		}	
		if (!isset($_SESSION['level'])){
			header('location:./?kesalahan=4');
		}
	}


	//Tampil Kesalahan login
	public function salah(){
		if (!empty($_GET['kesalahan'])) {
			?>
			<div class="error">
			<?php
			if ($_GET['kesalahan'] == 1) {
				echo '<a>Nama Pengguna dan Kata Sandi belum diisi</a>';
			} else if ($_GET['kesalahan'] == 2) {
				echo '<a>Nama Pengguna belum diisi</a>';
			} else if ($_GET['kesalahan'] == 3) {
				echo '<a>Kata Sandi belum diisi</a>';
			} else if ($_GET['kesalahan'] == 4) {
				echo '<a>Nama Pengguna dan Kata Sandi tidak terdaftar!</a>';
			} 
			?>
			</div>
			<?php
		}
		
	}

	
}
$User = new User();

?>