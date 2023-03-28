<?php
$m1 = ['NIM'=>'09388494','nama'=>'andi','nilai'=>80];
$m2 = ['NIM'=>'09388495','nama'=>'musfik','nilai'=>80];
$m3 = ['NIM'=>'09388496','nama'=>'yono','nilai'=>80];
$m4 = ['NIM'=>'09388497','nama'=>'mahfud','nilai'=>80];
$m5 = ['NIM'=>'09388498','nama'=>'siti','nilai'=>80];
$m6 = ['NIM'=>'09388499','nama'=>'ahmad','nilai'=>80];
$m7 = ['NIM'=>'09388492','nama'=>'jono','nilai'=>80];
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7];
$ar_judul = ['No','NIM','Nama','Nilai','Keterangan','Gride','Predikat' ]
?>

<table>
    <thead>
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
            foreach($mahasiswa as $mhs){
                $ket = ($mhs['nilai']>= 60) ? 'Lulus' : 'Tidak lulus';
                // grede
            
                if ($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) $grade = 'A';
                else if ($mhs['nilai']>= 75 && $mhs['nilai'] < 80) $grade = 'B';
                else if ($mhs['nilai']>= 60 && $mhs['nilai'] < 74) $grade = 'B';
                else if ($mhs['nilai']>= 30 && $mhs['nilai'] < 59) $grade = 'B';
                else if ($mhs['nilai']>= 0 && $mhs['nilai'] < 29) $grade = 'B';
                else $grade = '';
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $mhs ['NIM'] ?></td>
                    <td><?= $mhs ['nama'] ?></td>
                    <td><?= $mhs ['nilai'] ?></td>
                    <td><?= $ket ?></td>
                </tr>
             <?php $no++;} ?>    
        </tbody>