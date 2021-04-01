<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {    
        
        //select the cuurent user
        $user = \Auth::user();
        //collect roles of the current user
        $roles = Role::with('permissions')->get();

        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                //$permissionArray[access_users] = ['1','2']<= role_id
                $permissionArray[$permission->name][] = $role->id;
            }
        }

        if (! $permissionArray) {
            return route('403');
        }

        foreach ($permissionArray as $title => $roles) {
            Gate::define($title, function (\App\Models\User $user) use ($roles){
                //Calcule l'intersection de tableaux
                //retourne un tableau contenant toutes les valeurs de array qui sont présentes dans tous les autres arguments. Notez que les clés sont préservées.
                return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
            });
        }
        return $next($request);
    }
}
