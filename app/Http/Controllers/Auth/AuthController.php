<?php

namespace App\Http\Controllers\Auth;


use App\Models\Student;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use JWTAuth;


class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $student = Student::whereEmail($request->input("email"))->get()->first();
        if ($student->valid == 0) {
            return response()->error('invalid_user', 500);
        }
        try {
            // verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->error('Invalid credentials', 401);
            }
        } catch (\JWTException $e) {
            return response()->error('Could not create token', 500);
        }


        return response()->success(compact('student', 'token'));
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        /* $user = new User;
         $user->name = trim($request->name);
         $user->email = trim(strtolower($request->email));
         $user->password = bcrypt($request->password);
         $user->save();

         $token = JWTAuth::fromUser($user);

         return response()->success(compact('user', 'token'));*/
    }
}
