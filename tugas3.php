<?php
$m1 = ['NIM'=>'09388494','nama'=>'andi','nilai'=>80];
$m2 = ['NIM'=>'09388495','nama'=>'musfik','nilai'=>80];
$m3 = ['NIM'=>'09388496','nama'=>'yono','nilai'=>80];
$m4 = ['NIM'=>'09388497','nama'=>'mahfud','nilai'=>80];
$m5 = ['NIM'=>'09388498','nama'=>'siti','nilai'=>80];
$m6 = ['NIM'=>'09388499','nama'=>'ahmad','nilai'=>80];
$m7 = ['NIM'=>'09388492','nama'=>'jono','nilai'=>80];
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7];
$ar_judul = ['No','NIM','Nama','Nilai','Keterangan','Gride','Predikat' ];

$jumlah_mhs = count($mahasiswa);
$total_nilai = array_sum(array_column($mahasiswa, 'nilai'));
$t_nilai = max(array_column($mahasiswa, 'nilai'));
$r_nilai = min(array_column($mahasiswa, 'nilai'));
$rata_nilai = $total_nilai/$jumlah_mhs;
$keterangan = [
    'Jumlah Mahasiswa' => $jumlah_mhs, 
    'Nilai Tertinggi' => $t_nilai, 
    'Nilai Terendah' => $r_nilai, 
    'Nilai Rata-rata' => $rata_nilai
    ];

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tugas 3</title>
</head>

<body>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <?php
        foreach($ar_judul as $judul){
            ?>
                    <th><?=$judul ?></th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php
            $no = 1;
            foreach ($mahasiswa as $mhs) {
                $ket = ($mhs['nilai'] >= 60) ? 'Lulus' : 'Tidak lulus';
                //grade 
                if ($mhs['nilai'] >= 80 && $mhs['nilai'] <= 100) $grade = 'A';
                else if ($mhs['nilai'] >= 75 && $mhs['nilai'] < 80) $grade = 'B';
                else if ($mhs['nilai'] >= 60 && $mhs['nilai'] < 74) $grade = 'C';
                else if ($mhs['nilai'] >= 30 && $mhs['nilai'] < 59) $grade = 'D';
                else if ($mhs['nilai'] >= 0 && $mhs['nilai'] < 29) $grade = 'E';
                else $grade = '';

                // gride dan predikat
                switch ($grade) {
                    case "A":
                        $predikat = "Sangat Baik";
                        break;
                    case "B":
                        $predikat = "Baik";
                        break;
                    case "C":
                        $predikat = "Cukup";
                        break;
                    case "D":
                        $predikat = "Kurang";
                        break;
                    case "E":
                        $predikat = "Sangat Kurang";
                        break;
                    default:
                        $predikat = "";
                        break;
                }
            ?>
                <tr>
                    <td><?= $no ?> </td>
                    <td><?= $mhs['NIM'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['nilai'] ?></td>
                    <td><?= $ket ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
                <?php $no++;
            } ?>
            </tbody>
            <!-- keterangan dalam tfoot -->
            <tfoot>
                <?php
                foreach ($keterangan as $ket => $add) { ?>
                    <tr>
                        <th colspan="6"><?=$ket?></th>
                        <td><?=$add?></td>
                    </tr>
                    <?php
                }
                ?>
            </tfoot>
        </table>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>