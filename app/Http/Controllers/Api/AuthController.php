<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\Staff;
use App\Models\Stuff;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $uuid = $request->input('uuid') ?? null;
            $username = $request->input('username') ?? null;
            $email = $request->input('email') ?? null;
            $password = $request->input('password') ?? null;
            $pin = $request->input('pin') ?? null;

            $user = User::where(['email' => $email])->first();

            if (!$user) {
                return response()->json(['data' => ['user' => null, 'token' => null], 'error' => ['message' => 'user not found']], 200);
            }

            if (Hash::check($password, $user->password)) {

                $token = $user->createToken('user_token')->plainTextToken;

                return response()->json(['data' => ['user' => $user, 'token' => $token], 'error' => false], 200);
            }

            return response()->json(['data' => ['user' => null, 'token' => null], 'error' => ['message' => 'wrong password']], 200);
        } catch (\Exception $e) {
            return response()->json(['data' => ['user' => null, 'token' => null], 'error' => [$e, 'message' => $e->getMessage(),]], 200);
        }
    }

    public function logout(Request $request)
    {
        try {
            $id = Auth::id();
            $user = User::where('id', $id)->first();

            if ($user) {
                $user->tokens()->delete();
                return response()->json(['data' => ['user' => null, 'token' => null], 'error' => false], 200);
            }

            $uuid = $request->input('uuid');
            $user = User::where('uuid', $uuid)->first();

            if ($user) {
                $user->tokens()->delete();
                return response()->json(['data' => ['user' => null, 'token' => null], 'error' => false], 200);
            }

            return response()->json(['data' => ['user' => null, 'token' => null], 'error' => ['message' => 'user not found']], 200);
        } catch (\Exception $e) {

            return response()->json(['data' => ['user' => null, 'token' => null], 'error' => [$e, 'message' => $e->getMessage()]], 200);
        }
    }

    public function user(Request $request)
    {
        try {
            $id = Auth::id();
            $token = $request->input('token');

            $user = User::findOrFail($id);

            if (!$user) {
                return response()->json(['data' => ['user' => null, 'token' => null], 'error' => ['message' => 'user not found']], 200);
            }

            $token = $user->createToken('user_token')->plainTextToken;


            return response()->json(['data' => ['user' => $user, 'token' => $token], 'error' => false], 200);
        } catch (Exception $e) {
            return response()->json(['data' => ['user' => null, 'token' => null], 'error' => [$e, 'message' => $e->getMessage()]], 200);
        }
    }

    public function pin(Request $request)
    {
        try {
            $uuid = $request->input('uuid') ?? null;
            $username = $request->input('username') ?? null;
            $email = $request->input('email') ?? null;
            $password = $request->input('password') ?? null;
            $pin = $request->input('pin') ?? null;

            $user = User::where(['uuid' => $uuid])->first();

            if (!$user) {
                return response()->json(['data' => ['user' => null, 'token' => null], 'error' => ['message' => 'user not found']], 200);
            }

            if (MD5($pin) == $user->pin) {

                $token = $user->createToken('user_token')->plainTextToken;


                return response()->json(['data' => ['user' => $user, 'token' => $token], 'error' => false], 200);
            }

            return response()->json(['data' => ['user' => null, 'token' => null], 'error' => ['message' => 'wrong pin']], 200);
        } catch (Exception $e) {
            return response()->json(['data' => ['user' => null, 'token' => null], 'error' => [$e, 'message' => $e->getMessage()]], 200);
        }
    }
}
