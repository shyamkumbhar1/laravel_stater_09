<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function fetchData(Request $request)
    {

        $data = User::all();
        return response()->json($data);
    }
    public function index(Request $request)
    {
        return view('ajax-call');

    }
}
