<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function homePage()
    {
        return view('welcome');
    }
      function userLogin()
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
}
