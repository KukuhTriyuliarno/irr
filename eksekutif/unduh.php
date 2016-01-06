<?php
require('fpdf/fpdf.php');
include "../config/connect.php";
$q=$_GET['q'];
$res = $mysqli->query("SELECT * FROM tbl_run_inv INNER JOIN tbl_inv ON tbl_inv.id_inv=tbl_run_inv.id_inv INNER JOIN tbl_user ON tbl_run_inv.id_user=tbl_user.id_user WHERE tbl_run_inv.id_inv='$q'");
$data = $res->fetch_assoc();

$nama = $data['fname'].' '.$data['lname'];
$alamat = $data['address'];
$phone = $data['phone'];
$email = $data['email'];
$fb = $data['fb'];
$inv = $data['inves'];
$bunga = $data['bunga'];
$df1 = $data['df1'];
$df2 = $data['df2'];
$irr = $data['irr'];
$periode = $data['jml_periode'];
$kas = $data['kas'];

$tgl_ctk = date("Y-m-d H:i:s", time()+60*60*6);
$tgl_start = $data['tgl_start'];
$format_tgl_start=date("d F Y", strtotime($tgl_start));
$tgl_finish= $data['tgl_finish'];
$format_tgl_finish=date("d F Y", strtotime($tgl_finish));

class PDF extends FPDF
{
	//Page header
	function Header()
	{
		$this->SetFont('Arial','B',20);
		$this->Cell(60);
		$this->Cell(30,25,'DOKUMEN INVESTASI');
		$this->Ln(30);
	}

	//Page footer
	function Footer()
	{
	    //Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    //Arial italic 8
	    $this->SetFont('Arial','I',8);
	  
   
	}
}
$pdf=new PDF();

$pdf->AddPage();
$pdf->setMargins(20,10,20);
$pdf->SetFont('Arial','',12);
$pdf->Cell(1);
$pdf->Ln(1);
$pdf->Cell(40,5,'Yang ber-investasi',0,1);
$pdf->Ln(5);
$pdf->Cell(40,5,'Nama Lengkap');
$pdf->Cell(3,5,':');
$pdf->Cell(0,5,$nama,0,1);
$pdf->Ln(1.5);
$pdf->Cell(40,5,'Alamat');
$pdf->Cell(3,5,':');
$pdf->Cell(0,5,$alamat,0,1);
$pdf->Ln(1.5);
$pdf->Cell(40,5,'Telepon/Hp');
$pdf->Cell(3,5,':');
$pdf->Cell(0,5,$phone,0,1);
$pdf->Ln(1.5);
$pdf->Cell(40,5,'Email');
$pdf->Cell(3,5,':');
$pdf->Cell(0,5,$email,0,1);
$pdf->Ln(1.5);
$pdf->Cell(40,5,'Facebook');
$pdf->Cell(3,5,':');
$pdf->Cell(0,5,$fb,0,1);
$pdf->Ln(5);
$pdf->setFont('','B');
$pdf->Cell(40,5,'Rincian Investasi',0,1);
$pdf->Ln(5);
$pdf->setFont('','');
$pdf->Cell(40,5,'Dana Investasi');
$pdf->Cell(3,5,':');
$pdf->setFont('','B');
$pdf->Cell(0,5,'Rp. '.$inv,0,1);
$pdf->Ln(1.5);
$pdf->setFont('','');
$pdf->Cell(40,5,'Tingkat Bunga');
$pdf->Cell(3,5,':');
$pdf->setFont('','B');
$pdf->Cell(0,5,$bunga.'  %',0,1);
$pdf->Ln(1.5);
$pdf->setFont('','');
$pdf->Cell(40,5,'Faktor Diskonto 1');
$pdf->Cell(3,5,':');
$pdf->Cell(0,5,$df1.'  %',0,1);
$pdf->Ln(1.5);
$pdf->Cell(40,5,'Faktor Diskonto 2');
$pdf->Cell(3,5,':');
$pdf->Cell(0,5,$df2.'  %',0,1);
$pdf->Ln(1.5);
$pdf->Cell(40,5,'IRR');
$pdf->Cell(3,5,':');
$pdf->setFont('','B');
$pdf->Cell(0,5,$irr.'  %',0,1);
$pdf->Ln(1.5);
$pdf->setFont('','');
$pdf->Cell(40,5,'Lama Periode');
$pdf->Cell(3,5,':');
$pdf->Cell(0,5,$periode.' Tahun',0,1);

$pdf->Ln(1.5);
$pdf->Cell(43);
$pdf->Cell(12,5,'Mulai');
$pdf->Cell(0,5,$format_tgl_start,0,1);
$pdf->Ln(1.5);
$pdf->Cell(43);
$pdf->Cell(18,5,'Berakhir');
$pdf->Cell(0,5,$format_tgl_finish,0,1);

$pdf->Ln(1.5);
$pdf->Cell(40,5,'Arus Kas');
$pdf->Cell(3,5,':');
$pdf->Cell(0,5,$kas,0,1);

$pdf->Ln(25);
$pdf->Cell(15);
$pdf->Cell(110,5,'Penerima,',0,0);
$pdf->Cell(0,5,'Pemberi,',0,1);
$pdf->Ln(5);
$pdf->Cell(110);
$pdf->setFont('','I',8);
$pdf->Cell(0,5,'TTD + Materai 6000',0,1);
$pdf->Ln(8);
$pdf->setFont('','',12);
$pdf->Cell(10);
$pdf->Cell(108,5,'(Administrator)',0,0);
$pdf->Cell(0,5,'('.$nama.')',0,1);

$pdf->Ln(60);
$pdf->Cell(90);
$pdf->SetFont('','',10);
$pdf->Cell(27,5,'Tanggal Cetak :');
$pdf->Cell(0,5,$tgl_ctk,0,1);


$pdf->Output();
?>