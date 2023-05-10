<?php
$id = $_REQUEST['id'];
$model = new Pesanan();
$pesanan = $model->getPesanan($id);

?>

<h1 class="mt-4">Detail Pesanan Produk</h1>
<div class="card-body">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Total</th>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$pesanan['tanggal']?></td>
                <td><?=$pesanan['total']?></td>
                <td><?=$pesanan['pelanggan_id']?></td>
                <td><?=$pesanan['nama_pelanggan']?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>