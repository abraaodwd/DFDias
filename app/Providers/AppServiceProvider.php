<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Extensions\BoaNoiteExtensions;
use Blade;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
            Blade::directive('dateonly', function($expression) {                
                return "<?php echo with{$expression}->format('d/m/Y'); ?>";
                //return "<?php echo with{$expression}->format('m/d/Y H:i'); ";
            });

            Blade::directive('datetimeformat', function($expression) {
                
                return "<?php echo with{$expression}->format('d/m/Y').' às '.with{$expression}->format('H:i'); ?>";
            });

            Blade::directive('monthname', function($expression) {
                $exp = '<?php ';
                $exp .= '$meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]; echo $meses';
                $exp .= "[with{$expression} - 1];";
                $exp .= ' ?>';
                return $exp;
            });

	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application.
	 *
	 * @return void
	 */
	public function register()
	{
                $this->app->bind('App\Extensions\TesteExtensionsInterface', function($app){
                    $c = new BoaNoiteExtensions();
                    $c->setOla('Boa tarde de quinta');
                    return $c;
                });


                $teste = $this->app->make('App\Extensions\TesteExtensionsInterface');
                $teste->setOla('Bom almoço');



	}

}
