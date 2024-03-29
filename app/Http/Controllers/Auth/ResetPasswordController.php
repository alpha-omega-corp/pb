<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm($token)
    {
        $item = DB::table('password_resets')->where('token', $token)->first();
        return view('auth.passwords.reset', [
            'email' => $item->email,
            'token' => $token
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:4',
            'password_confirmation' => 'required|min:4',
        ]);

        $password = $request->get('password');
        $confirmation = $request->get('password_confirmation');

        if ($password === $confirmation) {
            User::where('email', $request->get('email'))->update(['password' => bcrypt($password)]);

            return redirect()->route('guest')->with('success', 'Password has been reset successfully');
        }

        return redirect()->back();
    }
}
