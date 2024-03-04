<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function list (Request $request){
        $users = User::query()->paginate(10);
        return view("admin.users.list", compact('users'));
    }
}
