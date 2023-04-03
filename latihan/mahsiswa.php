<?php 
require_once 'Person.php';
class Mahasiswa extends Person{

    public $semester;
    public $jurusan;
    public function__construct($nama, $semester, $jurusan){
        parent::__construct($nama, $gender);
        $this->semester = $semester;
        $this->jurusan = $jurusan;

    }
    public function cetak(){
        parent::cetak();
        echo 'Semester :'.$this->semester;
        echo 'Jurusan :'.$this->jurusan;
        echo '<hr>';
    }
}
