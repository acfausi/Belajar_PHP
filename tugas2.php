<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Pegawai</h1>
    <form method = 'POST'>
        <table >
            <tr>
                <td>Nama</td>
                <td><input type='text' name='nama'></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>
                    <select name='jabatan'>
                    <option>---Pilih Pekerjaan---</option>
                    <option value='Manajer'>Manager</option>
                    <option value='Asisten'>Asisten</option>
                    <option value='Kepala_Bagian'>Kepala Bagian</option>
                    <option value='Staff'>Staff</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name='status'>
                        <option>---Pilih Status---</option>
                        <option value='Menikah'>Menikah</option>
                        <option value='Belum_menikah'>Belum Menikah</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Anak</td>
                <td>
                    <input type="text" name='anak'>
                </td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>
                    <select name='agama'>
                        <option>---Pilih Agama---</option>
                        <option value='Islam'>Islam</option>
                        <option value='Non_Islam'>Non Islam</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                <button name='simpan' type='submit'>Simpan</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    
       $nama = $_POST['nama'];
       $jabatan = $_POST['jabatan'];
       $status = $_POST['status'];
       $anak = $_POST['anak'];
       $agama = $_POST['agama'];

    //    menentukan gaji
    switch ($jabatan){
        case 'Manajer' : $gaji = 20000000; break;
        case 'Asisten' : $gaji = 15000000; break;
        case 'Kepala_Bagian' : $gaji = 10000000; break;
        case 'Staff' : $gaji = 4000000; break;
        default: $gaji = "";
    }

    // tunjangan jabatan
    $t_jabatan = 0.2 * $gaji;


    // tunjangan keluarga
    if( $status=="menikah" && $anak == 2 ){
        $t_keluarga = 0.05 * $gaji;
    }else if( $status=="menikah" && $anak >=3 && $anak <=5){
        $t_keluarga = 0.1 * $gaji;
    }else{
        $t_keluarga = 0;
    }

    // gaji kotor
    $kotor = $gaji + $t_jabatan + $t_keluarga;


    // zakat
    $zakat = ($agama == "Islam" && $kotor >= 6000000) ? 0.025 * $kotor: 0;

    // take home pay
    $home = $kotor - $zakat;

    if(isset($button)){}
    ?>
            <br>Nama Pegawai : <?= $nama ?>
            <br>Pekerjaan : <?= $jabatan ?>
            <br>Gaji Pokok : <?= $gaji ?>
            <br>Tunjangan Jabatan : <?= $t_jabatan ?>
            <br>Status : <?= $status ?>
            <br>Anak : <?= $anak ?>
            <br>Tunjangan Anak : <?= $t_keluarga ?>
            <br>Gaji Kotor : <?= $kotor ?>
            <br>Agama : <?= $agama ?>
            <br>Zakat : <?= $zakat ?>
            <br>Take Home Pay : <?= $home ?>

</body>
</html>