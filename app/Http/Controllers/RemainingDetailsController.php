<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;
use Illuminate\Support\Facades\DB;

class RemainingDetailsController extends Controller
{



    public function create()
    {
      
        $cities = City::all();
       
        $states = State::all();
        $state_of_licensures = json_decode($states,true);

        $countries = Country::all();
        $data1 = DB::table('users')->paginate(10);

        // dd(json_decode($states,true));
       


     
    return view('user.remaining-field', compact('cities', 'states', 'countries','data1','state_of_licensures'));

    }


    public function store(Request $request)
    {
        // dd($request->all());
        $user_id =auth()->user()->id;
        $request->validate([

            'user_id' => 'required',
            'phone_number' => 'required|numeric',
            'professional_license_number' => 'required',
            'state_of_licensure' => 'required',
            'areas_of_expertise' => 'required',
            'bio' => 'required',
            'profile_picture' => '',
            "address_line1" => 'required',
                  "address_line2" => 'required',
                  "country" => 'required',
                  "state" => 'required',
                  "city" => 'required',
                  "postal_code" => 'required |numeric|digits:5',
            
        ]);

 

 
        // Image Upload
       if ($request->hasFile('profile_picture')) {
        $profile_picture_name = $request->file('profile_picture')->getClientOriginalName();

        $request->file('profile_picture')->storeAs('public/Profile-Picture',$profile_picture_name);
        $ImagePath = 'storage/Profile-Picture/' . $profile_picture_name;
       }

        $defaultImagePath = "storage/Profile-Picture/default-image.jfif";
// <<<<<<< HEAD
        $value_areas_of_expertise=$request->areas_of_expertise;
         $implode_areas_of_expertise=implode(', ',$value_areas_of_expertise);
          $trim_areas_of_expertis=rtrim($implode_areas_of_expertise, ', ');
// =======

// >>>>>>> f0475ebe9c5b48cc175b0ec7d851ed00e3193311
        $RemainingDetails = RemainingDetails::create(
            [
                'user_id' => $request->user_id,
                'phone_number' => $request->phone_number,
                'phone_number' => $request->phone_number,
                'professional_license_number' => $request->professional_license_number,
               'state_of_licensure' => $request->state_of_licensure,
                'areas_of_expertise' => $trim_areas_of_expertis,
                'bio' => $request->bio,
                'profile_picture' => ($request->hasFile('profile_picture'))? $ImagePath :$defaultImagePath,
                'work_address' => $request->work_address,
                
                  "address_line1" => $request->address_line1,
                  "address_line2" => $request->address_line2,
                  "country" => $request->country,
                  "state" => $request->state,
                  "city" => $request->city,
                  "postal_code" => $request->postal_code,
            ]
        );

        // Save Data To session
        $request->session()->put('remainingDetails', [
            'user_id' => $request->user_id,
            'phone_number' => $request->phone_number,
            'professional_license_number' => $request->professional_license_number,
            'state_of_licensure' => $request->state_of_licensure,
            'areas_of_expertise' => implode(', ',$request->areas_of_expertise),
            'bio' => $request->bio,
            'profile_picture' => ($request->hasFile('profile_picture'))?$ImagePath :$defaultImagePath,
            "address_line1" => $request->address_line1,
            "address_line2" => $request->address_line2,
            "country" => $request->country,
            "state" => $request->state,
            "city" => $request->city,
            "postal_code" => $request->postal_code,
        ]);

        // fetch Data from session
        $remainingDetails_session = $request->session()->get('remainingDetails');

        // dd($RemainingDetails , $remainingDetails_session,$remainingDetails_session['profile_picture']);




// Update User Remaining data
        $user = User::findOrFail($user_id);

        if ($user ) {
            $user->phone_number = $remainingDetails_session['phone_number'];
            $user->professional_license_number =$remainingDetails_session['professional_license_number'];
            $user->state_of_licensure = $remainingDetails_session['state_of_licensure'];
            $user->areas_of_expertise = $remainingDetails_session['areas_of_expertise'];
            $user->bio = $remainingDetails_session['bio'];
            $user->profile_picture = $remainingDetails_session['profile_picture'];
            $user->address_line1 =$remainingDetails_session['address_line1'];
            $user->address_line2 =$remainingDetails_session['address_line2'];
            $user->country =$remainingDetails_session['country'];
            $user->state =$remainingDetails_session['state'];
            $user->city =$remainingDetails_session['city'];
            $user->city =$remainingDetails_session['city'];
            $user->postal_code =$remainingDetails_session['postal_code'];
            $user->save();
        }


        // dd($user ,$user_id);
        return to_route('user.Dashboard');
    }


}