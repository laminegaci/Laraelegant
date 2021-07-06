<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Session;
use Illuminate\Support\Facades\Gate;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('access_permissions')) {
            abort('403');
        }
        $permissions = Permission::withCount('roles')->get();
        //dd($permissions);
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('create_permissions')) {
            abort('403');
        }
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create_permissions')) {
            abort('403');
        }
        //dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        Permission::create($data);
        Session::flash('success_store', 'you succesfully created a Permission.');

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('show_permissions')) {
            abort('403');
        }
        $permission = Permission::with('roles')->findOrFail($id);
        $permission_roles = Permission::find($id)->roles;
        //dd($role);
        return view('admin.permissions.show', compact('permission','permission_roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort('404');
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
        if (! Gate::allows('update_permissions')) {
            abort('403');
        }
         //dd($request->all());
         $request->validate([
            'name' => 'required',
        ]);
        $item = Permission::findOrFail($id);
        $data = $request->all();
        $item->update($data);
        Session::flash('success_update', 'you succesfully updated a permission.');

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('delete_permissions')) {
            abort('403');
        }
         //dd($id);
         $item = Permission::findOrFail($id);
         //dd($item);
         Permission::destroy($id);
         return response()->json(['status'=>$item->name.' has been deleted! ']);
    }
}
