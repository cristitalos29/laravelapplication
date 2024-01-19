<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user-roles', ['users' => $users]);
    }

    public function update(Request $request, $id)
    {
        // Validare request, similar cu metoda changePassword
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Găsirea utilizatorului după ID
        $user = User::find($id);

        // Verificare dacă utilizatorul a fost găsit
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User not found.');
        }

        // Actualizarea parolei și salvarea utilizatorului
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('user.index')->with('success', 'Password changed successfully!');
    }
}
