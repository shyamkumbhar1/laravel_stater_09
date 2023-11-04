<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Subcription</title>
    <style>
        /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
    </style>
  </head>
  <body>
    <h1>Your Subcriptions</h1>
    {{ $subscriptions }}

    <div class="container">
     @if (count($subscriptions)>0)
     <table class="table">
        <thead>
          <tr>
            <th scope="col">Plan Name</th>
            <th scope="col">Subscription Name</th>
            <th scope="col">Price </th>
            <th scope="col">Quantity</th>
            <th scope="col">Trial Start At</th>
               <th scope="col">Auto Renew</th>
          </tr>
        </thead>
        <tbody>

            @foreach ( $subscriptions as $subscription )
            <tr>
                <th scope="row">{{ $subscription->plan->name }}</th>
                <th scope="row">{{ $subscription->name }}</th>
                <th scope="row">{{ $subscription->plan->amount }}</th>
                <th scope="row">{{ $subscription->quantity }}</th>
                <th scope="row">{{ $subscription->created_at }}</th>

               <th>
                <label class="switch">
                    @if ($subscription->ends_at == null)
                    <input type="checkbox" id="switcher" checked value="{{ $subscription->name }}">

                    @else
                    <input type="checkbox" id="switcher" value="{{ $subscription->name }}">

                    @endif
                    <span class="slider round"></span>
                  </label>
               </th>

              </tr>
            @endforeach


        </tbody>
      </table>
@else
<h4> You are not Subscribe Any Plan</h4>
     @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
     $(document).ready(function () {
        $('#switcher').click(function (e) {
            var subscriptionName = $('#switcher').val();
            // e.preventDefault();
            if ($(this).is(':checked')) {
                console.log('checked');
                $.ajax({
                type: "get",
                url: "{{ route('subscription.resume') }}",
                data:  {subscriptionName},

                success: function (response) {
                    console.log(response);

                },
                 error: function (response) {

                },
              });
            } else {
              $.ajax({
                type: "get",
                url: "{{ route('subscription.cancel') }}",
                data: {subscriptionName},
                success: function (response) {
                    console.log(response);
                },
                 error: function (response) {

                },
              });

            }

        });
     });
    </script>
  </body>
</html>
