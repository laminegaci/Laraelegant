<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    //dd(User::has('roles')->get());
    // $users = User::whereHas('roles', function($query) {
    //     $query->where('name','admin');
    // })->get();
    // $collection = Auth::user()->roles()->pluck('name');
    // dd($collection->contains('user'));
    
    $user = Auth::user();
    $roles = Role::with('permissions')->get();

    $array1 = $user->roles->pluck('id')->toArray();
    //dd($array1);
    $array2 = $roles;
    dd($array1,$array2);
    dd(count(array_intersect($array1, $array2)));

    foreach ($roles as $role) {
        foreach ($role->permissions as $permission) {
            $permissionArray[$permission->name][] = $role->id;
        }
    }
    
    foreach ($permissionArray as $title => $roles) {
        Gate::define($title, function ($user) use ($roles){
            return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
        });
    }
    //dd($permissionArray);


});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', 'Admin\DashboardControler@index')->name('dashboard');
    Route::resource('users', 'Admin\UsersController');
    Route::PUT('users/updateavatar/{id}', 'Admin\UsersController@updateavatar')->name('users.updateavatar');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('permissions', 'Admin\PermissionsController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
