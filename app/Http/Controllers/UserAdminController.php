<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function list (){
        $users = $this->user->paginate(10);
        return view("admin.users.list", compact('users'));
    }

    public function create(){
        $roles = $this->role->all();
        return view('admin.users.create', compact('roles'));
    }
    public function store (Request $request){
        $users = $this->user->create([
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            'password' => Hash::make($request->input("password"))
        ]);
        $users->roles()->attach($request->role_id);
        return redirect() -> route('users.list');
    }
    public function edit( $id){
        $users = $this->user->find($id);
        $roles = $this->role->all();
        $rolesOfUser = $users -> roles;
        return view("admin.users.edit", compact('users', 'roles', 'rolesOfUser'));
    }
    public function update(Request $request, $id){
        $users = $this->user->find($id);
        $users->update([
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            'password' => Hash::make($request->input("password")),
        ]);
        $users->roles()->sync($request->role_id);
        return redirect() -> route('users.list');
    }
    public function delete($id){
        $users = $this->user->find($id);
        $users->delete();
        return redirect() -> route('users.list');
    }
}
