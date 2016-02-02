<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // set up beforeCallback (useful for example to set up super admin all permission)
        $gate->before(function($user, $ability){
            return $user->is_super == 1;            
        });

        // or if it comes from tables
        foreach($this->getPermissions() as $permission){
            $gate->define($permission->action . $permission->resource, function($user) use ($permission){
                return $user->hasRole($permission->roles);
            });
        }
    }

    protected function getPermissions(){
        return Permission::with('roles')->get();
    }
}
