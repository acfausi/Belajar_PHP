<?php
$id = $_REQUEST['id'];
$model = new Pelanggan();
$pelanggan = $model->getPelanggan($id);

?>

<h1 class="mt-4">Detail produk</h1>
<div class="card-body">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th>Diskon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$pelanggan['kode_p']?></td>
                <td><?=$pelanggan['nama_pelanggan']?></td>
                <td><?=$pelanggan['jk']?></td>
                <td><?=$pelanggan['tmp_lahir']?></td>
                <td><?=$pelanggan['tgl_lahir']?></td>
                <td><?=$pelanggan['email']?></td>
                <td><?=$pelanggan['diskon']?></td>
                <td><?=$pelanggan['alamat']?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>