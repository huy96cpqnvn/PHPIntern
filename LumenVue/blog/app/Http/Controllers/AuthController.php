<?php


namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
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
            $user->password = app('hash')->make($plainPassword);  //mật khẩu đc hash(băm) sau đó mới đưa vào DB
            $user->save();

            ///return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
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

        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    /////Change password
    public function changePassword(Request $request)
    {
        $input = $request->all();
        if (empty(Auth::guard('api')->user()->id)) {
            return response()->json([
                'status' => '403',
                'message' => 'Chua dang nhap'
            ]);
        }
        $userId = Auth::guard('api')->user()->id;
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password'
        ]);
        try {
            if ((Hash::check(\request('old_password'), Auth::user()->password)) == false) {
                $arr = array("status" => 400, "message" => "Old password is not valid", "data" => array());
            } else if ((Hash::check(\request('new_password'), Auth::user()->password)) == true) {
                $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
            } else {
                User::where('id', $userId)->update(['password' => Hash::make($input['new_password'])]);
                $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());

            }
        } catch (\Exception $ex) {
            $arr = array("status" => 400, "message" => "Wrong! Please enter again!", "data" => array());

        }
        return response()->json($arr);
    }


    ////Reset password
    public function sendPasswordResetLink(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Password reset email sent.',
            'data' => $response
        ]);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Email could not be sent to this email address.'
        ]);
    }

    public function callResetPassword(Request $request)
    {
        return $this->reset($request);
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();

        event(new PasswordReset($user));
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Password reset successfully.']);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Failed, Invalid Token.']);
    }


}
