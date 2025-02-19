<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

    public function joinclass()
    {
       
        return view('client/profile/joinclass');
    }

    public function assignment()
    {
       
        return view('client/profile/assignment');
    }

    public function book(Request $request)
    {
        $search = $request->search;
        $userId = Auth::id(); // Get the logged-in user's ID
    
        $ebooks = DB::table('ebook_purchases')
            ->join('users', 'ebook_purchases.user_id', '=', 'users.id')
            ->join('ebooks', 'ebook_purchases.ebook_id', '=', 'ebooks.id')
            ->select(
                'ebook_purchases.*', 
                'ebook_purchases.id as pur_id',
                'ebook_purchases.is_active as pur_is_active', 
                'users.*', 
                'ebooks.*'
            )
            ->where('ebook_purchases.user_id', $userId) // Show only logged-in user's data
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('ebooks.title', 'like', '%' . $search . '%')
                      ->orWhere('users.name', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('ebook_purchases.is_active', 'asc') // Sort by is_active
            ->get();
    
        return view('client/profile/book', compact('ebooks'));
    }

    public function courseplan()
    {
       
        return view('client/profile/courseplan');
    }









    public function showChangePasswordForm()
    {
       
        return view('client/profile/change-Password');
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
    
            return redirect()->route('profile')->with('success_updateProfile', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function updatePassword(Request $request)
{
    // Validate the request
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|confirmed|min:8',
    ]);

    // Check if the current password matches the stored password
    $user = auth()->user();
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Current password is incorrect.');
    }

    // Update the password if everything is valid
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('changePassword')->with('status', 'Password changed successfully.');
}

    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('successLogout', 'Logged out successfully!');
    }
    



}
