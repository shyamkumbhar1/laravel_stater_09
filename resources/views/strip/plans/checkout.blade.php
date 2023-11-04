@extends('layouts2.app')

@section('content')
<div class="page-height">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="steps-row">
          <ul>
            <li >
           <!--    <a href="{{ route('register.step.one') }}"> <span>1</span> Step 1 </a> -->
               <a > <span>1</span> Step 1 </a>
            </li>
            <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
            <li>
              <!-- <a href="{{ route('plans.all') }}"> <span><i class="fa fa-check" aria-hidden="true"></i></span> Step 2 </a> -->

                <a  > <span><i class="fa fa-check" aria-hidden="true"></i></span> Step 2 </a>

            </li>
            <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
            <li class="active" >
              <a  > <span><i class="fa fa-check" aria-hidden="true"></i> </span> Step 3 </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mb-4 row">
      <div class="col-md-12">
        <h2 class="mb-4 text-center">Payment Details</h2>
      </div>
    </div>

    <div class="mb-4 row">
      <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3">

        <div class="padding">

          <div class="card-row">
            <span class="visa"></span>
            <span class="mastercard"></span>
            <span class="amex"></span>
            <span class="jcb"><img src="{{ asset('src/img/jcb.jpg') }}" alt=""></span>
            <span class="discover"></span>
          </div>

          <form action="{{route('plans.process')}}" method="POST" id="subscribe-form">
            @csrf
    
            <input type="hidden" name="plan_id" value="{{$plan->plan_id}}">          
           
            <div class="mb-4 form-outline">
              <input id="card-holder-name"  type="text" class="form-control" placeholder="Enter name">
              <label for="card-holder-name" class="form-label">Card Holder Name</label>
            </div>
          
            <div class="mb-4 form-row form-outline">
                <label for="card-element form-label">Credit or debit card</label>
                <div id="card-element" style="border: 1px solid #d7cfcf;" class="form-control">
                </div>
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <div class="stripe-errors"></div>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}<br>
                @endforeach
            </div>
            @endif

            <div class="text-center form-group"><br>
                <button  id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-primary btn-block">Process Subcription</button>
            </div>
          </form>

        </div>

      </div>
    </div>

  </div>
</div>
@endsection
   
@section('script')
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {hidePostalCode: true,
        style: style});
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
        e.preventDefault();
        console.log("attempting");
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: cardHolderName.value }
                }
            }
            );
        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            paymentMethodHandler(setupIntent.payment_method);
        }
    });
    function paymentMethodHandler(payment_method) {
        var form = document.getElementById('subscribe-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@endsection     