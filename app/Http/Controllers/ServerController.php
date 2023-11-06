<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repo\SiteRepo;

class ServerController extends Controller
{
    public function index(SiteRepo $siterepo)
    {
        $server_details = $siterepo->details();

        dd($server_details);
    }
}
