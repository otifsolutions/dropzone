<?php


namespace Otif\Dropzone;
use function Composer\Autoload\includeFile;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
class DropzoneServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','Dropzone');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');


//        Blade::if('dropzone', function () {
//
//echo"<div class=\"dropzone clsbox\" id=\"mydropzone\" data-toggle=\"dropzone\">
//
//        </div>";
//
//
//
//
//
//
//
//        });
    }

    public function register()
    {

    }
}