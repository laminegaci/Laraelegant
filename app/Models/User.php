<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }


    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = request('avatar')->storeAs('images/users', time() . '_' . request('avatar')->getClientOriginalName());
    }

    public function isAdmin()
    {
        $user = Auth::user();
        foreach ($user->roles as $role) {
            $role = $role->pivot->role_id;
        }
        return $role == '1';
    }

    //return 
    public function isNotAdmin()
    {
        $user = Auth::user();
        foreach ($user->roles as $role) {
            $role = $role->pivot->role_id;
        }
        return $role != '1';
    }  

    //return true if howa li rah mlogui
    public function actuallyLogedIn($id)
    {
        return Auth::user()->id == $id;
    }    

    //function retrieve role by id
    public function roleById($id)
    {
        $user = User::find($id);
        foreach ($user->roles as $role){
            $roleName = $role->name;
        }
        return $roleName;
    }

    //number of users
    public static function NumberOfUsers()
    {
        return $users = User::count();
    }
    
    //retrive the role of user
    public function hasAnyRole(string $role){
        $collection = Auth::user()->roles()->pluck('name');
        if($collection->contains($role)){
            return true;
        };
        return null;
        //return null !== $this->roles()->pluck('name')->contains($role);
    }
    public function hasAnyRoles(array $role){
        return null !== $this->roles()->whereIn('name','$role')->first();
    }
}
