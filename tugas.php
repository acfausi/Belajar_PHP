<body>
    <Center>
    <h3> Tugas 1 </h3>

    <form method="GET">
        <table>
            <tr>
                <td width="120"> Alas </td>
                <td> <input type="number" name="alas"> </td>
            </tr>
            <tr>
                <td> Tinggi </td>
                <td> <input type="text" name="tinggi"> </td>
            </tr>
            <tr>
                <td> Sisi Miring </td>
                <td> <input type="text" name="sisi"> </td>
            </tr>
            <tr>
                <td> <button name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
    </Center>
</body>
<?php
echo '<center>';
if(isset($_GET['simpan'])){
    $alas = $_GET['alas'];
    $tinggi = $_GET['tinggi'];
    $sisi = $_GET['sisi'];
    $luas = $alas + $tinggi;
    $keliling = 2 +($alas + $sisi);

    echo '<br> Luas bangun datar :' .$luas;
    echo '<br> Keliling Bangun Datar :' .$keliling;
}
echo '</center>';
?> 
