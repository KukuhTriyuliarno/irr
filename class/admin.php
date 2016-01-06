<?php

	class Admin{
		public function Save_calc($investasi,$tk_bunga,$diskon1,$diskon2,$irr,$period,$cash,$rekomendasi){
			include "../config/connect.php";
			$p=count($period);
			$per=implode(' >> ',$period);
			$ca=implode(' >> ',$cash);
			$res = $mysqli->query("INSERT INTO tbl_inv  VALUES ('','$investasi','$tk_bunga','$diskon1','$diskon2','$irr','$per','$ca','$p','$rekomendasi','n') ");
			if ($res){
				header('Location:../?page=dss#flash');
			} else {
				header('Location:../');
			}
		}

		public function Delete($id_inv){
			include "../config/connect.php";
			$res = $mysqli->query("DELETE FROM tbl_inv WHERE id_inv='$id_inv'");
			if ($res){
				header("location:../../?page=kkh#flash");
			}
		}

		public function Konfirmasi($id_inv,$tgl_start,$tgl_finish){
			include "../config/connect.php";
			$res = $mysqli->query("UPDATE tbl_run_inv SET id_inv='$id_inv', tgl_start='$tgl_start', tgl_finish='$tgl_finish' WHERE id_not='$id_inv'");
			if($res){
				header("location:../../?page=notif#flash");
			}
		}

	}

$Admin = new Admin();

?>