<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // You can bind shared module services here if needed.
        // e.g. $this->app->bind(SomeInterface::class, SomeImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $modules = array_filter(glob(app_path('Modules/*')), 'is_dir');

        foreach ($modules as $modulePath) {
            $routeFile = $modulePath . '/routes.php';
            if (file_exists($routeFile)) {
                require $routeFile;
            }
        }
    }
}
