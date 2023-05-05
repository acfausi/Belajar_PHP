<?php
$dbname = 'dbpos';
$dsn = 'mysql:dbname='.$dbname.';host:localhost';
$user = 'root'; 
$password = ''; 
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'Terjadi Kesalahan Koneksi DB dengan sebab: ' .$e->getMessage();
}
