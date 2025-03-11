<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoggedUserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use Illuminate\Routing\Controller;


class AuthController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['msg' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        return response()->json(new LoggedUserResource($user));
    }

    // Logout method
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        session()->invalidate();
        return response()->json(['msg' => 'Successfully logged out']);
    }

    // Register method
    public function register(RegisterRequest $request)
    {
        $user = $this->userService->createUser($request->all());

        return response()->json(new LoggedUserResource($user));
    }



}
