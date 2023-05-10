<?php
include_once 'koneksi.php';
include_once 'models/Pelanggan.php';

//menangkap request form
$kode = $_POST['kode'];
$nama = $_POST['nama_pelanggan'];
$jk = $_POST['jk'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];

//menangkap foorm diatas dijadikan array
$data = [
    $kode,
    $nama,
    $jk,
    $tmp_lahir,
    $tgl_lahir,
    $email,
    $alamat

];
$model = new Pelanggan();
$tombol = $_REQUEST['proses'];
switch($tombol){
    case 'simpan':$model->simpan($data); break;
    case 'ubah':
        $data[] = $_POST['idx']; $model->ubah($data);break;
    case 'hapus':
        unset($data); $model->hapus($_POST['idx']); break;
    default:
    header('Location:index.php?url=pelanggan');
    break;
}
header('Location:index.php?url=pelanggan');

?>
