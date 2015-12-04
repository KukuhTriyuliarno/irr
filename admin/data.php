<link rel="stylesheet" href="css/data.css"  type="text/css" />

<script type="text/javascript" language="javascript">
	function konfirmasi(){
		tanya = window.confirm("Yakin Ingin di Hapus");
		if (tanya == true) 
			return true;
		else 
			return false;
	}
</script>
<h2>Data Investasi</h2>
<div id="flash">
<div class="clos"><a href="" title="close">x</a></div>
<div class="isinya">
<a>Berhasil Hapus, Semoga tidak ada Penyesalan</a>
</div>
</div>

<hr />
<?php
include "config/connect.php";

$query = mysql_query("SELECT * FROM tbl_inv WHERE yn='n' ORDER BY id_inv DESC");
$jumlah = mysql_num_rows($query);
if (!empty($jumlah)){	
	while($data = mysql_fetch_array($query)){
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
				<tr>
					<td colspan="3" class="bung2" align="center">
						<button><a onclick="return konfirmasi()" href="admin/delete.php/?del=<? echo $data['id_inv'];?>">Hapus</a></button>
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