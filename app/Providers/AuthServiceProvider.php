<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Definition du nom de l'autorisation pour la façade gate, dans notre cas c'est 'admin'
        
        Gate::define('admin', function (User $user) {
            return $user->admin === 1 ;
        });

        Gate::define('user', function (User $user){
            return $user->admin === 0 ;
        });
    }
}
