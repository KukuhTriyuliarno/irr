<?php
  if(isset($_POST['submit'])){
        $bunga = $_POST['bunga'];
        $df1 = $_POST['df1'];
        $df2 = $_POST['df2'];
        $inves = $_POST['inves'];
    }
?>
            


    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/append_remove.js"></script>
    <link rel="stylesheet" href="css/irr.css"  type="text/css" />
        
    <h2>Hitung IRR</h2>
    <div id="flash">
<div class="clos"><a href="" title="close">x</a></div>
<div class="isinya">
<a>Berhasil Menyimpan, Silahkan cek di Menu Data Investasi</a>
</div>
</div>
    <hr />

    <div class="wrap">
    <form  method="post">
    <div class="inv">
    <div class="back">
        <label>Investasi (Rp.)</label><br/>
    </div>
        <input  type="text" name="inves" value="<? if(isset($inves)) echo $inves;?>"><br/>
    </div>
    <div class="bunga">
    <div class="back">
        <label>Bunga (%)</label><br/>
    </div>
        <input type="text" name="bunga" value="<? if(isset($bunga))echo $bunga;?>"><br/>
    </div>
    <div class="bunga">
    <div class="back">
        <label>Diskonto 1 (%)</label><br/>
    </div>   
        <input type="text" name="df1" value="<? if(isset($df1))echo $df1;?>"><br/>
    </div>
    <div class="bunga">
    <div class="back">
        <label>Diskonto 2 (%)</label><br/>
    </div>   
        <input type="text" name="df2" value="<? if(isset($df2))echo $df2;?>"> <br/>
   </div>
     
   <div class="periode">
        <table border="0" cellpadding="5" cellspacing="0">
        	<thead>
            <tr>
                <td class="p">Periode</td>
                <td><input type="button" name="add_btn" value="Klik >> + Arus Kas (Rp.) " id="add_btn"></td>
            </tr>
            </thead>
            <tbody id="container">
            <!-- nanti rows nya muncul di sini -->
            </tbody>    
        </table>
        </div>
        <div class="button">
    <input type="submit" name="submit" value="Hitung">
    </div>
    </form>

 </div>

<div class="out">
<h4>Hasil Perhitungan</h4>
<?php

if(isset($_POST['submit'])){
?>

<div class="hasil">
<table border="0" cellpadding="5" cellspacing="0">
<thead>
    <tr>
        <td>Periode</td>
        <td>Arus Kas</td>
        <td>DF1</td>
        <td>PV1</td>
        <td>DF2</td>
        <td>PV2</td>
    </tr>
</thead>
<form action="admin/save.php" method="post">
<input type="hidden" name="investasi" value="<?  echo $inves;?>">
<input type="hidden" name="tk_bunga" value="<?  echo $bunga;?>">
<input type="hidden" name="diskon1" value="<?  echo $df1;?>">
<input type="hidden" name="diskon2" value="<?  echo $df2;?>">
<?php
error_reporting(0);
        $df1sebut = 1 + ($df1/100);  //untuk menghitung df1 penyebut 
        $df2sebut = 1 + ($df2/100);  //untuk menghitung df2 penyebut      
        foreach ($_POST['rows'] as $key => $count ){
            $kas = $_POST['kas_'.$count];
            $hsl_df1 = 1 /  pow($df1sebut,$count); //menghitung df1 full
            $hsl_df2 = 1 /  pow($df2sebut,$count); //menghitung df2 full
            $pv1ori = round($hsl_df1,4) * $kas; //menghitung pv1
            $pv2ori = round($hsl_df2,4) * $kas; //menghitung pv2
?>

<tbody>
    <tr>
        <td><? echo $count;?></td>
        <td><? echo $kas;?></td>
        <td><? echo round($hsl_df1,4);?></td>
        <td><? echo round($pv1ori,0);?></td>
        <td><? echo round($hsl_df2,4);?></td>
        <td><? echo round($pv2ori,0);?></td>
        
    </tr>
</tbody>
<input type="hidden" name="period[]" value="<?  echo $count;?>">
<input type="hidden" name="cash[]" value="<?  echo $kas;?>">

<?php
            $pv1[]= $pv1ori;//pv1 transformasi jadi array
            $pv2[]= $pv2ori;//pv1 transformasi jadi array

        }
?>

</table>
</div>        
<?php
        $npv1_a=array_sum($pv1);
        $npv2_a=array_sum($pv2);
        $npv1=$npv1_a - $inves;
        $npv2=$npv2_a - $inves;
if ($df1 < $df2){
    $low = $df1;
    $high = $df2;
    $NPVlow = $npv1;
    $NPVhigh = $npv2;
} else {
    $low = $df2;
    $high = $df1;
    $NPVlow = $npv2;
    $NPVhigh = $npv1;
}


$sebut = $NPVlow - $NPVhigh;
$jarakNPV =  $NPVlow / $sebut;
$jarakpers = $high - $low;
$hslNPV = $jarakNPV * $jarakpers;
$irr = $low + $hslNPV;    

 

	
          
?>
<input type="hidden" name="irr" value="<? echo round($irr,2); ?>">


<p>NPV 1 : <? echo round($npv1,0);?></p>
<p>NPV 2 : <? echo round($npv2,0);?></p>
<p>IRR : <? echo round($irr,2);?></p>

<?php
  if ($irr > $bunga){
                $rekomendasi = "Terima";
                echo $rekomendasi;
            } else {
                $rekomendasi = "Tolak";
                echo '<p>'.$rekomendasi.'</p>';
            } 
?>

<input type="hidden" name="rekomendasi" value="<? echo $rekomendasi; ?>">
<input type="submit" value="save">
</form>
<?
 

        }
       
?>

</div>


