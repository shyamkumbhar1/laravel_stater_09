<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use Exception;
use Stripe\Plan;
use App\Events\SendMail;
use App\Models\TempRegister;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Plan as ModelsPlan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
class PlanController extends Controller
{
    public function singleChargeGet(Request $request)
    {

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $intent = \Stripe\SetupIntent::create();
        return view('plan.strip.single-charge',[

        'intent' => $intent,
        ]
    );

    }
    public function singleCharge(Request $request)
    {

        $ammount = $request->ammount;
        $ammount = $ammount * 100 ;
        $paymentMethod = $request->payment_method;

        $user = new User();
        $user->createOrGetStripeCustomer();
       $paymentMethod = $user->addPaymentMethod($paymentMethod);

        $user->charge($ammount,$paymentMethod->id);

        return  to_route('thankyou');

    }
    public function showPlanForm()


    {
        return view('strip.plans.create');
    }
    public function savePlan(Request $request)
    {
        // return $request->all();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // Stripe::setApiKey(config('services.strip.secret'));
        $amount = ($request->amount * 100);
        // dd($amount);
        try {
            $plan = Plan::create([
                'amount' => $amount,
                'currency' => $request->currency,
                'interval' => $request->billing_period,
                'interval_count' => $request->interval_count,
                'product' => [
                    'name' => $request->name
                ]
            ]);

            // dd($plan->amount);
            ModelsPlan::create([
                'plan_id' => $plan->id,
                'name' => $request->name,
                'amount' => $plan->amount,
                'billing_methode' => $plan->interval,
                'currency' => $plan->currency,
                'interval_count' => $plan->interval_count,

            ]);
        } catch (Exception $th) {
            dd($th->getMessage());
        }
        return "Success";
    }
}
