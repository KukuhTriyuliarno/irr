<?php
class index{
	public function lvl(){
		if (isset($_SESSION['username'])){
			if ($_SESSION['level'] == "admin"){
				include "admin/index.php";
			} else if ($_SESSION['level'] == "eksekutif"){
				include "eksekutif/index.php";
			} 
		} else {
			include "login/index.php";
		}
	}
	
}
?>