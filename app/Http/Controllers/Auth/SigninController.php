<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class SigninController extends Controller
{
    public function create() {
        return Inertia::render('Auth/Signin', [
        ]);
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'last_name' => ['required', 'max:255'],
            'first_name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        $credentials['password'] = Hash::make($request->password);

        Auth::login(User::create($credentials));

        return redirect('/subscription');
    }
}
