<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        // dd($user->id);
        return view('auth.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'phone_number' => 'required',

        ]);
        // $user->update($request->all());
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->professional_title = $request->professional_title;
        // $user->email = $request->email;
        // $user->password = $request->password;
        $user->phone_number = $request->phone_number;
        $user->professional_license_number = $request->professional_license_number;
        $user->state_of_licensure = $request->state_of_licensure;
        $user->areas_of_expertise = $request->areas_of_expertise;
        $user->bio = $request->bio;
        $user->profile_picture = $request->profile_picture;
        $user->work_address = $request->work_address;





        $user->save();
        return redirect()->route('dashboard')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
