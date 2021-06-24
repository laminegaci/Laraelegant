<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::withCount('users','permissions')->get();
        //dd($roles);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $permissionsId = $request->input('permissions_id');
        //dd($permissionsId);
        $role = Role::create($data);
        $role->permissions()->attach($permissionsId);


        Session::flash('success_store', 'you succesfully created a Role.');

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $role_users = Role::find($id)->users;
        $role_permissions = Role::find($id)->permissions;
        $permissions = Permission::all();
        //dd($role);
        return view('admin.roles.show', compact('role','role_users','role_permissions','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);
        $role = Role::findOrFail($id);
        $data = $request->all();
        $permissionsId = $request->input('permissions_id');

        $role->update($data);
        $role->permissions()->sync($permissionsId);

        Session::flash('success_update', 'you succesfully updated a role.');

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //dd($id);
         $item = Role::findOrFail($id);
         //dd($item);
         Role::destroy($id);
         return response()->json(['status'=>$item->name.' has been deleted! ']);
    }
}
