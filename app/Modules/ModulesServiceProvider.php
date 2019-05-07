<?php


namespace App\Modules;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // For each of the registered modules, include their routes and Views
        $modules = config("module.modules");

        while (list(,$module) = each($modules)) {

            // Load the routes for each of the modules
            if(file_exists(base_path('app/Modules/'.$module.'/routes.php'))) {
                include base_path('app/Modules/'.$module.'/routes.php');
            }

            // Load the views
            if(is_dir(base_path('app/Modules/'.$module.'/Views'))) {
                $this->loadViewsFrom(base_path('app/Modules/'.$module.'/Views'), $module);
            }
        }
    }

    public function register() {}


}
