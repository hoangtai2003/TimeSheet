<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenAdminController extends Controller
{
    public function login(Request $request){

        if (Auth::check()){
            return redirect() -> to('home');
        }
        return view('admin.authentication.login');
    }
    public function register(){
        return view('admin.authentication.register');
    }
    public function loginStore(Request $request){
        if (!Auth::attempt($request->only('name', 'password'))){
            return redirect() -> route('login');
        }
        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie ('jwt', $token, 60 * 24);

        return redirect('home')->withCookie($cookie);
    }
    public  function registerStore(Request $request){
        if ($request->input('password') != $request->input('cpassword')){
            return redirect()->back()->withInput()->withErrors(['cpassword' => 'Mật khẩu nhập lại không khớp.']);
        }
        $users = User::create([
           'name' => $request->input('name'),
           'email' => $request->input('email'),
           'password' => Hash::make($request->input('password')),
        ]);
        return redirect() -> route('login');
    }
    public function logout(){
        Auth::logout();
        return redirect() -> route('login');
    }
}
