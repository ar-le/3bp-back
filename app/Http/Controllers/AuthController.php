<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoggedUserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use Illuminate\Routing\Controller;
use App\Models\User;

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


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        session()->invalidate();
        return response()->json(['msg' => 'Successfully logged out']);
    }


    public function register(RegisterRequest $request)
    {
        $user = $this->userService->createUser($request->all());
        $this->userService->sendWelcomeEmail($user);
        return response()->json(new LoggedUserResource($user));
    }


    public function availableUsername($username)
    {
        $user = User::where('username', $username)->first();
        return $user ?
            response()->json(['msg' => 'Username taken'], 400) :
            response()->json(['msg' => 'Username available'], 200)
            ;

    }

    //Available email
    public function availableEmail($email)
    {
        $user = User::where('email', $email)->first();
        return $user ?
            response()->json(['msg' => 'email taken'], 400) :
            response()->json(['msg' => 'email available'], 200)
            ;

    }



}
