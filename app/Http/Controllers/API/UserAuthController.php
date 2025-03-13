<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{

    // public function register(Request $request){
    // //     $registerUserData = $request->validate([
    // //         'name'=>'required|string',
    // //         'email'=>'required|string|email|unique:users',
    // //         'password'=>'required|min:8'
    // //     ]);
    // //     $user = User::create([
    // //         'name' => $registerUserData['name'],
    // //         'email' => $registerUserData['email'],
    // //         'password' => Hash::make($registerUserData['password']),
    // //     ]);
    // //     return response()->json([
    // //         'message' => 'User Created ',
    // //     ]);
    // // }
    // // public function login(Request $request){
    // //     $loginUserData = $request->validate([
    // //         'email'=>'required|string|email',
    // //         'password'=>'required|min:8'
    // //     ]);
    // //     $user = User::where('email','=',$loginUserData['email'])->first();
    // //     if(!$user || !Hash::check($loginUserData['password'],$user->password)){
    // //         return response()->json([
    // //             'message' => 'Invalid Credentials'
    // //         ],401);
    // //     }
    // //     $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
    // //     return response()->json([
    // //         'access_token' => $token,
    // //     ]);
    // return response()->json([
    //     'message' => 'User Created ',
    // ]);
    // }
    // public function logout(){
    //     // auth()->user()->tokens()->delete();

    //     return response()->json([
    //       "message"=>"logged out"
    //     ]);
    // }
    public function login(Request $request)
    {
        $validated =  $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $emailValidted = $validated['email'];
        $user  =  User::where('email', '=', $emailValidted)->first();
        if (!$user)
            return response()->json(['message' => '!!!!']);

        $token = $user->createToken($user->name);
        return response()->json([
            'message' => 'User login ',$token->plainTextToken
        ]);
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);
        $user = User::create($validatedData);
        return response()->json(['message' => 'le user est cree','id'=> $user->id], 201);
    }
    public function  logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'logout'
        ]);
    }
}
