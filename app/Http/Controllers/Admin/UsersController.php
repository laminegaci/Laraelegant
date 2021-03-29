<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required|unique:App\Models\User,email',
            'password' => 'required|confirmed',
            'avatar' => 'image',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt(request('password'));
        $roleId = $request->input('role_id');
        
        $user = User::create($data);
        $user->roles()->attach($roleId);

        Session::flash('success_store', 'you succesfully created a user.');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::all();
        $user = User::with('roles')->findOrFail($id);
        //dd($user);
        //dd(Auth::user()->roles->pluck('name')->contains('admin'));
        return view('admin.users.show', compact('user','roles'));
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
            'email' => 'required',
        ]);
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->update($data);

        $roleId = $request->input('role_id');
        $user->roles()->sync($roleId);
        //$user->roles()->updateExistingPivot($roleId, ['role_id' => $roleId]);

        Session::flash('success_update', 'you succesfully updated a user.');

        return redirect()->route('users.index');
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
        $item = User::findOrFail($id);
        //dd($item);
        User::destroy($id);
        return response()->json(['status'=>$item->name.' has been deleted! ']);

        // Session::flash('success_destroy', 'you succesfully deleted a user.');

        // return redirect()->route('users.index');
    }
}
