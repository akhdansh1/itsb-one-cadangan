<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        return match ($user->role) {
            'mahasiswa' => redirect()->route('dashboard.mahasiswa'),
            'dosen'     => redirect()->route('dashboard.dosen'),
            default     => redirect()->route('dashboard'),
        };
    }
}
