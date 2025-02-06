<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\users;
use App\Models\EbookPurchase;
use App\Models\Ebook;

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

    public function userEbook() {
      $ebooks = Ebook::where('is_active', true)->get();
      return view('client/pages/userEbook', compact('ebooks'));
  }


  public function userShowEbook(Ebook $ebook) {
    $user = Auth::user();
    
    // Check if the user has purchased the eBook and if the purchase is active
    $hasPurchased = $user 
        ? $ebook->purchases()->where('user_id', $user->id)->where('is_active', '2')->exists() 
        : false;

    return view('client/pages/EbookShow', compact('ebook', 'hasPurchased'));
}


public function userShowPdf(Ebook $ebook) {
  $user = Auth::user();
  $hasPurchased = $user ? $ebook->purchases()->where('user_id', $user->id)->exists() : false;
  return view('client/pages/pdfshow', compact('ebook', 'hasPurchased'));
}

public function purchaseEbook(Request $request, Ebook $ebook) {
  $validator = Validator::make($request->all(),[
        'payment_method' => 'required',
        'phone_number' => 'required',
        'transaction_id' => 'required|unique:ebook_purchases',
    ]);
    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
  }


    EbookPurchase::create([
        'user_id' => Auth::id(),
        'ebook_id' => $ebook->id,
        'payment_method' => $request->payment_method,
        'phone_number' => $request->phone_number,
        'transaction_id' => $request->transaction_id,
    ]);

    return redirect()->route('userEbook', $ebook)->with('success', 'Help Line- 018xxxxxxxx Purchase successful! Please wait for approval. Once approved, you will receive an email and can download the full eBook.');
}


    //Backend Code Here form start


    public function userRegister(Request $request)
    {
        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15|unique:users,phone',
            'address' => 'required|string|max:500',
            'password' => 'required|min:8',
        ]);
    
        // Check if validation fails
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
