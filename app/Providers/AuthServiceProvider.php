<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Annonce;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('edit-annonce',function(User $user , Annonce $annonce){
            return $user->id===$annonce->user_id;
        });
    }
}
