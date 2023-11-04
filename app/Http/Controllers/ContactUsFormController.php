<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Events\ContactUsMail;
use Illuminate\Support\Facades\Event;

class ContactUsFormController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request)
    {
        return view('contact');
    }
    // Store Contact Form data
    public function ContactUsForm(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject' => 'required',
            'message' => 'required',
            // 'captcha' => 'required|captcha'

        ]);
        //  Store data in database
        Contact::create($request->all());

        //  Send mail to admin
        $data =array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message')
        );

        Event::dispatch(new ContactUsMail($data));
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }


    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
