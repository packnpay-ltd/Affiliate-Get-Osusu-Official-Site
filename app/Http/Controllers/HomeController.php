<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waitlist;
use Illuminate\Support\Facades\Mail;
use App\Mail\WaitlistNotification;



class HomeController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    
}
