<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request) {
        $credential = $request->validated();

        $user = User::where('email', $credential['email'])->first();

        dump(Hash::check($credential['password'], $user->password));

        if ($user && Hash::check($credential['password'], $user->password) && $user->profile_type == 'staff') {
            $token = $user->createToken('api-token');

            return response()->json([
                'data' => [
                    'user' => $user,
                    'token' => $token->plainTextToken,
                    'expires_at' => $token->accessToken->expires_at
                ]
            ], 201);
        }

        return response()->json([
            'message' => 'Thông tin đăng nhập không chính xác!'
        ], 401);
    }
}
