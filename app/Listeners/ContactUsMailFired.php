<?php

namespace App\Listeners;


use Illuminate\Http\Request;
use App\Events\ContactUsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMailFired
{

    public function __construct()
    {
        //
    }


    public function handle(ContactUsMail $event )
    {
        // Preview the email content
        $emailContent = View::make('mail', ['userData' => $event->userData])->render();
        //  echo $emailContent;


        Mail::send('mail', ['userData' =>$event->userData], function ($message) use ($event) {
            $message->from($event->userData['email']);
            $message->to('admin@gmail.com', 'Admin')->subject($event->userData['subject']);
        });
    }
}
