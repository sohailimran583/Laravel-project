<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\BlogPost' => 'App\Policies\BlogPostPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('contact.secret',function($user){
            return $user->is_admin;
        });
        // Gate::define('delete-post',function($user ,$post){
        //     return $user->id==$post->user_id;
        // });
        // Gate::before(function($user,$ability){
        //   if($user->is_admin && in_array($ability,['post.update'])){
        //     return true;
        //   }
        // // });
        // // Gate::define('post.update','App\Policies\BlogPostPolicy@update');
        // // Gate::define('post.delete','App\Policies\BlogPostPolicy@delete');
        // Gate::resource('posts','App\Policies\BlogPostPolicy');

    }
}
