@extends('layouts2.app')

@section('content')
    <div class="page-height">
        <div class="container">


            <div class="mt-5 mb-4 row">
                <div class="col-md-12">
                    <h2 class="mb-4 text-center">Complete your Profile</h2>
                    <!-- Collapsible wrapper -->


                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div><br />
                                @endif --}}
                            </div>

                            <form class="padding" method="POST" action="{{ route('remaining.details.post') }}" autocomplete="on"                      enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" autofocus>
                                </div>

                                <div class="mb-4 form-outline">
                                    <x-input id="phone_number" class="block w-full mt-1" type="text"
                                        name="phone_number" :value="old('phone_number')" class="form-control"
                                        placeholder="Phone Number" required autofocus />
                                    <x-label for="phone_number" class="form-label">Phone Number <span class="mandatory">*</span></x-label>
                                    @if ($errors->has('phone_number'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('phone_number') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-4 form-outline">
                                    <x-input id="professional_license_number" class="block w-full mt-1 form-control"
                                        type="text" name="professional_license_number" :value="old('professional_license_number')"
                                        placeholder="Professional License Number" required autofocus />
                                    <x-label for="professional_license_number" class="form-label">Professional License Number<span class="mandatory">*</span></x-label>
                                    @if ($errors->has('professional_license_number'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('professional_license_number') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>


                                <div class="mb-4 ">
                                    <select id="state_of_licensure" class="form-select form-control"
                                        name="state_of_licensure" required autofocus >
                                        <option value="other">Select State Of Licensure</option>

                                        @foreach ($state_of_licensures as $state_of_licensure )
                                        <option value="{{ $state_of_licensure['name'] }}">{{ $state_of_licensure['name'] }} </option>                                                
                                        @endforeach

                                        <!-- Add more options as needed -->
                                        <option value="other">Other</option>
                                    </select>
                                    {{-- <label for="state_of_licensure" >State of Licensure</label> --}}
                                    @if ($errors->has('state_of_licensure'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('state_of_licensure') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-4 form-outline">
                                    @php
                                        $expertiseAreas = ['Mood Disorders', 'Trauma and PTSD', 'Geriatric Psychiatry', 'Psychotic Disorders', 'Neurodevelopmental Disorders', 'Substance Abuse Counseling', 'Eating Disorders', 'Sleep Disorders', 'Anxiety Disorders', 'Personality Disorders'];
                                    @endphp
                                    <h5><label for="areas_of_expertise">Areas of Expertise</label></h5>
                                    <div class="mb-3 row expertise">
                                        @foreach ($expertiseAreas as $index => $expertise)
                                            {{-- <div>                                                    
                                        </div> --}}
                                            <div class="mb-2 col-lg-6 col-md-6">
                                                <div class="form-check">
                                                    <input id="area_of_expertise{{ $index }}"
                                                        class="form-check-input" type="checkbox"
                                                        name="areas_of_expertise[]" value="{{ $expertise }}">
                                                    <label for="area_of_expertise{{ $index }} autofocus"
                                                        class="form-check-label">{{ $expertise }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                        <div class="mb-2 col-lg-6 col-md-6">
                                            <div class="form-check">
                                                <input id="area_of_expertise_other" class="form-check-input" type="checkbox" autofocus>
                                                <label for="area_of_expertise_other">Other</label>
                                            </div>
                                            <div id="otherInputContainer" style="display: none;" class="mt-2">
                                                <input type="text" class="form-control-check" name="areas_of_expertise[]" id="otherInput" autofocus>
                                                @if ($errors->has('areas_of_expertise'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('areas_of_expertise') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>                                         

                                    </div>
                                </div>

                                
                         
                               
                        <!-- </div> -->

                                <div class="mb-4 form-outline">
                                    <textarea id="bio" class="block w-full mt-1 form-control" name="bio" placeholder="Bio" required>{{ old('bio') }}</textarea>
                                    <x-label class="form-label" for="bio">Bio<span class="mandatory">*</span></x-label>
                                </div>

                            
                                <div class="row">
                                    <div class="mb-4 col-sm-6">
                                        <x-label for="profile_picture" :value="__('Profile Picture')" />
                                          @php
$img_call = auth()->user()->profile_picture;
if($img_call=='')
{
@endphp
 
  <img class="imgpreview" id="preview" src="{{asset('storage/Profile-Picture/default-image.jfif')  }}" alt="Preview"  style="display: block;">
@php
}else{
@endphp
 
  <img class="imgpreview" id="preview" src="{{ asset(auth()->user()->profile_picture) }}" alt="Preview"  style="display: block;">
  
  @php
}
@endphp

                                        <img class="imgpreview" id="preview" src="#" alt="Preview" style="display: none; ">
                                        @if ($errors->has('profile_picture'))
                                            <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
                                        @endif
                                    </div>            
                                    <div class="mb-4 col-sm-6 text-end">
                                        <!-- <input id="profile_picture" class="block w-full mt-1 form-control" type="file" name="profile_picture" onchange="previewImage(event)" /> -->
                                        {{-- <input type="file" name="image" id="image" onchange="previewImage(event)"> --}}
                                          
                                        <div class="fileuploadpic">
                                            <span>Upload Photo</span>
                                            <input id="profile_picture" class="form-control" type="file" name="profile_picture" onchange="previewImage(event)" autofocus />
                                        </div>

                                    </div>
                                </div>


                                <div class="mb-4 form-outline">                                    
                                    <textarea id="address_line1" class="block w-full mt-1 form-control" type="text" name="address_line1"
                                        placeholder="Address line 1" required />{{ old('bio') }}</textarea>
                                        <x-label class="form-label" for="address_line1" >Address Line 1<span class="mandatory">*</span></x-label> 
                                    @if ($errors->has('address_line1'))
                                        <span class="text-danger">{{ $errors->first('address_line1') }}</span>
                                    @endif
                                </div>


                                <div class="mb-4 form-outline">                                    
                                    <textarea id="address_line2" class="block w-full mt-1 form-control" type="text" name="address_line2"
                                        placeholder="Address line 2" required />{{ old('bio') }}</textarea>
                                        <x-label class="form-label" for="address_line2" >Address Line 2<span class="mandatory">*</span></x-label>
                                    @if ($errors->has('address_line2'))
                                        <span class="text-danger">{{ $errors->first('address_line2') }}</span>
                                    @endif
                                </div>


                                <div class="row">
                                    <div class="mb-4 col-sm-6">
                                        <x-label for="country-dropdown" >Country<span class="mandatory">*</span></x-label>
                                        {{-- {{ dd($countries )}} --}}
                                        <select id="country-dropdown" id="country" class="form-select form-control" name="country" autofocus>
                                            <option value="">-- Select Country --</option>
                                            @foreach ($countries as $data)
                                                <option value="{{ $data->id }}">
                                                    {{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="text-danger">{{ $errors->first('country') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-4 col-sm-6">
                                        <x-label for="state-dropdown" >State<span class="mandatory">*</span></x-label>
                                        <select id="state-dropdown" id="state" class="form-select form-control" name="state" autofocus >
                                        <option selected>--Select State--</option>
                                        </select>
                                        @if ($errors->has('state'))
                                            <span class="text-danger">{{ $errors->first('state') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="mb-4 col-sm-6">
                                        <x-label for="city-dropdown" >City<span class="mandatory">*</span></x-label>
                                        <select id="city-dropdown" class="form-select form-control" name="city" autofocus>
                                        <option selected>--Select City--</option>
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-4 col-sm-6">
                                        <label for=""></label>
                                        <div class="form-outline">                                        
                                            <x-input id="postal_code" class="form-control" type="text"
                                                name="postal_code" :value="old('postal_code')" placeholder="Postal Code" required autofocus maxlength="5" />  
                                                <x-label for="postal_code" class="form-label" >Postal Code<span class="mandatory">*</span></x-label>                                      
                                            @if ($errors->has('postal_code'))
                                                <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-4 text-center">
                                    {{-- <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a> --}}

                                    <x-button class="ml-4 btn btn-lg btn-primary">
                                        {{ __('Complete Profile') }}
                                    </x-button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>









        <!-- MDB -->
        <!-- <script type="text/javascript" src="{{ asset('src/js/mdb.min.js') }}"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#area_of_expertise_other').change(function() {
                    var isChecked = $(this).prop('checked');
                    var otherInputContainer = $('#otherInputContainer');
                    var otherInput = $('#otherInput');

                    if (isChecked) {
                        otherInputContainer.show();
                        otherInput.prop('required', true);
                    } else {
                        otherInputContainer.hide();
                        otherInput.prop('required', false);
                    }
                });


            });
        </script>
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
