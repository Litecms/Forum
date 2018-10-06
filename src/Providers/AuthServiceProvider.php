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
        // Bind Category policy
        'Litecms\Forum\Models\Category' => \Litecms\Forum\Policies\CategoryPolicy::class,
// Bind Question policy
        'Litecms\Forum\Models\Question' => \Litecms\Forum\Policies\QuestionPolicy::class,
// Bind Response policy
        'Litecms\Forum\Models\Response' => \Litecms\Forum\Policies\ResponsePolicy::class,
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
