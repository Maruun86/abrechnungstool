<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $roles = Role::with('permissions')->get();
        $permissionsArray = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissionsArray[$permission->gate_name][] = $role->id;
            }
        }
        // Every permission may have multiple roles assigneD
        foreach ($permissionsArray as $title => $permRoles) {
            Gate::define($title, function ($user) use ($permRoles) {
                // We check if we have the needed roles among current user's roles
                return in_array($user->role->id, $permRoles);
            });
        }
        
    }
}
