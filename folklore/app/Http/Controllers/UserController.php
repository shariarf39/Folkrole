<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\users;

class UserController extends Controller
{
    //
    function homePage()
    {
        return view('welcome');
    }
      function login()
    {
        return view('client/pages/login');
    }
      function userregistration()
    {
        return view('client/pages/registration');
    }
      function contactus()
    {
        return view('client/pages/contactus');
    }
      function management()
    {
        return view('client/pages/management');
    }
      function newsevent()
    {
        return view('client/pages/newsevent');
    }
      function gallerysec()
    {
        return view('client/pages/gallerysec');
    }
      function donate()
    {
        return view('client/pages/donate');
    }
      function Publications()
    {
        return view('client/pages/Publications');
    }
      function aboutpage()
    {
        return view('client/pages/aboutpage');
    }


    //Backend Code Here form start


    public function userRegister(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }
        // Store the user in the database
        users::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password), // Encrypt password
        ]);

       
        return redirect()->route('login')->with('success', 'Account created successfully!');

    }

    //Login System
   

    // Handle the login logic
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('userDhashboard')->with('successLogin', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Handle logout
  
}
