<link rel="stylesheet" href="css/data.css"  type="text/css" />

<h2>Investasi</h2>
<hr />
<?php
include "config/connect.php";
$username = $_SESSION['username'];
$res = $mysqli->query("SELECT id_user FROM tbl_user WHERE username='$username'");
$data = $res->fetch_assoc();
$id_user = $data['id_user'];

$result = $mysqli->query("SELECT * FROM tbl_run_inv INNER JOIN tbl_inv ON tbl_inv.id_inv=tbl_run_inv.id_inv WHERE tbl_run_inv.id_user='$id_user' AND tbl_inv.id_inv=tbl_run_inv.id_inv ORDER BY tbl_run_inv.id_run DESC");
$jumlah = $result->num_rows;
if (!empty($jumlah)){	
	while($d = $result->fetch_assoc()){
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
				<tr class="per" >
					<td class="per-contain">Status</td>
					<td>:</td>
					<td>Berjalan</td>
				</tr>
				<tr>
					<td colspan="3" class="bung2" align="center">
						<button><a href="eksekutif/unduh.php?q=<?php echo $d['id_inv'];?>" target="_blank">Unduh</a></button>
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
	die("TIDAK ADA INVESTASI YANG BERJALAN");
}
?>
