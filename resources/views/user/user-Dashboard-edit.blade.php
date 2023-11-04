@extends('layouts2.app')

@section('content')
    
<div class="page-height">
    <div class="container">


        <div class="mt-5 mb-4 row">
            <div class="col-md-12">
                <h2 class="mb-4 text-center">Update your Profile </h2>
                <!-- Collapsible wrapper -->

                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif

                            <form class="padding" method="Post" action="{{ route('user.Dashboard.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- Name -->
        
                                <div class="mb-4 form-outline">            
                                    <x-input id="name" class="block w-full mt-1 form-control" type="text" name="name" :value="old('name',$user->name)" required autofocus />
                                    <x-label for="name" :value="__('Full Name')" class="form-label" />                                            
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                
                                <div class="mb-4 ">
                                    {{-- <label for="professional_title">Professional Title</label> --}}            
                                    <select id="professional_title" class="form-select form-control" name="professional_title" required>
                                        <option value="">Select Professional Title</option>
                                        <option value="DNP" {{ old('professional_title', $user->professional_title) === 'DNP' ? 'selected' : '' }}>Doctor of Nursing Practice (DNP)</option>
                                        <option value="MSN" {{ old('professional_title', $user->professional_title) === 'MSN' ? 'selected' : '' }}>Master of Science in Nursing (MSN)</option>
                                        <option value="RN" {{ old('professional_title', $user->professional_title) === 'RN' ? 'selected' : '' }}> Registered Nurse (RN)</option>
                                        <option value="PMHNP-BC" {{ old('professional_title', $user->professional_title) === 'PMHNP-BC' ? 'selected' : '' }}>Board Certified Psychiatric-Mental Health Nurse Practitioner (PMHNP-BC)</option>
                                        <!-- Add more options as needed -->
                                        <option value="other" {{ old('professional_title', $user->professional_title) === 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @if ($errors->has('professional_title'))
                                        <span class="text-danger">{{ $errors->first('professional_title') }}</span>
                                    @endif
                                </div>
        
        
                                <div class="mb-4 form-outline">            
                                    <x-input id="phone_number" class="block w-full mt-1 form-control" type="text" name="phone_number" :value="old('phone_number', $user->phone_number)"                                            
                                        placeholder="Phone Number" required autofocus />
                                    <x-label for="phone_number" :value="__('Phone Number')" class="form-label" />                                            
                                        @if ($errors->has('phone_number'))
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                </div>


                                <div class="mb-4 form-outline">            
                                    <x-input id="professional_license_number" class="block w-full mt-1 form-control" type="text"
                                        name="professional_license_number" :value="old('professional_license_number', $user->professional_license_number)"
                                        placeholder="Professional License Number" required />
                                    <x-label class="form-label" for="professional_license_number" :value="__('Professional License Number')"  />                                            
                                        @if ($errors->has('professional_license_number'))
                                            <span class="text-danger">{{ $errors->first('professional_license_number') }}</span>
                                        @endif
                                </div>

        
                                <div class="mb-4 ">
                                    {{-- <label for="state_of_licensure">State of Licensure</label> --}}            
                                    <select id="state_of_licensure" class="form-select form-control" name="state_of_licensure" required>
                                        <option value="">Select State of Licensure</option>
                                        @php
                                             $old=$user->state_of_licensure;
                                             @endphp
                                        @foreach ($state_of_licensures as $state_of_licensure)
                                            <option value="{{ $state_of_licensure['name'] }}"
                                {{ $old == $state_of_licensure['name'] ? 'selected' : 'ddd' }}

                                            >{{ $state_of_licensure['name'] }}</option>
                                        @endforeach
                                        <option value="Other">Other</option>
                                    </select>


                                              
                                    @if ($errors->has('state_of_licensure'))
                                        <span class="text-danger">{{ $errors->first('state_of_licensure') }}</span>
                                    @endif
                                </div>
        
        
                                <div class="mb-4">
                                    {{-- {{ dd(explode(", ",$user->areas_of_expertise)) }} --}}
                                    @php
                                    $expertiseAreas = ['Mood Disorders', 'Trauma and PTSD', 'Geriatric Psychiatry', 'Psychotic Disorders', 'Neurodevelopmental Disorders', 'Substance Abuse Counseling', 'Eating Disorders', 'Sleep Disorders', 'Anxiety Disorders', 'Personality Disorders'];
        
                                    $selectedAreas = explode(", ",$user->areas_of_expertise);
                                    // $selectedAreas = json_decode($user->areas_of_expertise,true);
                                 
                                    // dd($expertiseAreas,$selectedAreas,$user->areas_of_expertise,in_array("Geriatric Psychiatry",$expertiseAreas) );
                            
                                    @endphp
                                    <h5><label for="areas_of_expertise">Areas of Expertise</label></h5>
                                    <div class="mb-3 row expertise">
                                        @foreach ($expertiseAreas as $index => $expertise)
                                        <div class="mb-2 col-lg-6 col-md-6">
                                            <div class="form-check">                                            
                                                <input id="area_of_expertise{{ $index }}" type="checkbox" name="areas_of_expertise[]" value="{{ $expertise }} "
                                                    {{ in_array($expertise, $selectedAreas) ? 'checked' : '' }} class="form-check-input">
                                                <label for="area_of_expertise{{ $index }}" class="form-check-lable">{{ $expertise }}</label>
                                            </div>
                                        </div>
                                        @endforeach
            
                                        <div>
                                            <input id="area_of_expertise_other" type="checkbox" name="areas_of_expertise[]" value="other" class="form-check-input"
                                                {{ in_array('other', $selectedAreas) ? 'checked' : '' }}>
                                            <label for="area_of_expertise_other" class="form-check-label">Other</label>                                            
                                            @if ($errors->has('areas_of_expertise'))
                                                <span class="text-danger">{{ $errors->first('areas_of_expertise') }}</span>
                                            @endif 
                                        </div>                                                   
                                    </div>
                                </div>
        
        
                                <div class="mb-4 form-outline">
                                    <textarea id="bio" class="block w-full mt-1 form-control" name="bio" placeholder="Bio" rows="4" required>{{ old('bio', $user->bio) }}</textarea>
                                    <x-label for="bio" :value="__('Bio')" class="form-label"/>
                                    @if ($errors->has('bio'))
                                        <span class="text-danger">{{ $errors->first('bio') }}</span>
                                    @endif
                                </div>


                                <div class="row">
                                    <div class="mb-4 col-sm-6">
                                        <x-label for="profile_picture" :value="__('Profile Picture')" />
                                          
 @php
$img_call = $user->profile_picture;
if($img_call=='')
{
@endphp
 
  <img class="imgpreview" id="preview" src="{{asset('storage/Profile-Picture/default-image.jfif')  }}" alt="Preview"  style="display: block;">

@php
}else{
@endphp
  <img class="imgpreview" id="preview" src="{{asset($user->profile_picture)  }}" alt="Preview"  style="display: block;">
  @php
}
@endphp



                                      
                                        @if ($errors->has('profile_picture'))
                                            <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
                                        @endif
                                    </div>            
                                    <div class="mb-4 col-sm-6 text-end">
                                        <!-- <input id="profile_picture" class="block w-full mt-1 form-control" type="file" name="profile_picture" onchange="previewImage(event)" /> -->
                                        {{-- <input type="file" name="image" id="image" onchange="previewImage(event)"> --}}
                                          
                                        <div class="fileuploadpic">
                                            <span>Upload Photo</span>
                                            <input id="profile_picture" class="form-control" type="file" name="profile_picture"   onchange="previewImage(event)" />
                                            <input   class="form-control" type="hidden" name="profile_picture1" value="{{asset($user->profile_picture)  }}" onchange="previewImage(event)" />
                                        </div>

                                    </div>
                                </div>
        
        
                                {{-- <div class="mb-4 form-outline">            
                                    <textarea id="work_address" class="block w-full mt-1 form-control" type="text" name="work_address" placeholder="Work Address" required />{{ old('bio', $user->work_address) }}</textarea>
                                    <x-label for="work_address" :value="__('Work Address')" class="form-lable" />
                                    @if ($errors->has('work_address'))
                                        <span class="text-danger">{{ $errors->first('work_address') }}</span>
                                    @endif
                                </div> --}}


                                <div class="mb-4 form-outline">            
                                    <textarea id="address_line1" class="block w-full mt-1 form-control" type="text" name="address_line1"
                                        placeholder="Address Line 1" required />{{ old('bio', $user->address_line1) }}</textarea>
                                    <x-label class="form-label" for="address_line1" :value="__('Address Line 1')" />
                                    @if ($errors->has('address_line1'))
                                        <span class="text-danger">{{ $errors->first('address_line1') }}</span>
                                    @endif
                                </div>

        
                                <div class="mb-4 form-outline">            
                                    <textarea id="address_line2" class="block w-full mt-1 form-control" type="text" name="address_line2"
                                        placeholder="Address Line 2" required />{{ old('bio', $user->address_line2) }}</textarea>
                                    <x-label class="form-label" for="address_line2" :value="__('Address Line 2')" /> 
                                    @if ($errors->has('address_line2'))
                                        <span class="text-danger">{{ $errors->first('address_line2') }}</span>
                                    @endif
                                </div>

<input type="hidden" value="{{ $user->state }}" id="editstate">
<input type="hidden" value="{{ $user->city }}" id="editcity">
                                <div class="row">
                                    <div class="mb-4 col-sm-6">
                                        <x-label for="country-dropdown" :value="__('Country')" />
                                        <select id="country-dropdown" id="country" class="form-select form-control" name="country">
                                            <option value="">-- Select Country --</option>
                                             @php
                                             $old=$user->country;
                                             @endphp
                        @foreach ($countries as $value =>$data)

                             <option value="{{ $data->id }}" 
                                {{ $old == $data->id ? 'selected' : 'ddd' }}>
                                {{ $data->name }}
                            </option>
                        @endforeach


                                            
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="text-danger">{{ $errors->first('country') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-4 col-sm-6">
                                        <x-label for="state-dropdown" :value="__('State')" />
                                        <select id="state-dropdown" id="state" class="form-select form-control" name="state">
                                        <option selected>--Select State--</option>
                                        </select>
                                        @if ($errors->has('state'))
                                            <span class="text-danger">{{ $errors->first('state') }}</span>
                                        @endif
                                    </div>
                                </div>
        
                                
                                <div class="row">
                                    <div class="mb-4 col-sm-6">
                                        <x-label for="city-dropdown" :value="__('City')" />
                                        <select id="city-dropdown" class="form-select form-control" name="city">
                                        <option selected>--Select City--</option>
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-4 col-sm-6">
                                        <label for=""></label>
                                        <div class="form-outline">           
                                            <x-input id="inputField" class="form-control" type="text" name="postal_code"
                                                :value="old('postal_code', $user->postal_code)" placeholder="Postal Code" required maxlength="5"   />

                                                <x-label for="postal_code" :value="__('Postal Code')" class="form-label"/>   
                                                @if ($errors->has('postal_code'))
                                                    <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
        
        
                                <div class="mb-4 text-center">            
                                    <x-button class="ml-4 btn btn-lg btn-primary">
                                        {{ __('Update Profile') }}
                                    </x-button>
                                </div>

                            </form>
                            
                        </div>
                    </div>
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
        setTimeout(function() {
        $("#country-dropdown").trigger('change');
        }, 1000);
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

                    var editstate = $("#editstate").val();
                    $('#state-dropdown').html(
                        '<option value="">-- Select State --</option>');
                    $.each(result.states, function(key, value) {
                        var sel = '';
                        if(editstate==value.id){ var sel = 'selected';
                        setTimeout(function() {
                        $("#state-dropdown").trigger('change'); }, 1000); }
                        $("#state-dropdown").append('<option value="' + value
                            .id + '" '+sel+'>' + value.name + '</option>');
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
                    var editcity = $("#editcity").val();
                    console.log('editcity',editcity)
                    $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    $.each(res.cities, function(key, value) {
                        var sel = '';
                        if(editcity==value.id){ var sel = 'selected'; }
                        $("#city-dropdown").append('<option value="' + value
                            .id + '" '+sel+' >' + value.name + '</option>');
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
