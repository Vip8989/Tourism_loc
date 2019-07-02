<?php

namespace Tour\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Tour\Article;
use Tour\Policies\ArticlePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        //регистрация политики безопасности для модели article
        Article::class => ArticlePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
       
        $this->registerPolicies($gate);
        
         //регистрируем условия для проверки прав пользователей
        $gate->define('VIEW_ADMIN', function ($user) {
        	return $user->canDo('VIEW_ADMIN', FALSE);
        });
        
        $gate->define('VIEW_ADMIN_ARTICLES', function ($user) {
        	return $user->canDo('VIEW_ADMIN_ARTICLES', FALSE);
        });

        $gate->define('VIEW_ADMIN_ARTICLES', function ($user) {
        	return $user->canDo('VIEW_ADMIN_ARTICLES', FALSE);
        });
    }
}
