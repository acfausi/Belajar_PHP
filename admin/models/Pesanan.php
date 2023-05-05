<?php
class Pesanan{
    private $koneksi;
    public function __construct() {
        global $dbh; //instane object koneksi.php
        $this->koneksi = $dbh;
    }
    public function Pesanan() {
        $sql = "SELECT p.*, a.nama_pelanggan FROM pesanan p LEFT JOIN pelanggan a ON a.id = p.pelanggan_id ";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

}
?>