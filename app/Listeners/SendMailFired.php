<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\SendMail;
use App\Models\TempRegister;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {

        $user = User::find($event->userId)->toArray();
        // dd($user);
// Render the email template
$emailContent = View::make('temp-mail', ['user' => $user])->render();

// Preview the email content
// echo $emailContent;
// dd('test');

        Mail::send('temp-mail',['user' => $user],function($message) use ($user){
            $message->from("shyamkumbhar743@gmail.com");
            $message->to($user['email']);
            $message->subject("Registration Confirmation");
        });

    }
}
