<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS 2 PHP</title>
</head>
<body>
    <br><br>
    <form method = 'POST'>
        <table border=1 cellpadding=10% cellspacing=1% width=37% align='center' >
            <th colspan='2' bgcolor='SteelBlue'>Data Pegawai</th>
            <tr>
                <td>Nama</td>
                <td><input type='text' name='nama' style="width:100%"></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>
                    <select name='pekerjaan' style="width:100%">
                    <option>---Pilih Pekerjaan---</option>
                    <option value='Manager'>Manager</option>
                    <option value='Asisten'>Asisten</option>
                    <option value='Kepala_Bagian'>Kepala Bagian</option>
                    <option value='Staff'>Staff</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name='status' style="width:100%">
                        <option>---Pilih Status---</option>
                        <option value='Menikah'>Menikah</option>
                        <option value='Belum_menikah'>Belum Menikah</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Anak</td>
                <td>
                    <select name='anak' style="width:100%">
                        <option>---Jumlah Anak---</option>
                        <option value=0>Tidak Ada</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                        <option value-5>5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>
                    <select name='agama' style="width:100%">
                        <option>---Pilih Agama---</option>
                        <option value='Islam'>Islam</option>
                        <option value='Non_Islam'>Non Islam</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align='center' bgcolor='SteelBlue' colspan='2'>
                <button name='simpan' type='submit'>Simpan</button>
                </td>
            </tr>
        </table>
    </form>

    <br><br>
    <fieldset>
        <center>
            <?php
            error_reporting(0);

            $nama = $_POST['nama'];
            $pekerjaan = $_POST['pekerjaan'];
            $status = $_POST['status'];
            $anak = $_POST['anak'];
            $agama = $_POST['agama'];


            // menentukan gaji pokok menggunakan switch case
            switch ($pekerjaan){
                case 'Manager' : $g_pokok = 20000000; break;
                case 'Asiiten' : $g_pokok = 15000000; break;
                case 'Kepala_Bagian' : $g_pokok = 10000000; break;
                case 'Staff' : $g_pokok = 4000000; break;
                default: $g_pokok = "";
            }

            // menentukan tunjangan jabatan 
            $t_jabatan = 0.2 * $g_pokok;


            // menentukan tunjangan keluarga menggunakan if multi kondisi
                if( $status=="menikah" && $anak == 2 ){
                    $t_keluarga = 0.05 * $g_pokok;
                }else if( $status=="menikah" && $anak >=3 && $anak <=5){
                    $t_keluarga = 0.1 * $g_pokok;
                }else{
                    $t_keluarga = 0;
                }

            // gaji kotor
            $g_kotor = $g_pokok + $t_jabatan + $t_keluarga;

            // menentukan zakat menggunakan ternary
            $zakat = ($agama == "Islam" && $g_kotor >= 6000000) ? 0.025 * $g_kotor: 0;

            // take home pay
            $thp = $g_kotor - $zakat;

            if(isset($button)){}

            ?>

            <br>Nama Pegawai : <?= $nama ?>
            <br>Pekerjaan : <?= $pekerjaan ?>
            <br>Gaji Pokok : <?= $g_pokok ?>
            <br>Tunjangan Jabatan : <?= $t_jabatan ?>
            <br>Status : <?= $status ?>
            <br>Anak : <?= $anak ?>
            <br>Tunjangan Anak : <?= $t_keluarga ?>
            <br>Gaji Kotor : <?= $g_kotor ?>
            <br>Agama : <?= $agama ?>
            <br>Zakat : <?= $zakat ?>
            <br>Take Home Pay : <?= $thp ?>

        </center>
    </fieldset>
</body>
</html>