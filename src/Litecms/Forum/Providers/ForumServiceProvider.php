<?php

namespace Litecms\Forum\Providers;

use Illuminate\Support\ServiceProvider;

class ForumServiceProvider extends ServiceProvider
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
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../../../resources/views', 'forum');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../../../resources/lang', 'forum');

        // Call pblish redources function
        $this->publishResources();

        include __DIR__ . '/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('forum', function ($app) {
            return $this->app->make('Litecms\Forum\Forum');
        });

        // Bind Forum to repository
        $this->app->bind(
            \Litecms\Forum\Interfaces\ForumRepositoryInterface::class,
            \Litecms\Forum\Repositories\Eloquent\ForumRepository::class
        );

        // Bind Category to repository
        $this->app->bind(
            \Litecms\Forum\Interfaces\CategoryRepositoryInterface::class,
            \Litecms\Forum\Repositories\Eloquent\CategoryRepository::class
        );

        $this->app->register(\Litecms\Forum\Providers\AuthServiceProvider::class);
        $this->app->register(\Litecms\Forum\Providers\EventServiceProvider::class);
        $this->app->register(\Litecms\Forum\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['forum'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../../../config/config.php' => config_path('package/forum.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../../../resources/views' => base_path('resources/views/vendor/forum')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../../../resources/lang' => base_path('resources/lang/vendor/forum')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__ . '/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__ . '/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');

        // Publish public
        $this->publishes([__DIR__ . '/../../../../public/' => public_path('/')], 'uploads');
    }
}
