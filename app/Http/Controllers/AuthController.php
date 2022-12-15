<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function logout(Request $request) {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out'
        ];
    }


    public function register(Request $request) {

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        

        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user ->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'access_token' => $token
        ];

        return response($response,201);
    }


    public function login(Request $request) {

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        

        ]);

       $user = User::where('email' , $fields['email'])->first();

       if (!$user || !Hash::check($fields['password'],$user->password)) {
        return response ([
            'message' => 'Bad Creds'
        ], 401);

       }

        $token = $user ->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'access_token' => $token
        ];

        return response($response,201);
    }


    public function findid($email) {

        return DB::table('users')->WHERE('email','=',$email)->get();

    }


    
}
