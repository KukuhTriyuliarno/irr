<link rel="stylesheet" href="css/data.css"  type="text/css" />
<link rel="stylesheet" href="css/flash.css"  type="text/css" />
<h2>Data Investasi</h2>

<div id="flash">
<div class="clos"><a href="" title="close">x</a></div>
<div class="isinya">
<a>Berhasil Terima, Silahkan Menunggu Pemberitahuan dari Admin 1 x 24 Jam</a>
</div>
</div>

<hr />
<?php
include "config/connect.php";
$res = $mysqli->query("SELECT * FROM tbl_inv WHERE yn='n' ORDER BY id_inv DESC");
$jumlah = $res->num_rows;
if (!empty($jumlah)){	
	while($d = $res->fetch_assoc()){
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
						<button><a href="eksekutif/terima.php/?p=<? echo $d['id_inv'];?>&u=<? echo $data['id_user'];?>">Terima</a></button>
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
	die("TIDAK ADA DATA INVESTASI");
}
?>