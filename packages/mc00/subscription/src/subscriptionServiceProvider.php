<?php

namespace mc00\subscription;

use Illuminate\Support\ServiceProvider;

class subscriptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('mc00\subscription\subscriptionController');

		$this->loadViewsFrom(__DIR__.'/Views', 'subscribe');
		
		$this->app->register('TwigBridge\ServiceProvider');
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Twig', 'TwigBridge\Facade\Twig');		

        $this->app['subscription'] = $this->app->share(function($app) {
            return new subscription;
        });    
    }
    
    protected function loadViewsFrom($path, $namespace)  
    {
        if (is_dir($appPath = $this->app->basePath().'/resources/views/vendor/'.$namespace)) {
            $this->app['view']->addNamespace($namespace, $appPath);
        }
        $this->app['view']->addNamespace($namespace, $path);
    }
}
