<?php

namespace App\Http\Controllers\User;

use Throwable;
use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Review;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Yaml\Exception\ParseException;

class UserDashboardController extends Controller
{

    public function index(Request $request)
    {
        $cities = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);
        $states = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);
        $countries = Country::get(["name", "id"]);


        return view('user.user-Dashboard', compact('cities', 'states', 'countries'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit(Request $request)
    {
        
       
        
        $id = Auth::user()->id;

        $user = Auth::user();
        $data = RemainingDetails::where('user_id', $id)->get();
        $remaining_filed = json_decode($data, true);
        // $remaining_filed =  $remaining_filed[0];
        $states = State::where("country_id", 254)
        ->get(["name", "id"]);
        $state_of_licensures = json_decode($states,true);
        $old_country = Country::where('id', $user->country)->first();
        $old_state = State::where('id', $user->state)->first();
        $old_city = City::where('id', $user->city)->first();

// dd($old_state);
    

        $cities = City::where("state_id", $request->state_id) ->get(["name", "id"]);
        $states = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);
        $countries= Country::get(["name", "id"]);
        return view('user.user-Dashboard-edit', compact('user', 'remaining_filed','cities','states','countries','state_of_licensures','old_country','old_state','old_city'));
    }


    public function update(Request $request)
    {
       
      
     
        $validator=  $request->validate([
            'address_line1' => 'required',
           'address_line2'=> 'required ',
           'country'=> 'required ',
           'state'=> 'required ',
           'city'=> 'required ',
           'city'=> 'required ',
           'postal_code'=> 'required | digits:5',

        ]);
      
        if ($request->user_id) {
            // return "admin";
        $user = User::where('id',$request->user_id)->first();


        } else {
            // return "user";
        $user = Auth::user();



        }
        
          // Image Upload
       if ($request->hasFile('profile_picture')) {
        $profile_picture_name = $request->file('profile_picture')->getClientOriginalName();


         $request->file('profile_picture')->storeAs('public/Profile-Picture',$profile_picture_name);
         $ImagePath = 'storage/Profile-Picture/' . $profile_picture_name;
        // //  $ImagePath = 'storage/Profile-Picture/Test-cards-Stripe-Documentation.png';
        // dd($ImagePath);
       }
       $defaultImagePath = '';

        $user->name = $request->name;
        $user->professional_title = $request->professional_title;
        $user->phone_number = $request->phone_number;
        $user->professional_license_number = $request->professional_license_number;
        $user->state_of_licensure = $request->state_of_licensure;
        $user->areas_of_expertise = implode(', ',$request->areas_of_expertise); 
        $user->bio = $request->bio;
        $profile_picture1 = $request->profile_picture1;
        $user->profile_picture = ($request->hasFile('profile_picture'))?$ImagePath :$profile_picture1;
        $user->work_address = $request->work_address;
        $user->address_line1 = $request->address_line1;
        $user->address_line2 = $request->address_line2;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;



        $user->save();

        // dd($user->profile_picture);
        // dd($user);
        if ($request->user_id) {
        
            return to_route('pmhnps.index')->with('success', 'User updated successfully');

        } else {
      
            return to_route('user.Dashboard')->with('success', 'User updated successfully');


        }
    
        
    }


    public function mySubscription()
    {
        $user = auth()->user();
        $subscriptions = Subscription::where('user_id', auth()->id())->get();
        $plan = DB::table('plans')->select('*')->where('plan_id','=','plan_OAMVLXAQNjx2Wp')->first(); 

        // dd($user->id,$plan->amount);

        return view('user.my-subscription', compact('subscriptions','plan'));
    }
    public function myReviews()
    {
        $user_id = auth()->user()->id;
        // dd($user_id);
        $reviews = Review::where('user_id',$user_id)->get();
        return view('user.my-reviews',compact('reviews'));
    }  
     public function myProfile()
    {
        $user_id = auth()->user()->id;
        // dd($user_id);
        $reviews = Review::where('user_id',$user_id)->get();
        return view('user.my-profile',compact('reviews'));
    }
}
