<?php
class Pelanggan{
    private $koneksi;
    public function __construct() {
        global $dbh; //instane object koneksi.php
        $this->koneksi = $dbh;
    }
    public function Pelanggan() {
        $sql = "SELECT a.*, k.kode FROM pelanggan a LEFT JOIN kartu k ON k.id = a.kartu_id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

}
?>