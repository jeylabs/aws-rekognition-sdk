<?php

namespace Jeylabs\AwsRekognition;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as AppServiceProvider;
use Illuminate\Contracts\Container\Container as Application;
class ServiceProvider extends AppServiceProvider
{
    public function boot()
    {
        $this->publishConfig();
    }

    public function register()
    {
        $this->registerBindings($this->app);
    }

    protected function registerBindings(Application $app)
    {
        $app->alias('AwsRekognition', AwsRekognition::class);
    }

    protected function publishConfig(){
        $source = __DIR__ . '/../config/rekognition.php';
        $this->publishes([$source => config_path('rekognition.php')]);
        $this->mergeConfigFrom($source, 'rekognition');
    }
}
