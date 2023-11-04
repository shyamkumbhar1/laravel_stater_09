<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan as ModelsPlan;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // return view('home');
        $basic = ModelsPlan::where('name', 'basic')->first();
        $user = auth()->user();

        $professional = ModelsPlan::where('name', 'professional')->first();
        $enterprise = ModelsPlan::where('name', 'enterprise')->first();
        return view('home', compact('basic', 'professional', 'enterprise', 'user'));
    }
    public function adminHome()
    {
        return view('Admin.adminHome');
    }
    public function adminPmhnps()
    {
        return view('Admin.pmhnps');
    }
     public function adminPatients()
    {
        return view('Admin.patients');
    }
}
