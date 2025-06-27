<?php

namespace twa\uikit\Providers;

use Illuminate\Support\ServiceProvider;


class DefaultServiceProvider extends ServiceProvider{


    public function boot(){
       
        $this->publishes([
            __DIR__ . '/../Configs/api-utils.php' => config_path('api-utils.php'),
        ], 'api-utils-config');


    }

    public function register(){
        include_once(__DIR__.'/../Helpers/default.php');      

    }

}
