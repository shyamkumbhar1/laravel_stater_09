<?php

namespace App\Http\Controllers;


use App\Events\SendMail;
use App\Models\TempRegister;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;

class TempRegisterController extends Controller
{
    public function registerStepOne()
    {


        return view('register.step1');
    }
    public function postRegisterStepOne(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required',
            'professional_title' => 'required',
            'email' => 'required |email:rfc |unique:temp_registers',
            'password' => 'min:8|confirmed',
            'password_confirmation' => 'min:8'
        ]);



        $temp_user = new TempRegister();
        $temp_user->name = $validatedData['name'];
        $temp_user->professional_title = $validatedData['professional_title'];
        $temp_user->email = $validatedData['email'];
        $temp_user->password = Hash::make($validatedData['password']);





        $temp_user->save();

        $request->session()->put('user_id', $temp_user->id);

        // //  Send mail to admin
        // if($temp_user){
        //     Event::dispatch(new SendMail($temp_user->id));

        // }

        return to_route('plans.all')->with('success', 'User created successfully.');
    }

    public function index (Request $request){
        $temp_pmhnps = TempRegister::orderBy('id','desc')->paginate(10);
    
        return view('Admin.temp-pmhnps.index', compact('temp_pmhnps'));
       
    }
    public function destroy(Request $request , $id)
    {
     
        $pmhnp = TempRegister::findOrFail($id);
        
        $pmhnp->delete();

        return to_route('temp-pmhnps.index');
    }
}
