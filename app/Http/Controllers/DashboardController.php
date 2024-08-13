<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }

        return view('dashboard');

    }
}
