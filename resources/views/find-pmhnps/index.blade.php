@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1><strong>Find PMHNPS</strong>     </h1>
                        <form method="POST" action="{{ route('find.pmhnps.post') }}">
                            @csrf
                            <div class="row">

                                <div class="col">
                                    <div>
                                        <label for="professional_title">Professional Title</label>

                                        <select id="professional_title" class="block w-full mt-1" name="professional_title" >
                                            <option value="">Select Professional Title</option>
                                            @php
                                                $professionalTitles = [
                                                    'DNP' => 'Doctor of Nursing Practice (DNP)',
                                                    'MSN' => 'Master of Science in Nursing (MSN)',
                                                    'RN' => 'Registered Nurse (RN)',
                                                    'PMHNP-BC' => 'Board Certified Psychiatric-Mental Health Nurse Practitioner (PMHNP-BC)',
                                                    // Add more options as needed
                                                    'other' => 'Other',
                                                ];
                                                $oldProfessionalTitle = old('professional_title', 'professional_title');
                                            @endphp

                                            @foreach ($professionalTitles as $value => $label)
                                                <option value="{{ $value }}" {{ $oldProfessionalTitle === $value ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <x-label for="country-dropdown" :value="__('Country')" />
                                    <select id="country-dropdown" id="country" class="form-control" name="country">
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $data)
                                        <option value="{{ $data->id }}" >
                                            {{ $data->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <div class="mb-3 form-group">
                                        <x-label for="state-dropdown" :value="__('State')" />
                                        <select id="state-dropdown" id="state" class="form-control" name="state">
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <x-label for="city-dropdown" :value="__('City')" />
                                        <select id="city-dropdown" class="form-control" name="city">
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <x-label for="postal_code" :value="__('Postal Code')" />

                                        <x-input id="postal_code" class="block w-full mt-1" type="text"
                                            name="postal_code" :value="old('postal_code', 'postal_code')" placeholder="Postal Code"  />
                                    </div>
                                </div>


                                <div class="flex items-center justify-end mt-4">

                                    <x-button class="ml-4" class="btn-success">
                                        {{ __('Search') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>


                    </div>
                    <div>
                        <h3>List of Practinor</h3>
                        <table class="table table-striped">
                            {{-- {{dd($data1)}} --}}
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Professional Title</th>
                            <th>Country </th>
                            <th>State </th>
                            <th>City </th>
                            <th>Postal Code </th>

                            </tr>
                            @foreach($data1 as $user)
                            <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->professional_title }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ $user->state }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->postal_code }}</td>



                            </tr>
                            @endforeach
                            </table>

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
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
