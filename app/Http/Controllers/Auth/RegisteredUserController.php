<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\TempRegister;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
                $user_id = $request->session()->get('user_id');
        $temp_User = TempRegister::where('id', $user_id)->first();
        $request->validate([
            'phone_number' => 'required',
            'professional_license_number' => 'required',
            'state_of_licensure' => 'required',
            'areas_of_expertise' => 'required',
            'bio' => 'required',
            'profile_picture' => '',
            'work_address' => 'required'
        ]);

        // Image Upload
        // $profile_picture_name = $request->file('profile_picture')->getClientOriginalName();


        // $path = $request->file('profile_picture')->store('public/Profile-Picture');
        // dd($request->profile_picture,$profile_picture_name,$path);

        $defaultImagePath = "public/Profile-Picture/pgBeIZNuHOeTh953DjfA2hOwSfBwQd7ixDameesb.png";

        $user = User::create(
            [
                'full_name' => $temp_User->full_name,
                'professional_title' => $temp_User->professional_title,
                'email' => $temp_User->email,
                'password' => $temp_User->password ,
                'phone_number' => $request->phone_number,
                'professional_license_number' => $request->professional_license_number,
               'state_of_licensure' => $request->state_of_licensure,
                'areas_of_expertise' => implode($request->areas_of_expertise),
                'bio' => $request->bio,
                'profile_picture' => $defaultImagePath, // $profile_picture_name,
                'work_address' => $request->work_address
            ]
        );

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
