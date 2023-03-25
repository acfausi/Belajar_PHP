<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="POST">
    <p>Form Penggajian</p>
        <label> Nama </label>
        <input type="text" name="nama" placeholder="Masukan nama"><br>
        <label>Jabatan</label>
        <select name="jabatan">
            <option>----pilih jabatan ---</option>
            <option value="manajer">Manajer</option>
            <option value="asisten">Asisten</option>
            <option value="kabag">Kabag</option>
            <option value="staff">Staff</option>
        </select><br>
        <label>Anak </label>
        <input type="text" name="anak" placeholder="masukan jumlah anak">
        <button name="proses" type="submit">Simpan</button>
    </form>
    <?php
       $nama = $_POST['nama'];
       $pekerjaan = $_POST['pekerjaan'];
       $status = $_POST['status'];
       $anak = $_POST['anak'];
       $agama = $_POST['agama'];

    //    menentukan gaji
    switch ($jabatan){
        case 'Manager' : $gaji = 20000000; break;
        case 'Asiiten' : $gaji = 15000000; break;
        case 'Kepala_Bagian' : $gaji = 10000000; break;
        case 'Staff' : $gaji = 4000000; break;
        default: $gaji = "";
    }

    // tunjangan jabatan
    $t_jabatan = 0.2 * $$gaji;

    if( $status=="menikah" && $anak == 2 ){
        $t_keluarga = 0.05 * $g_pokok;
    }else if( $status=="menikah" && $anak >=3 && $anak <=5){
        $t_keluarga = 0.1 * $g_pokok;
    }else{
        $t_keluarga = 0;
    }

    // zakat
    $zakat = ($agama == "Islam" && $g_kotor >= 6000000) ? 0.025 * $g_kotor: 0;


    ?>
</body>
</html>