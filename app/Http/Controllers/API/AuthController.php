<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user || !\Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect!'],
            ]);
        }

        $user->tokens()->delete();
        $token = $user->createToken('token-name', ['server:update'])->plainTextToken;
        return response()->json([
            'message' => 'Success',
            'user' => $user,
            'token' => $token,
        ], Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout success'
        ], Response::HTTP_OK);
    }
}
