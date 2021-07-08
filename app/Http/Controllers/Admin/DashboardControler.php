<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class DashboardControler extends Controller
{
    public function index()
    {
        $roles = Role::withCount('users','permissions')->with('users')->with('permissions')->get();
        //dd($roles);
        return view('admin.dashboard.index', compact('roles'));
    }
}
