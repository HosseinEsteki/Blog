<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

//        $permissions = Permission::all();
//        foreach ($permissions as $permission) {
//            Gate::define($permission->name,function (User $user) use ($permission){
//                foreach ($permission->roles as $role){
//                    if($role->users->find($user->id)!=null){
//                        return true;
//                    }
//                }
//                return false;
//            });
//        }

    }
}
