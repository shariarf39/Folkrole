<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    function adminLogin()
    {
        return view('admin/pages/adminLogin');
    }
    public function adminDashboard()
    {
        
        return view('admin/adminDashboard');
    }

    public function adminmenu()
    {
        
       
        return view('admin/component/dashboard');
    }
    public function admin()
    {
        
        $admins = Admin::all();
        return view('admin/pages/admin', compact('admins'));
    }

    public function plogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('adminDashboard')->with('successAdmin', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function adminlogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('adminlogin')->with('successAdmin', 'Logged out successfully!');
    }


    //admin

     // Change the admin status (active/deactive)
     public function adminchangeStatus(Request $request)
     {
         $admin = Admin::find($request->id);
         $admin->is_active = $request->status;
         $admin->save();
 
         return redirect()->route('admin')->with('sucess', 'Admin added successfully.');
     }
 
     // Add a new admin
     public function addAdmin(Request $request)
     {
         // Validate the request data
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:admins',
             'password' => 'required|string|min:8|confirmed',  
         ]);
         
         // Create a new admin
         Admin::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password), 
             'is_active' => 1, 
         ]);
         
         // Redirect with success message
         return redirect()->route('admin')->with('success', 'Admin added successfully.');
     }
     


     public function deleteAdmin(Request $request)
{
    $admin = Admin::find($request->id);

    if ($admin) {
        $admin->delete();
         return redirect()->route('admin')->with('sucess', 'Admin added successfully.');
    }

   
}

     
}
