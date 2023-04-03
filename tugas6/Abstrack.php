<?php

abstract class Bentuk2D{
    public abstract function fungsiLuasBidang();
    public abstract function fungsiKelilingBidang();

}


// ini adalah class lingkaran
class Lingkaran extends Bentuk2D {
    private $jari2;
    
    public function __construct($jari2) {
      $this->jari2 = $jari2;
    }
    
    public function namaBidang() {
      return "Lingkaran";
    }
    
    public function fungsiLuasBidang() {
      return number_format(pi() * $this->jari2 * $this->jari2, 2) . ' cm2';
    }
    
    public function fungsiKelilingBidang() {
      return number_format(2 * pi() * $this->jari2, 2) . ' cm';
    }
  }

// ini Adalah class PersegiPanjang
  class PersegiPanjang extends Bentuk2D {
    private $panjang;
    private $lebar;
    
    public function __construct($panjang, $lebar) {
      $this->panjang = $panjang;
      $this->lebar = $lebar;
    }
    
    public function namaBidang() {
      return "Persegi Panjang";
    }
    
    public function fungsiLuasBidang() {
      return $this->panjang * $this->lebar . ' cm2';
    }
    
    public function fungsiKelilingBidang() {
      return 2 * ($this->panjang + $this->lebar) . ' cm';
    }
  }

// ini adalah class Segitiga
  class Segitiga extends Bentuk2D {
    private $alas;
    private $tinggi;
    
    public function __construct($alas, $tinggi) {
      $this->alas = $alas;
      $this->tinggi = $tinggi;
    }
    
    public function namaBidang() {
      return "Segitiga";
    }
    
    public function fungsiLuasBidang() {
      return 0.5 * $this->alas * $this->tinggi . ' cm2';
    }
    
    public function fungsiKelilingBidang() {
      return number_format($this->alas + 2 * sqrt(($this->alas/2) ** 2 + $this->tinggi ** 2)) . ' cm';
    }
  }