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
    return view('welcome');
    //dd(User::has('roles')->get());
    // $users = User::whereHas('roles', function($query) {
    //     $query->where('name','admin');
    // })->get();
    // $collection = Auth::user()->roles()->pluck('name');
    // dd($collection->contains('user'));
    // $role = Role::find(1);
    // $role->permissions()->attach([1,2,3,4,5]);
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', 'Admin\DashboardControler@index')->name('dashboard');
    Route::resource('users', 'Admin\UsersController');
    Route::PUT('users/updateavatar/{id}', 'Admin\UsersController@updateavatar')->name('users.updateavatar');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::get('fullcalendar', 'Admin\fullCalendar@index')->name('fullCalendar');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
