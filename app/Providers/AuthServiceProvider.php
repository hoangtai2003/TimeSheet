<?php

namespace App\Providers;

use App\Models\User;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('list_user', function (User $user) {
            return $user->checkPermission('list_user');
        });
        Gate::define('create_user', function (User $user) {
            return $user->checkPermission('create_user');
        });
        Gate::define('edit_user', function (User $user) {
            return $user->checkPermission('edit_user');
        });
        Gate::define('delete_user', function (User $user) {
            return $user->checkPermission('delete_user');
        });
    }

}
