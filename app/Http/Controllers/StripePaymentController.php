<?php

namespace App\Http\Controllers;

use Stripe\Charge;
// use Stripe\Charge;
// use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripePaymentController extends Controller
{

    public function stripe()
    {
        return view('stripe');
    }


    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // Stripe::setApiKey('your_stripe_secret_key');

        Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from LaravelTus.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
