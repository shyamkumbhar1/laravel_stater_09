<?php

namespace App\Http\Controllers;

use App\Models\City;

use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;
use App\Http\Requests\PmhnpRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;


class PmhnpsController extends Controller
{
  
    public function index()
    {
        // $pmhnps= User::all();
        // $pmhnps = User::orderBy('id','desc')->paginate(5);
        $pmhnps = User::where('is_admin', 0)->orderBy('id', 'desc')->paginate(10);
        // dd($pmhnps);
        return view('Admin.pmhnps.index', compact('pmhnps'));
    }

  
    public function create()
    {
        return view('Admin.pmhnps.create');
    }

   
    public function store(PmhnpRequest $request)
    {
        $pmhnp = new User;
		$pmhnp->name = $request->input('name');
		$pmhnp->email = $request->input('email');
        $pmhnp->save();

        return to_route('pmhnps.index');
    }

 
    public function show($id)
    {
        $pmhnp = User::findOrFail($id);
        $reviews = Review::where('user_id', $id)->get();


   
            $reviewsCount = $reviews->count();

        return view('Admin.pmhnps.show',['pmhnp'=>$pmhnp,'reviews'=>$reviews,'reviewsCount'=>$reviewsCount]);
    }


    public function edit( Request $request , $id)
    {
        

        $user = User::findOrFail($id);
        // dd($user->id);
        // $id = Auth::user()->id;
        // $user = Auth::user();
        $data = RemainingDetails::where('user_id', $id)->get();
        $remaining_filed = json_decode($data, true);
        // $remaining_filed =  $remaining_filed[0];
        $states = State::where("country_id", 254)
        ->get(["name", "id"]);
        $state_of_licensures = json_decode($states,true);


        // dd($remaining_filed[0]);

        $cities = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);
        $states = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);
        $countries= Country::get(["name", "id"]);
        // return view('Admin.pmhnps.edit',['pmhnp'=>$pmhnp]);
        return view('Admin.pmhnps.edit', compact('user', 'remaining_filed','cities','states','countries','state_of_licensures'));

    }

 
    public function update(Request $request)
    {
        // dd($request->all());

        $validator=  $request->validate([
            'address_line1' => 'required',
           'address_line2'=> 'required ',
           'country'=> 'required ',
           'state'=> 'required ',
           'city'=> 'required ',
           'city'=> 'required ',
           'postal_code'=> 'required | digits:5',

        ]);

        $user = Auth::user();




          // Image Upload
       if ($request->hasFile('profile_picture')) {
        $profile_picture_name = $request->file('profile_picture')->getClientOriginalName();


        $ImagePath = $request->file('profile_picture')->storeAs('public/Profile-Picture',$profile_picture_name);

       }
       $defaultImagePath = '';

        $user->name = $request->name;
        $user->professional_title = $request->professional_title;
        $user->phone_number = $request->phone_number;
        $user->professional_license_number = $request->professional_license_number;
        $user->state_of_licensure = $request->state_of_licensure;
        $user->areas_of_expertise = implode(', ',$request->areas_of_expertise); 
        $user->bio = $request->bio;
        $user->profile_picture = ($request->hasFile('profile_picture'))?$ImagePath :$defaultImagePath;
        $user->work_address = $request->work_address;
        $user->address_line1 = $request->address_line1;
        $user->address_line2 = $request->address_line2;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;



        $user->save();

        // dd($user->profile_picture);


        return to_route('pmhnps.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $pmhnp = User::findOrFail($id);
        $pmhnp->delete();

        return to_route('pmhnps.index');
    }
}
