<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index($user)
    {
        // dd($user); #echo whatever user is and stop all operation

        $user = User::findOrFail($user);
        
        return view('welcome', [
            'user' => $user,
        ]);
    }
}
