<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        if (!Auth::attempt($req->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        $token = $req->user()->createToken('api_token')->plainTextToken;
        return [
            'user' => $req->user(),
            'token' => $token
        ];
    }
    public function me(Request $req)
    {
        return $req->user();
    }
    public function logout(Request $req)
    {
        $req->user()->tokens()->delete();
        return ['message' => 'Logged out'];
    }
}
