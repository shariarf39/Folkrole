<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('client/profile/profile', compact('user'));
    }


}
