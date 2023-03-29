<?php
$ar_prodi = ["SI"=>"Sistem Informasi", "TI"=>"Teknik Informatika","ILKOM"=>"Ilmu Komputer","TE"=>"Teknik Elektro"];

$ar_skill = ["HTML"=>10,"CSS"=>10, "Javascript"=>20, "RWD Bootstrap"=>20, "PHP"=>30, "MySQL"=>30,"Laravel"=>40];
$domisili = ["Jakarta","Bandung","Bekasi","Malang","Surabaya", "lainnya"];
?>
<fieldset style="background-color:aquamarine;">
   <h3><center> Form Registrasi Kelompok Belajar </center></h3>
<table>
    <thead>
        <tr>
            <th>Form Registrasi</th>
        </tr>
    </thead>
    <tbody>
        <form method="POST">
            <tr>
                <td>NIM </td>
                <td>:</td>
                <td> 
                    <input type="text" name="nim" >
                </td>
            </tr>
            <tr>
                <td>Nama </td>
                <td>:</td>
                <td> 
                    <input type="text" name="nama" >
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td> 
                    <input type="radio" name="jk" value="Laki-laki" >Laki-Laki &nbsp;
                    <input type="radio" name="jk" value="Laki-laki" >Perempuan 
                </td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td> 
                    <select name="prodi">
                        <?php 

                        foreach($ar_prodi as $prodi => $v){
                            ?>
                            <option value="<?= $prodi ?>"><?= $v ?></option>
                       <?php } ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>Skill Programming  </td>
                <td>:</td>
                <td> 
                    <?php 
                    foreach ($ar_skill as $skill => $s){
                        ?>
                    <input type="checkbox" name="skill[]" value="<?= $skill ?>" ><?= $skill ?>

                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Domisili </td>
                <td>:</td>
                <td> 
                    <select name="domisili">
                        <?php 

                        foreach($domisili as $d){
                            ?>
                            <option value="<?= $d ?>"><?= $d ?></option>
                       <?php } ?>
                        </select>
                </td>
            </tr>
            <tfoot>
                <tr>
                    <th colspan="2">
                        <button name="proses">Submit</button>
                    </th>
                </tr>
            </tfoot>
    </table>
            
</fieldset>

<?php 

if(isset($_POST['proses'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $prodi = $_POST['prodi'];
    $skill = $_POST['skill'];
    $domisili = $_POST['domisili'];

    $nilai = 0;
    foreach($skill as $jml) {
        if (isset($ar_skill[$jml])) {
            $nilai += $ar_skill[$jml];
        }
    }

    function kategori_skill($nilai)
    {
        if ($nilai >= 100 && $nilai <=150){
            return "Sangat Baik";
        }elseif ($nilai >= 60 && $nilai <= 100){
            return "Baik";
        }elseif ($nilai >= 40 && $nilai <= 60){
            return "Cukup";
        }elseif ($nilai >= 0 && $nilai <= 40){
            return "Kurang";
        }else{
            return "Nilai Tidak Ada";
        }
    }
?>


<fieldset>
    <table>
        <tbody>
            <form >
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?= $nim ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $nama ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $jk ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td><?= $prodi ?></td>
                </tr>
                <tr>
                    <td>Skill</td>
                    <td>:</td>
                    <td><?= implode(', ', $skill) ?></td>
                </tr>
                <tr>
                    <td>Skor Skill</td>
                    <td>:</td>
                    <td><?= $nilai ?></td>
                </tr>
                <tr>
                    <?php
                    $k_skill = kategori_skill($nilai);
                    ?>
                    <td>Kategori Skill</td>
                    <td>:</td>
                    <td><?= $k_skill ?></td>
                </tr>
                <tr>
                    <td>Domisili</td>
                    <td>:</td>
                    <td><?= $domisili ?></td>
                </tr>
            </form>
        </tbody>
    </table>
    </fieldset>
<?php } ?>

