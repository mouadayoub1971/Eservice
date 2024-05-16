<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_id == 3) return view('chef_departement.home')->with('name', "chef_departement");
        if (Auth::user()->role_id == 4) return view('cordinnateur_filier.home')->with('name', "cordinnateur_filier");
        return view('home')->with('name', 'layouts');
    }

    public function about()
    {
        return view('about');
    }
}
