<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function profile(User $user) {
        $roles = Role::all();
        return view('admin.user.profile', compact('user', 'roles'));
    }

    public function update(User $user) {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['file'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password'
        ]);

        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
            $user->avatar = $inputs['avatar'];
        }

        $user->name = $inputs['name'];
        $user->username = $inputs['username'];
        $user->email = $inputs['email'];
        // $user->password = $inputs['password'];
        $user->update();
        return back();
    }

    public function attachRole(User $user) {
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detachRole(User $user) {
        $user->roles()->detach(request('role'));
        return back();
    }

    public function destroy(User $user) {
        $user->delete();
        session()->flash('user-delete-message', 'User has been deleted....');
        return back();
    }
}
