<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Rules\ReCaptchaRule;


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
            //'recaptcha' => ['required', new ReCaptchaRule('login')],
        ]);
        $credentials = [
            'email' =>  $request->email,
            'password' =>  $request->password,
        ];
        // return Auth::attempt($credentials);
        if (Auth::attempt($credentials)) {
            if (Auth()->user()->status == 1) {
                $request->session()->regenerate();

                return ['status' => true, 'message' => 'Login Successfull', 'redirect_url' => url('/') . '/dashboard'];
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return ['status' => false, 'message' => 'Sorry, Your account has not been active.'];
            }
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

    public function submitForgetPasswordForm(Request $request)
    {
        //return $request->all();
        $input = $request->only(['email', 'recaptcha']);
        $validate_data = [
            'email' => 'required|email|exists:users',
            'recaptcha' => ['required', new ReCaptchaRule('forgotpassword')],
        ];

        $validator = Validator::make($input, $validate_data);
        if ($validator->fails()) {

            return ['status' => false, 'message' =>  $validator->errors()->first()];
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        try {
            Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });

            if (Mail::failures()) {
                return ['status' => false, 'message' => 'failed'];
            }
        } catch (Throwable $ex) {
            // Log::error($ex);

            return ['status' => false, 'message' => $ex];
        }

        return ['status' => true, 'message' => 'We have e-mailed your password reset link!', 'link' => route('reset.password.get', $token)];
    }

    public function showResetPasswordForm($token)
    {
        return view('login.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'recaptcha' => ['required', new ReCaptchaRule('forgotpasswordlink')],
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {

            return ['status' => false, 'message' => 'Invalid token!'];
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return ['status' => true, 'message' => 'Your password has been changed!', 'link' => url('/')];
    }
}
