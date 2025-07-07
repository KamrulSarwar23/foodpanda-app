<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SSOClientController extends Controller
{
    public function ssoLogin(Request $request)
    {
        try {
            $decrypted = Crypt::decryptString($request->token);
            $data = json_decode($decrypted, true);

            if ($data['expires_at'] < now()->timestamp) {
                return 'Token expired';
            }

            $user = User::where('email', $data['email'])->first();
            if (!$user) {
                return 'User not found in Foodpanda DB';
            }

            Auth::login($user);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return 'Invalid or tampered token!';
        }
    }

    public function ssoLogout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'You have been logged out from both application.');
    }
}
