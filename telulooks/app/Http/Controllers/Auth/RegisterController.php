<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $latestUser = User::orderBy('id_user', 'desc')->first();
        $idNumber = $latestUser ? (int)substr($latestUser->id_user, 2) + 1 : 1;
        $newId = 'us' . str_pad($idNumber, 3, '0', STR_PAD_LEFT);

        $user = User::create([
            'id_user' => $newId,
            'nama' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')
            ->with('success', 'Registration successful! Please login.');
    }
}
