<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    function dashboard()
    {
       
        $user = Auth::user(); // Get the logged-in user
        return view('client/profile/dashboard', compact('user'));
    }
    public function userDhashboard()
    {
       
        return view('client/profile/userDhashboard');
    }
    public function profile()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('client/profile/profile', compact('user'));
    }
 
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);
    
        try {
            $user = auth()->user();
            $user->update($request->only(['name', 'email', 'phone', 'address']));
    
            return redirect()->route('userDashboard')->with('success_updateProfile', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('successLogout', 'Logged out successfully!');
    }
    



}
