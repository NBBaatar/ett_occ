<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth ::attempt($credentials)) {
            $request -> session() -> regenerate();

            $user = Auth ::user();

            if ($user -> isIt()) {
                return redirect() -> route('filament.it.pages.dashboard');
            }
            if ($user -> isAdmin()) {
                return redirect() -> route('filament.admin.pages.dashboard');
            }
            if ($user -> isCard() || $user -> isClient()) {
                return redirect() -> route('filament.app.pages.dashboard');
            }
//            if ($user -> isClient()) {
//                return redirect() -> route('filament.app.pages.dashboard');
//            }
            if ($user -> isTech()) {
                return redirect() -> route('filament.tech.pages.dashboard');
            }

//            return redirect() -> route('/');
//dd($credentials);
        }
        return back() -> withErrors([
            'email' => 'Имэйл эсвэл нууц үг буруу байна.',
        ]) -> onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth ::logout();
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        // Filament-ээс гарвал ерөнхий login хуудасруу чиглүүлэх
        return redirect() -> route('login');
    }
}
