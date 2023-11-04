<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\FindPmhnps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FindPmhnpsController extends Controller
{

    public function findPpmhnps()
    {

        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $data1 = DB::table('users')->paginate(10);
        // dd($data);



    return view('find-pmhnps.index', compact('cities', 'states', 'countries','data1'));

    }
    public function findPpmhnpsPost(Request $request)
    {
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();

        $professionTitle = $request->input('professional_title');
        $country = $request->input('country');
        $state = $request->input('state');
        $city = $request->input('city');
        $postalCode = $request->input('postal_code');

               // // Process the filtered results as needed
        $data1 = DB::table('users');

        if( $request->professional_title){
            $data1 = $data1->where('professional_title', 'LIKE', "%" . $request->professional_title . "%");
        }
        if( $request->country){
            $data1 = $data1->where('country', 'LIKE', "%" . $request->country . "%");
        }
        if( $request->state){
            $data1 = $data1->where('state', 'LIKE', "%" . $request->state . "%");
        }
        if( $request->city){
            $data1 = $data1->where('city', 'LIKE', "%" . $request->state . "%");
        }
        if( $request->postal_code){
            $data1 = $data1->where('postal_code', 'LIKE', "%" . $request->state . "%");
        }

        $data1 = $data1->paginate(10);


        return view('find-pmhnps.index', compact('data1','cities','states','countries'));


    }


}
