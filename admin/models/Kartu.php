<?php
class Kartu{
    private $koneksi;
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }

public function Kartu(){
    $sql = "SELECT * FROM kartu";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs; 
    }
}
?>
