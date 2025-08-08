<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class AdminResetPasswordController extends Controller
{
    /**
     * Menampilkan form reset password.
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.admin-reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /**
     * Memproses permintaan reset password.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Gunakan broker 'admins' untuk mereset password
        $status = Password::broker('admins')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        // Redirect berdasarkan status reset
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                          ->withErrors(['email' => __($status)]);
    }
}
