<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Redirect ke Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Login Google gagal. Silakan coba lagi.']);
        }

        // Cari atau buat user
        $user = User::updateOrCreate(
            ['google_id' => $googleUser->getId()],
            [
                'name'              => $googleUser->getName(),
                'email'             => $googleUser->getEmail(),
                'avatar'            => $googleUser->getAvatar(), // Ambil avatar dari Google
                'google_id'         => $googleUser->getId(),
                'email_verified_at' => now(),
                'password'          => bcrypt(str()->random(24)), // password acak jika perlu
                'role'              => 'member', // Default role untuk user Google
            ]
        );

        // Jika user sudah ada tapi belum punya google_id atau avatar
        if (!$user->wasRecentlyCreated && !$user->google_id) {
            $user->update([
                'google_id' => $googleUser->getId(),
                'avatar'    => $googleUser->getAvatar(),
            ]);
        }

        // Cek apakah user teridentifikasi sebagai admin, jika ya, arahkan ke admin panel
        if ($user->hasRole('admin') || $user->hasRole('super_admin')) {
            return redirect()->intended('/admin');
        }

        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
