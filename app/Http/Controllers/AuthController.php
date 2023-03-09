<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {

        return view('login.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $credentials = [
            'email' =>  $request->email,
            'password' =>  $request->password,
        ];

        if (Auth::attempt($credentials)) {
            //  return Auth()->user();
            $request->session()->regenerate();

            return ['status' => true, 'message' => 'Login Successfull', 'redirect_url' => url('/') . '/dashboard'];
        } else {
            return ['status' => false, 'message' => 'Sorry, the email or password is incorrect, please try again.'];
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function forgotpassword()
    {

        return view('login.forgotpassword');
    }
}
