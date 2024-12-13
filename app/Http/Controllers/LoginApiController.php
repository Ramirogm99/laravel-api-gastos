<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginValidate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginApiController extends Controller
{
    //
    public function login(Request $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
        $user = auth()->user();
        $token = $this->createToken($user);
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
    public function logout() {
        auth()->logout();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
    private function createToken($user) {
        return bcrypt($user->email . $user->password);
    }
}
