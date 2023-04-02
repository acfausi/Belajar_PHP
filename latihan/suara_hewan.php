<?php
require_once 'abstrack.php';

$h1 = new Kucing(); $h2 = new Anjing();
$h3 = new Kambing();

$suara_hewan = [$h1, $h2, $h3];

foreach($suara_hewan as $hewan){
        echo '<br/>'.$hewan->bersuara();
    }
    