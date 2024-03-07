<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleAdminController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function list(){
        $roles = $this->role->paginate(10);
        return view('admin.roles.list', compact('roles'));
    }

    public function create(){
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.roles.create', compact('permissionsParent'));
    }

    public function store(Request $request){
        $roles = $this->role->create([
           'name' => $request -> input('name'),
            'display_name' => $request -> input('display_name')
        ]);
        $roles->permissions()->attach($request->permission_id);
        return redirect() -> route('roles.list');
    }

    public function edit($id){
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        $roles = $this->role->find($id);
        $permissions = $this->permission->all();
        $permissionsChecked = $roles->permissions;
        return view('admin.roles.edit', compact('roles','permissions','permissionsChecked', 'permissionsParent'));
    }

    public function update(Request $request, $id){
        $roles = $this->role->find($id);
        $roles->update([
           'name' => $request->input('name'),
            'display_name' => $request->input('display_name')
        ]);
        $roles->permissions()->sync($request->permission_id);
        return redirect() -> route('roles.list');
    }
    public function delete($id){
        $roles = $this->role->find($id);
        $roles->delete();
        return redirect() -> route('roles.list');
    }

}
