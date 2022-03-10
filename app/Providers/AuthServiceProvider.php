<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
        Gate::define('logged-in', function ($user){
            return $user;
        });

        Gate::define('is-admin', function ($user){
            return $user->hasAnyRole('Admin');
            //return $user->hasAnyRoles(['Admin','User']); 
        });
        Gate::define('is-boardonly', function ($user){
            return $user->hasAnyRole('Boarding Agent');
            //return $user->hasAnyRoles(['Admin','User']); 
        });
        Gate::define('is-check', function ($user){
            return $user->hasAnyRole('Checkin Agent');
            //return $user->hasAnyRoles(['Admin','User']); 
        });
        Gate::define('is-admin_Checkin_Agent', function ($user){
            //return $user->hasAnyRole('Admin');
            return $user->hasAnyRoles(['Admin','Checkin Agent']); 
        });

        Gate::define('is-all', function ($user){
            //return $user->hasAnyRole('Admin');
            return $user->hasAnyRoles(['Admin','Checkin Agent','Boarding Agent']); 
        });
    }
}
