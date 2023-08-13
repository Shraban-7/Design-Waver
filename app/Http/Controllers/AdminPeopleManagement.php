<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminPeopleManagement extends Controller
{
    public function index()
    {
        return view('admin.admin_pages.add_user');
    }
    public function user_create()
    {
        return view('admin.admin_pages.add_customer');
    }

    public function user_store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        //$user->save();

        event(new Registered($user));

        //Auth::login($user);

        return redirect()->route('admin.user_list');


    }

    public function user_list()
    {
        $users= User::all();
        return view('admin.admin_pages.user_list')->with('users',$users);
    }
}
