<?php

namespace App\Http\Controllers;
use Exception;
use Stripe\Plan;
use Stripe\Stripe;
use App\Models\User;
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
class SubscriptionController extends Controller
{
    public function singleChargeGet(Request $request)
    {

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $intent = \Stripe\SetupIntent::create();
        return view('strip.single-charge',[

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
    public function allPlan()
    {
        $basic = ModelsPlan::where('name', 'basic')->first();
        // dd($basic);
        $professional = ModelsPlan::where('name', 'professional')->first();
        $enterprise = ModelsPlan::where('name', 'enterprise')->first();
        return view('strip.plans', compact('basic', 'professional', 'enterprise'));
    }

    public function checkout($planId)
    {

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $intent = \Stripe\SetupIntent::create();

        $plan = ModelsPlan::where('plan_id', $planId)->first();
        if (!$plan) {
            return back()->withErrors(
                [
                    'message' => 'Plan Is Not Available'
                ]
            );
        }
        // dd($intent);
        return view('strip.plans.checkout', compact('plan', 'intent'));
    }

    public function processSubcription(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $temp_user = TempRegister::where('id',$user_id)->first();
        // dd($user_id,$temp_user,$temp_user->name);

        $user = new User();
        $user->createOrGetStripeCustomer([
            'name' => $temp_user->name,
            'email' => $temp_user->email,
        ]

        );
// dd($user->stripe_id);
$request->session()->put('stripe_id', $user->stripe_id);


        $paymentMethod = null;
        $paymentMethod = $request->payment_method;



        if ($paymentMethod != null) {
            $paymentMethod = $user->addPaymentMethod($paymentMethod);


        }

        $plan = $request->plan_id;

        // Subcription
        try {

            $user->newSubscription(
                'default',
                $plan
            )->create($paymentMethod != null ? $paymentMethod->id : '');

        } catch (Exception $th) {
            return back()->withErrors([
                'error' => 'unable to create subscription due to this issue ' . $th->getMessage()
            ]);
        }


        $request->session()->flash('alert-success', 'You are subscribed Successfully');




              return to_route('thankyou', $plan)->withMessage('message');
    }


public function thankYou (Request $request){


    $temp_user = TempRegister::where('id',$request->session()->get('user_id'))->first();
      $add_user = User::where('stripe_id',$request->session()->get('stripe_id'))->first();


$add_user->name = $temp_user->name;
$add_user->professional_title = $temp_user->professional_title;
$add_user->email = $temp_user->email;
$add_user->password = $temp_user->password;

$add_user->save();

  //  Send mail to Practisnor
  if($add_user){
    Event::dispatch(new SendMail($add_user->id));

}
if ($add_user) {
    Auth::login($add_user);


}
return view('strip.thankyou')->withMessage('message');


}

public function autoLogin()
{
        $user = User::where('id', 1)->first();

    if ($user) {
        Auth::login($user);


    }

    // Handle invalid token or user not found
    return redirect()->route('login')->with('error', 'Invalid token.');
}


    public function allSubcription (){
        // $subscriptions = auth()->user()->subscriptions;
        $subscriptions = Subscription::where('user_id',auth()->id())->get();
// dd($subscriptions);
// $subscription->plan->name

        // dd($subscriptions);
        return view('strip.subscrition.index',compact('subscriptions'));
    }
    public function cancleSubcription (Request $request){
        // return $request->all();
        $subscriptionName = $request->subscriptionName;
        if ($subscriptionName) {
            $user = auth()->user();
            $user->subscription($subscriptionName)->cancel();
            return "Subscription Cancle Sucefully";
        }
    }    public function resumeSubcription (Request $request){
        // return $request->all();
        $subscriptionName = $request->subscriptionName;
        if ($subscriptionName) {
            $user = auth()->user();
            $user->subscription($subscriptionName)->resume();
            return "Subscription Resume Sucefully";
        }
    }
}
