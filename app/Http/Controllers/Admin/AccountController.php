<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;

class AccountController extends Controller
{
    public function edit(): Response
    {
        return Inertia::render('Admin/Account');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(12)->letters()->numbers()],
        ]);
        $request->user()->forceFill(['password' => $validated['password'], 'remember_token' => null])->save();
        $request->session()->regenerate();

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
