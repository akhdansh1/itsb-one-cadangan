<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect ke halaman login Google.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Callback dari Google setelah otentikasi.
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name'     => $googleUser->getName(),
                    'password' => bcrypt(str()->random(16)), // dummy password
                    'role'     => $this->determineRole($googleUser->getEmail()),
                ]
            );

            Auth::login($user);

            return match ($user->role) {
                'mahasiswa' => redirect()->route('dashboard.mahasiswa'),
                'dosen'     => redirect()->route('dashboard.dosen'),
                default     => redirect()->route('dashboard'),
            };

        } catch (\Exception $e) {
            return redirect()->route('login.mahasiswa')->with('error', 'Google login gagal: ' . $e->getMessage());
        }
    }

    /**
     * Menentukan role berdasarkan domain email.
     * Bisa kamu kembangkan misalnya pakai prefix juga.
     */
    protected function determineRole(string $email): string
    {
        return str_ends_with($email, '@dosen.univ.ac.id') ? 'dosen' : 'mahasiswa';
    }
}
