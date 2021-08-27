<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [// 'App\Models\Model' => 'App\Policies\ModelPolicy',
                           'App\Models\Article' => 'App\Policies\ArticlePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Создаём гейт для ограничения правки чужих статей

        /*        Gate::define('update-article', function ( $user, $article ) {
                    return $user->id == $article->user_id;
                });*/
    }

}
