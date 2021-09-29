<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Str;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index', ['roles'=>Role::all()]);
    }
    public function store()
    {
        $inputs = request()->validate([
            'name' => 'required|string|unique:roles',
        ]);

        $slug = Str::slug(request('name'));
        $inputs['name'] = Str::ucfirst($inputs['name']);

        Role::create([
            'name'=>$inputs['name'],
            'slug'=>$slug
        ]);
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('role-delete', $role->name . ' role has been deleted');
    }

    public function edit(Role $role)
    {   
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Role $role)
    {
        $inputs = request()->validate([
            'name' => 'required|string|unique:roles'
        ]);
        $inputs['name'] = Str::ucfirst($inputs['name']);
        $slug = Str::slug(request('name'));
        $role->update([
            'name'=>$inputs['name'],
            'slug'=>$slug
        ]);

        return back()->with('role-update', 'Role updated successfully...');
    }
}
