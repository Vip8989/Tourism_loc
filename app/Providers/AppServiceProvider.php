<?php

namespace Tour\Providers;

use Illuminate\Support\ServiceProvider;

use Blade;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //для присваивания значений различным переменным -set/ function-определяет функционал данной директивы
        Blade::directive('set', function($exp){

            list($name,$val)= explode(',', $exp);

            return "<?php $name = $val  ?>";
        });
        //
        DB::listen(function($query) {
        	
        	//echo '<h1>'.$query->sql.'</h1>';
        	
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
