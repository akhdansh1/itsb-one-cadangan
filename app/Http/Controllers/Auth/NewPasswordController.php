<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class NewPasswordController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $user = User::where('email', $request->email)->first();

            if ($user && $user->role === 'mahasiswa') {
                return redirect()->route('login.mahasiswa')->with('status', __($status));
            } elseif ($user && $user->role === 'dosen') {
                return redirect()->route('login.dosen')->with('status', __($status));
            }

            return redirect()->route('login')->with('status', __($status));
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => __($status)]);
    }
}
