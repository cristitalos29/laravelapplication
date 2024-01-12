<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Role;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.panel');
    }
    public function get_users()
    {
        $users = User::all();
        return view('admin.panel', compact('users'));
    }
    public function editUser(User $user)
    {
        $roles = Role::all();
        return view('admin.edit', compact('user', 'roles'));
    }
    public function updateUser(Request $request, User $user)
    {
        // Validate and update user details
        $request->validate([
            'name' => 'required|string|max:255',
            // Add validation rules for other fields
        ]);

        $user->update($request->all());

        return redirect()->route('admin.panel')->with('success', 'User updated successfully');
    }
    public function deleteUser(User $user)
    {
        // Delete the user
        $user->delete();

        return redirect()->route('admin.panel')->with('success', 'User deleted successfully');
    }
}
