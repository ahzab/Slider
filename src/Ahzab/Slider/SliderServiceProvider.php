<?php namespace Ahzab\Slider;

use Illuminate\Support\ServiceProvider;

class SliderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('Ahzab/Slider');
        include __DIR__.'/../../routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('slider', function ($app) {
            return $this->app->make('Ahzab\Slider');
        });

        $this->app->bind(
            'Ahzab\\Slider\\Interfaces\\SliderInterface',
            'Ahzab\\Slider\\Repositories\\Eloquent\\SliderRepository'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
