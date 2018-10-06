<?php

namespace Litecms\Forum\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Litecms\Forum\Models\Forum;
use Request;
use Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Litecms\Forum\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param   \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (Request::is('*/forum/category/*')) {
            Route::bind('category', function ($category) {
                $categoryrepo = $this->app->make('Litecms\Forum\Interfaces\CategoryRepositoryInterface');
                return $categoryrepo->findorNew($category);
            });
        }

        if (Request::is('*/forum/question/*')) {
            Route::bind('question', function ($question) {
                $questionrepo = $this->app->make('Litecms\Forum\Interfaces\QuestionRepositoryInterface');
                return $questionrepo->findorNew($question);
            });
        }

        if (Request::is('*/forum/response/*')) {
            Route::bind('response', function ($response) {
                $responserepo = $this->app->make('Litecms\Forum\Interfaces\ResponseRepositoryInterface');
                return $responserepo->findorNew($response);
            });
        }

    }

    /**
     * Define the routes for the package.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the package.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        if (request()->segment(1) == 'api' || request()->segment(2) == 'api') {
            return;
        }
        
        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
            'prefix'     => trans_setlocale(),
        ], function ($router) {
            require (__DIR__ . '/../../routes/web.php');
        });
    }

}
