<?php namespace App\Extensions;

use Illuminate\Support\Facades\Blade;

class BladeExtensions {

    public static function register()
    {
        
        Blade::extend(function($view, $compiler)
        {            
            $pattern = $compiler->createMatcher('dateonly');
            return preg_replace($pattern, '$1<?php $date = new DateTime($2); echo $date->format(\'d/m/Y\'); ?>', $view);

        });
        
        Blade::extend(function($view, $compiler)
        {
            $pattern = $compiler->createMatcher('datetimeformat');
            return preg_replace($pattern, '$1<?php $date = new DateTime($2); echo $date->format(\'d/m/Y\')." às ".$date->format(\'H:i\'); ?>', $view);

        });
        
        Blade::extend(function($view, $compiler)
        {
            $pattern = $compiler->createMatcher('monthname'); 
            return preg_replace($pattern, '$1<?php $meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]; echo $meses[$2 - 1] ?>', $view);

        });         
    }

}
