<link rel="stylesheet" href="css/data.css"  type="text/css" />

<h2>Pemberitahuan</h2>
<hr />
<?php
$username = $_SESSION['username'];
$query = mysql_query("SELECT * FROM tbl_user WHERE username='$username'");
$data = mysql_fetch_array($query);
$id_user = $data['id_user'];

$query = mysql_query("SELECT * FROM tbl_run_inv INNER JOIN tbl_inv ON tbl_run_inv.id_not=tbl_inv.id_inv WHERE tbl_inv.yn='y' AND tbl_run_inv.id_user='$id_user' AND tbl_run_inv.id_inv='0' ORDER BY tbl_run_inv.id_run DESC");
$jumlah = mysql_num_rows($query);
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
				<tr>
					<td colspan="3" class="bung2" align="center">
						<div id="tunggu"><p>Menunggu</p></div>
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