<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function registration_page() {
        $type = 'register';

        return view('auth', [
            'type' => $type,
        ]);
    }

    public function login_page() {
        $type = 'login';
        
        return view('auth', [
            'type' => $type,
        ]);
    }

    public function login(Request $request) {
        // get and validation data
        $form = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // checking
        if (auth()->attempt($form)) {
            // regenerate session
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return back() -> withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
    }

    public function registration(Request $request) {
        // get and validation data
        $form = $request->validate([
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
        ]);

        // generate password 
        $form['password'] = bcrypt($form['password']);

        // create new user
        $user = User::create([
            'username' => $form['username'],
            'email' => $form['email'],
            'password' => $form['password'],

            'liked_products' => '',
            'trash' => '',
            'isAdmin' => false
        ]);

        // login
        auth() -> login($user);

        return redirect('/');
    }

    public function logout(Request $request) {
            auth() ->logout();
            return redirect('/login');
    }
}
