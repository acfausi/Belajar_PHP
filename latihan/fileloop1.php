<?php 
// jika tidak menggunkan looping

echo 'bilangan 1';
echo 'bilangan 2';

// contoh looping increment
echo '<hr> ini adalah looping increment <hr>' ;
for($x=1; $x <=10; $x++){
    echo '<br> bilangan'.$x;
}


// contoh looping decrement
for($y=10; $y >=1; $y--){
    echo '<br> angka'.$y;
}

// looping menggunakan while
$xz=1;
while($xz <= 5){
    echo '<br> bilangan'.$xz;
    $xz++;
}

$xz=5;
while($xz >= 1){
    echo '<br> bilangan'.$xz;
    $xz--;
}

// ini adalah contoh do while 
$d=1;
do{
    echo '<br>'.$d;
    $d++;
}
while($d<=10);
?>