<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;


class AuthController extends Controller
{
    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        try {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->save();

            ///return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED' ], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email','password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function sendPasswordResetLink(Request $request){
        return $this->sendResetLinkEmail($request);
    }
}
