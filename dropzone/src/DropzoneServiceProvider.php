<?php


namespace Otif\Dropzone;

use Illuminate\Support\ServiceProvider;
class DropzoneServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','Dropzone');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {

    }
}