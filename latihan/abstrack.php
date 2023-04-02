<?php
abstract class Hewan{
    abstract protected function bersuara();
}

class Kucing extends Hewan
{
     public function bersuara()
    {
     echo "<br/> Suara kucing meooong";
    }
}
class Kambing extends Hewan
{
    public function bersuara()
    {
         echo "<br/>Suara kambing embe";
     }
}
class Anjing extends Hewan
{
    public function bersuara()
    {
        echo "<br/>Suara anjing guk..guk..guk";
    }
}
?>