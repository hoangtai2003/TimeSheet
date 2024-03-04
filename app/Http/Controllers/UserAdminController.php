<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function list (){
        $users = User::query()->paginate(10);
        return view("admin.users.list", compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }
    public function store (Request $request){
        $users = User::create([
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            'password' => Hash::make($request->input("password"))
        ]);
        return redirect() -> route('users.list');
    }
    public function edit( $id){
        $users = User::find($id);
        return view("admin.users.edit", compact('users'));
    }
    public function update(Request $request, $id){
        $users = User::find($id);

        $users->name = $request->input("name");
        $users->email = $request->input("email");
        $users->password = Hash::make($request->input("password"));

        $users->save();
        return redirect() -> route('users.list');
    }
    public function delete($id){
        $users = User::find($id);
        $users->delete();
        return redirect() -> route('users.list');
    }
}
