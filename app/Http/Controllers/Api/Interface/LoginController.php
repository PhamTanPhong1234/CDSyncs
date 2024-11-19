<?php

namespace App\Http\Controllers\Api\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['message' => 'Login successful!', 'token' => $token, 'user' => $user]);
        }

        return response()->json(['message' => 'Invalid email or password.'], 401);
    }
}
