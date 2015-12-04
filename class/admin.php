<?php
include "../config/connect.php";

	class Admin{
		public function Save_calc($investasi,$tk_bunga,$diskon1,$diskon2,$irr,$period,$cash,$rekomendasi){
			$p=count($period);
			$per=implode(' >> ',$period);
			$ca=implode(' >> ',$cash);
			$query = "INSERT INTO tbl_inv  VALUES ('','$investasi','$tk_bunga','$diskon1','$diskon2','$irr','$per','$ca','$p','$rekomendasi','n') ";
			$q=mysql_query($query);
			if ($q){
				header('Location:../?page=dss#flash');
			} else {
				header('Location:../');
			}
		}

		public function Delete($id_inv){
			$queri = mysql_query("DELETE FROM tbl_inv WHERE id_inv='$id_inv'");
			if ($queri){
				header("location:../../?page=kkh#flash");
			}
		}

		public function Konfirmasi($id_inv,$tgl_start,$tgl_finish){
			$query = mysql_query("UPDATE tbl_run_inv SET id_inv='$id_inv', tgl_start='$tgl_start', tgl_finish='$tgl_finish' WHERE id_not='$id_inv'");
			if($query){
				header("location:../../?page=notif#flash");
			}
		}

	}

$Admin = new Admin();

?>