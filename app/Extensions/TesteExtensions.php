<?php namespace App\Extensions;
use App\Extensions\TesteExtensionsInterface as TesteInterface;

class TesteExtensions implements TesteInterface{
    public function teste(){
        return 'Boa tarde';
    }
}

