<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Post;
use App\User;
use App\Permission;
use Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // App\Post::class => App\Policies\ModelPolicy::class,
    ];

    /**
     *
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
          return $this->registerPolicies($gate);

          

        $gate->define('update-post', function(User $user, Post $post){
            return $user->id == $post->user_id;
        });

    //retorna todas os papeis que ousuario pode realizar vinculadas as permições
    // EX: view_post -> adm, manager, edit
    // delete_post-> adm, manager, edit
    // edit_post-> adm, manager, edit
        //    $permissions = Permission::with('roles')->get(); 
        //    foreach($permissions as $permission)
        //    {
        //          $gate->define($permission->name, function(User $user) use($permission){
        //          return $user->hasPermission($permission);
        //        });
        //    }
       
    }
}
