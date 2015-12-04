<link rel="stylesheet" href="css/data.css"  type="text/css" />
<h2>Data Investasi</h2>
<div id="flash">
<div class="clos"><a href="" title="close">x</a></div>
<div class="isinya">
<a>Berhasil Konfirmasi, Silahkan cek di Menu Investasi</a>
</div>
</div>
<hr />
<?php
include "config/connect.php";

$query = mysql_query("SELECT * FROM tbl_run_inv INNER JOIN tbl_user ON tbl_run_inv.id_user=tbl_user.id_user INNER JOIN tbl_inv ON tbl_run_inv.id_not=tbl_inv.id_inv WHERE tbl_inv.yn='y' AND tbl_run_inv.id_inv='0'  ORDER BY tbl_run_inv.id_run DESC");
$jumlah = mysql_num_rows($query);
//$id_user = $d['id_user'];
//$queri = mysql_query("SELECT * FROM tbl_inv WHERE id_user='$id_user'");
if (!empty($jumlah)){	
	while($d = mysql_fetch_array($query)){
?>

	<table border="0" cellpadding="5" cellspacing="0">
	<thead>
		<tr>
			<td>Investasi</td>
			<td>Bunga</td>
			<td>Diskonto 1</td>
			<td>Diskonto 2</td>
			<td>IRR</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="inves"><? echo 'Rp. '.$d['inves'];?></td>
			<td class="bung1"><? echo $d['bunga'].' &#37;';?></td>
			<td class="bung"><? echo $d['df1'].' &#37;';?></td>
			<td class="bung"><? echo $d['df2'].' &#37;';?></td>
			<td class="bung1"><? echo $d['irr'].' &#37;';?></td>
		</tr>
		<tr>
			<td colspan="5" class="sub-tabel">
				<table border="0" cellspacing="0">
				<tr class="per">
					<td class="per-contain">Periode</td>
					<td>:</td>
					<td><? echo $d['jml_periode'].' Tahun';?></td>
				</tr>
				<tr class="per">
					<td class="per-contain">Arus Kas (Rp.)</td>
					<td>:</td>
					<td><? echo $d['kas'];?></td>
				</tr>
				<tr class="per">
					<td class="per-contain">Rekomendasi</td>
					<td>:</td>
					<td><? echo $d['rekomen'];?></td>
				</tr>
				<tr class="per">
					<td class="per-contain">Pengguna</td>
					<td>:</td>
					<td><? echo $d['username'];?></td>
				</tr>
				<tr>
					<td colspan="3" class="bung2" align="center">
						<button><a href="admin/konfir.php/?not=<? echo $d['id_not'];?>&l=<? echo $d['jml_periode'];?>">Konfirmasi</a></button>
					</td>
				</tr>
				</table>
			</td>
		</tr>
	</tbody>
	</table>

<?php
	}
} else {
	die("TIDAK ADA PEMBERITAHUAN");
}
?>