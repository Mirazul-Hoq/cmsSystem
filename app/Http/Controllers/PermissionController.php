<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Str;
use Redirect;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permission.index', ['permissions'=>Permission::all()]);
    }

    public function store()
    {
        $inputs = request()->validate([
            'name' => 'required|string|unique:roles',
        ]);

        $slug = Str::slug(request('name'));
        $inputs['name'] = Str::ucfirst($inputs['name']);

        Permission::create([
            'name'=>$inputs['name'],
            'slug'=>$slug
        ]);
        return back();
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('permission-delete', $permission->name . ' permission has been deleted');
    }

    public function edit(Permission $permission)
    {   
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Permission $permission)
    {
        $inputs = request()->validate([
            'name' => 'required|string|unique:roles'
        ]);
        $inputs['name'] = Str::ucfirst($inputs['name']);
        $slug = Str::slug(request('name'));
        $permission->update([
            'name'=>$inputs['name'],
            'slug'=>$slug
        ]);

        return Redirect::route('permission.index')->with('permission-update', 'Permission updated successfully...');
    }

    public function attachPermission(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detachPermission(Role $role)
    {
        $role->permissions()->detach(request('permission'));
        return back();
    }
}
