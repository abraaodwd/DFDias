<?php namespace App\Extensions;
use App\Extensions\TesteExtensionsInterface as TesteInterface;

class BoaNoiteExtensions implements TesteInterface{
    
    private $cumprimento;
    
    public function teste(){
        return 'Boa noite';
    }
    public function setOla($cumprimento){
        $this->cumprimento = $cumprimento;
    }
    public function getOla(){
        return $this->cumprimento;
    }
    
}

