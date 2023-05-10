<?php
class Pelanggan{
    private $koneksi;
    public function __construct() {
        global $dbh; //instane object koneksi.php
        $this->koneksi = $dbh;
    }
    public function data_Pelanggan() {
        $sql = "SELECT a.*, k.diskon FROM pelanggan a LEFT JOIN kartu k ON k.id = a.kartu_id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getPelanggan($id){
        $sql = "SELECT a.*, k.diskon FROM pelanggan a LEFT JOIN kartu k ON k.id = a.kartu_id WHERE a.id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
    public function simpan($data){
        $sql = "INSERT INTO pelanggan(kode_p, nama_pelanggan, jk, tmp_lahir, tgl_lahir, email, alamat) VALUES (?,?,?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data); 
    }
    public function ubah($data){
        $sql = "UPDATE pelanggan SET kode_p=?, nama_pelanggan=?, jk=?, tmp_lahir=?, tgl_lahir=?, email=?, alamat=?
        WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function hapus($id){
        $sql = "DELETE FROM pelanggan WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    } 
} 
?>