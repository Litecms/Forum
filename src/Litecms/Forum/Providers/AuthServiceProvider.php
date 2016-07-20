<?php

namespace Litecms\Forum\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the package.
     *
     * @var array
     */
    protected $policies = [
        // Bind Forum policy
        \Litecms\Forum\Models\Forum::class    => \Litecms\Forum\Policies\ForumPolicy::class,
        // Bind Forum policy
        \Litecms\Forum\Models\Category::class => \Litecms\Forum\Policies\CategoryPolicy::class,
    ];

    /**
     * Register any package authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);
    }
}
