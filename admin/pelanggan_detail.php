<?php
$id = $_REQUEST['id'];
$model = new Pelanggan();
$pelanggan = $model->getPelanggan($id);

?>

<div>
    <h3><?= $pelanggan['nama_pelanggan'] ?> </h3>
</div>