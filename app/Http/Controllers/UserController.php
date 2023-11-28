<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);

        return view('profile', compact('user'));
    }


    public function editProfile()
    {
        $user = auth()->user();

        return view('edit-profile', compact('user'));
    }


    public function saveProfile(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'current_password' => ['required', 'min:6', 'max:10', Rules\Password::defaults()],
            'new_password' => ['required', 'min:6', 'max:10', Rules\Password::defaults()],
        ]);

        $user = User::find(auth()->user()->id);
        $isMatch = Hash::check($request->current_password, $user->password);

        if (!$isMatch) {
            return back()->withErrors([
                'current_password' => "Current password didn't match.",
            ])->onlyInput('current_password');
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->new_password),
        ]);

        return back();
    }
}
