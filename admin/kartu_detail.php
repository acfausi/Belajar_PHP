<?php
$id = $_REQUEST['id'];
$model = new Kartu();
$kartu = $model->getKartu($id);

?>

<div>
    <h3><?= $kartu['nama'] ?> </h3>
</div>