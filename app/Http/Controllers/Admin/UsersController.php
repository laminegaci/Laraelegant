<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('access_users')) {
            abort('403');
        }
        //dd(Auth::user()->roles);
        //dd(Auth::user()->roles()->where('name','admin')->first());
        $users = User::with('roles')->get();
        //dd($users);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('create_user')) {
            abort('403');
        }
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
        if (! Gate::allows('create_user')) {
            abort('403');
        }
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
        if (! Auth::user()->actuallyLogedIn($id)) {
            if(! Gate::allows('show_user'))
            {
                abort('403');
            }
        }
        $roles = Role::all();
        $user = User::with('roles')->findOrFail($id);
        
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
        if (! Auth::user()->actuallyLogedIn($id)) {
            if(! Gate::allows('update_user'))
            {
                abort('403');
            }
        }
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
        if (! Gate::allows('delete_user')) {
            abort('403');
        }
        //dd($id);
        $item = User::findOrFail($id);
        //dd($item);
        User::destroy($id);
        return response()->json(['status'=>$item->name.' has been deleted! ']);

        // Session::flash('success_destroy', 'you succesfully deleted a user.');

        // return redirect()->route('users.index');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateavatar(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image',
        ]);
        $user = User::findOrFail($id);
        $path = $request->avatar->storeAs('images/users', time() . '_' . request('avatar')->getClientOriginalName());
        $user->avatar = $path;
        $user->save();       

        Session::flash('success_updateavatar', 'you succesfully updated '. $user->name .' avatar.');

        return redirect()->route('users.show', $user->id);
    }

}
