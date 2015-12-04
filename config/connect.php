<?php
class konek_db {
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $db = "dss";
    
 
	public function getKoneksi() {
		mysql_connect($this->host, $this->user, $this->pass, $this->db) or die("Sambungan Gagal");
        mysql_select_db($this->db) or die("Tidak ada DB");
	}
}
$konek_db=new konek_db();
$konek_db->getKoneksi();
?>