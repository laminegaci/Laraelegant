<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    //number of Roles
    public static function NumberOfRoles()
    {
        return $roles = Role::count();
    }

    //number of users by role name
    public static function NumberOfUsersByRoleName()
    {
        return $roles = Role::withCount('users');
    }
}
