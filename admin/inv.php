<link rel="stylesheet" href="css/data.css"  type="text/css" />
<h2>Investasi</h2>
<hr />
<?php
include "config/connect.php";
$res = $mysqli->query("SELECT * FROM tbl_run_inv INNER JOIN tbl_inv ON tbl_inv.id_inv=tbl_run_inv.id_inv INNER JOIN tbl_user ON tbl_user.id_user=tbl_run_inv.id_user");
$jumlah = $res->num_rows;
if (!empty($jumlah)){	
	while($data = $res->fetch_assoc()){
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
			<td class="inves"><? echo 'Rp. '.$data['inves'];?></td>
			<td class="bung1"><? echo $data['bunga'].' &#37;';?></td>
			<td class="bung"><? echo $data['df1'].' &#37;';?></td>
			<td class="bung"><? echo $data['df2'].' &#37;';?></td>
			<td class="bung1"><? echo $data['irr'].' &#37;';?></td>
		</tr>
		<tr>
			<td colspan="5" class="sub-tabel">
				<table border="0" cellspacing="0">
				<tr class="per">
					<td class="per-contain">Periode</td>
					<td>:</td>
					<td><? echo $data['jml_periode'].' Tahun';?></td>
				</tr>
				<tr class="per">
					<td class="per-contain">Arus Kas (Rp.)</td>
					<td>:</td>
					<td><? echo $data['kas'];?></td>
				</tr>
				<tr class="per">
					<td class="per-contain">Rekomendasi</td>
					<td>:</td>
					<td><? echo $data['rekomen'];?></td>
				</tr>
				<tr class="per">
					<td class="per-contain">Pengguna</td>
					<td>:</td>
					<td><? echo $data['username'];?></td>
				</tr>
				<tr>
					<td colspan="3" class="bung2" align="center">
						<p>Berjalan</p>
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
	die("TIDAK ADA DATA INVESTASI YANG BERJALAN");
}
?>
