<br>
<?php
error_reporting(0);
$obj_kartu = new Kartu();
$kartu = $obj_kartu->Kartu();
$idedit = $_REQUEST['idedit'];
$prod = !empty($idedit) ? $obj_kartu->getKartu($idedit) : array() ;

?>
<form action="kartu_controller.php" method="POST">
      <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Kode</label> 
        <div class="col-8">
          <input id="kode_k" name="kode_k" type="text" class="form-control" value="<?= $prod['kode_k']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Nama Pelanggan</label> 
        <div class="col-8">
          <input id="nama" name="nama" type="text" class="form-control" value="<?= $prod['nama']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Diskon</label> 
        <div class="col-8">
          <input id="diskon" name="diskon" type="number" class="form-control" value="<?= $prod['diskon']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Iuran</label> 
        <div class="col-8">
          <input id="iuran" name="iuran" type="number" class="form-control" value="<?= $prod['iuran']?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-4 col-8">
        <?php
            if(empty($idedit)){

            ?>
            <button name="proses" type="submit" value="simpan" class="btn btn-primary">Submit</button>
            <?php
            }
            else {
              ?>
              <button name="proses" type="submit" value="ubah" class="btn btn-primary">Update</button>
              <input type="hidden" name="idx" value="<?= $idedit ?>">
              <?php
            }
            ?>
          <button name="proses" type="submit" value="batal" class="btn btn-primary">Cancel</button>
        </div>
      </div>
    </form>