<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function editProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('edit_profile', ['user' => $user]);
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $formfields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'avatar' => ['max:2000']
        ]);

        $formfields['password'] = bcrypt($formfields['password']);

        if ($request->hasFile('avatar')) {
            $formfields['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user = User::create($formfields);
        Auth::login($user);

        return redirect('/')->with('message', 'You registered successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You logged out successfully!');
    }

    public function authenticate(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You logged in successfully!');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function update(Request $request)
    {
        $formfields = $request->validate([
            'name' => ['required', 'min:3'],
            'avatar' => ['max:2000']
        ]);

        if ($request->hasFile('avatar')) {
            $formfields['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        User::where('id', Auth::user()->id)->update($formfields);

        return back()->with('message', 'You updated profile successfully!');
    }
}
