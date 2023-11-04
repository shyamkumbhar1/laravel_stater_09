<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TempRegister;
use Illuminate\Http\Request;

class RegistrationStepsController extends Controller
{
    public function createStepOne(Request $request)
    {


        return view('Registration.create-step-one');
    }

    public function postCreateStepOne(Request $request)
    {

        $validatedData = $request->validate([
            'full_name' => 'required',
            'professional_title' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        $user = new User();

        $request->session()->put('user', $user);
        $user = $request->session()->get('user');
        $user->fill($validatedData);
        $request->session()->put('user', $user);



        return redirect()->route('create.step.two');
    }
    public function createStepTwo(Request $request)
    {
        $user = new User();
        $UserData = $request->session()->get('user');
        // dd($UserData);
        return view('Registration.create-step-two', compact('UserData'));
    }

    public function postCreateStepTwo(Request $request)
    {

        $validatedData = $request->validate([
            'full_name' => 'required',

        ]);

        $user = $request->session()->get('user');
        $user->fill($validatedData);
        $request->session()->put('UserData', $user);

        return redirect()->route('create.step.three');
    }
    public function createStepThree(Request $request)
    {
        $UserData = $request->session()->get('user');

        return view('Registration.create-step-three',compact('UserData'));
    }

    public function postCreateStepThree (Request $request)
    {

        $validatedData = $request->validate([
            'full_name' => 'required',

        ]);

        $user = $request->session()->get('user');
        $user->fill($validatedData);
        $request->session()->put('UserData', $user);

        return "User Register Successfully";
    }

}
