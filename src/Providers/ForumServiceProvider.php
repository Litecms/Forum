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
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'forum');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'forum');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'litecms.forum');

        // Bind facade
        $this->app->bind('litecms.forum', function ($app) {
            return $this->app->make('Litecms\Forum\Forum');
        });

        // Bind Category to repository
        $this->app->bind(
            'Litecms\Forum\Interfaces\CategoryRepositoryInterface',
            \Litecms\Forum\Repositories\Eloquent\CategoryRepository::class
        );
        // Bind Question to repository
        $this->app->bind(
            'Litecms\Forum\Interfaces\QuestionRepositoryInterface',
            \Litecms\Forum\Repositories\Eloquent\QuestionRepository::class
        );
        // Bind Response to repository
        $this->app->bind(
            'Litecms\Forum\Interfaces\ResponseRepositoryInterface',
            \Litecms\Forum\Repositories\Eloquent\ResponseRepository::class
        );

        $this->app->register(\Litecms\Forum\Providers\AuthServiceProvider::class);

        $this->app->register(\Litecms\Forum\Providers\RouteServiceProvider::class);

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['litecms.forum'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('litecms/forum.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/forum')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/forum')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
