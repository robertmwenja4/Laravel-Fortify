<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Gate::denies('logged-in')){
            dd('No user logged in');
        }

        if(Gate::allows('is-admin')){
            $user = User::paginate(10);
            return view('admin.user.index',['user' => $user]);
        }
        dd('You are not admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create',['roles'=> Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = new CreateNewUser();
        $newuser = $user->create($request->only(['name','email', 'password','password_confirmation']));
       // Password::sendResetLink($request->only(['email']));
        $newuser->roles()->sync($request->roles);
        $request->session()->flash('success', 'User Created Successfully!!');
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.edit',
                [
                    'roles'=> Role::all(),
                    'user' => User::find($id)
                ]);
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
        $user = User::find($id);
        if(!$user){
            $request->session()->flash('error', 'User does not exist!!');
            return redirect(route('admin.users.index')); 
        }
        $user->update($request->except(['_token','roles']));
        $user->roles()->sync($request->roles);
        $request->session()->flash('success', 'User Updated Successfully!!');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);
        $request->session()->flash('success', 'User Deleted Successfully!!');
        return redirect(route('admin.users.index'));
    }

    public function search(){
        $username = $_GET['searchname'];
        $users = User::where('name','LIKE', '%'.$username.'%')->get();
        return view('admin.user.searchUser',['user'=>$users]);
    }
}
