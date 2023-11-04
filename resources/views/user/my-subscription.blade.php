@extends('layouts2.app')

@section('content')
<div class="page-height">
    <div class="container">
       

        <div class="mt-5 mb-4 row">
            <div class="col-md-12">
                   

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1><strong> My Subscription :</strong> </h1>

                        {{-- {{ $subscriptions }} --}}

                        <div class="container">
                            @if (count($subscriptions) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Plan Name</th>
                                           
                                            <th scope="col">Amount </th>
                                            <th scope="col">Trial Start At</th>
                                            <th scope="col">Status</th>
                                            {{-- <th scope="col">Auto Renew</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($subscriptions as $subscription)
                                            <tr>
                                                <th scope="row">{{ $plan->name }}</th>
                                                <th scope="row">{{ $plan->amount }}</th>
                                                <th scope="row">{{ $subscription->created_at }}</th>
                                                <th scope="row">Active</th>

                                                {{-- <th>
                <label class="switch">
                    @if ($subscription->ends_at == null)
                    <input type="checkbox" id="switcher" checked value="{{ $subscription->name }}">

                    @else
                    <input type="checkbox" id="switcher" value="{{ $subscription->name }}">

                    @endif
                    <span class="slider round"></span>
                  </label>
               </th> --}}

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            @else
                                <h4> You are not Subscribe Any Plan</h4>
                            @endif

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function() {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dropdown').html(
                            '<option value="">-- Select State --</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dropdown').on('change', function() {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
@endsection
