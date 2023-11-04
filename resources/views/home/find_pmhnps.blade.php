@extends('layouts2.app')

@section('content')
<div class="page-height">
    <div class="container">


      <div class="mt-5 mb-4 row">
        <div class="col-md-12">
          <h1 class="mb-4 text-center">Find PMHNPS</h1>
        </div>
      </div>

      <!-- PMHNP search -->
      <div class="searchbox">

        <form action="">
          <div class="row">
            <div class="col-lg-11 col-md-11 col-sm-10">
              <div class="row search-mr">
                <div class="mb-3 col-lg-3 col-md-6 col-sm-6 mb-lg-0">
                   

                    <select id="professional_title" class="form-control" name="professional_title" >
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
                            $oldProfessionalTitle = '';
                            if(isset($_GET['professional_title']) && !empty($_GET['professional_title'])){
                            $oldProfessionalTitle = $_GET['professional_title'];
                        }
                        @endphp

                        @foreach ($professionalTitles as $value => $label)
                            <option value="{{ $value }}" {{ $oldProfessionalTitle === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3 col-lg-3 col-md-6 col-sm-6 mb-lg-0 ">
                  
         <div class="multiselect">
    <div class="selectBox" onclick="showaoe()">
      <select class="form-control" >
        <option>Area of Expertise</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes">
      <label for="Mood Disorders">
        <input type="checkbox" name="aoe[]" value="Mood Disorders" />Mood Disorders</label>
      <label for="Trauma and PTSD">
        <input type="checkbox"  name="aoe[]" value="Trauma and PTSD" />Trauma and PTSD</label>
      <label for="Geriatric Psychiatry">
        <input type="checkbox" name="aoe[]" value="Geriatric Psychiatry" />Geriatric Psychiatry</label>
         <label for="Psychotic Disorders">
        <input type="checkbox" name="aoe[]" value="Psychotic Disorders" />Psychotic Disorders</label>
         <label for="Neurodevelopmental Disorders">
        <input type="checkbox" name="aoe[]" value="Neurodevelopmental Disorders" />Neurodevelopmental Disorders</label>
         <label for="Substance Abuse Counseling">
        <input type="checkbox" name="aoe[]" value="Substance Abuse Counseling" />Substance Abuse Counseling</label>
         <label for="Eating Disorders">
        <input type="checkbox" name="aoe[]" value="Eating Disorders" />Eating Disorders</label>
         <label for="Sleep Disorders">
        <input type="checkbox" name="aoe[]"  value="Sleep Disorders" />Sleep Disorders</label>
         <label for="Anxiety Disorders">
        <input type="checkbox" name="aoe[]" value="Anxiety Disorders" />Anxiety Disorders</label>
         <label for="Personality Disorders">
        <input type="checkbox" name="aoe[]" value="APersonality Disorders" />Personality Disorders</label>
        <label for="Other">
        <input type="checkbox" name="aoe[]" value="Other" />Other</label>
    </div>
  </div>
                  
                </div>
       
  

                <div class="mb-3 col-lg-2 col-md-4 col-sm-4 mb-lg-0 mb-sm-0">
                  <input type="text" id="" name="pin_code" class="form-control" placeholder="Enter pin code"   />
                </div>
                <div class="mb-3 col-lg-2 col-md-4 col-sm-4 mb-lg-0 mb-sm-0">
                  <select id="stateSelect" name="state" class="form-select form-control">
                    <option value="">Select state</option>
                      @foreach($states as $state)
                          <option value="{{ $state->id }}">{{ $state->name }}</option>
                      @endforeach
                  </select>

                </div>
                <div class="mb-3 col-lg-2 col-md-4 col-sm-4 mb-lg-0 mb-sm-0">
                  <select id="citySelect" name="city" class="form-select form-control">
                       <option value="">Select a City</option>

                  </select>
                </div>
               
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 text-end">
              <button id="" class="btn btn-lg btn-primary btn-search" type="submit"><i class="fa fa-search"
                  aria-hidden="true"></i></button>
            </div>
          </div>
        </form>

      </div>
      <!-- PMHNP search end -->


      <div class="pmhnp-row ">

        <!-- PMHNP list -->
          
         @foreach($paginatedResults as $user)
        <div class="pmhnplist">
          <div class="pmhnp-probox">
            <div class="pmhnppicbox">
              <img src="img/noimage.jpg" alt="">
            </div>
            <div class="mt-3 text-center">
                        @php
                        $user_id=$user->id;
                            $encrypted = Crypt::encryptString($user_id);
                        @endphp
              <button type="submit" onclick="location.href = '/home/profile/{{ $encrypted }}';" class="btn btn-lg btn-primary">View Profile</button>
            </div>
          </div>
          <div class="">
            <h3>{{ $user->name }}</h3>
            <p>
              {{ $user->bio }}
            </p>
            <h5 class="mt-3">Area of Expertise</h5>
            <div class="mt-3 mb-4 expertise-row">
              
               
              
              @php
                  $extracted_value=explode(",",$user->areas_of_expertise);
              @endphp
              @foreach ($extracted_value as   $value)
              <span class="badge-expert">{{ $value }}</span>
               @endforeach
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="location">
                  <i class="fa fa-map-marker faicon" aria-hidden="true"></i> {{ $user->address_line1 }},{{ $user->city }},{{ $user->state }},{{ $user->postal_code }}
                </div>
              </div>
              <div class="mt-3 col-sm-6 reviews text-start text-sm-end mt-sm-0">
                <i class="fa fa-star" aria-hidden="true"></i> <strong>{{ $user->reviews }}</strong> ( {{ $user->reviewcnt }} reviews)
              </div>
            </div>
          </div>
        </div>
        <!-- PMHNP list end -->
        @endforeach
        <!-- PMHNP list -->
         
        <!-- PMHNP list -->
        
        <!-- PMHNP list end -->


      </div>


      <div class="mb-5 row">
        <div class="col-md-12">

          <nav aria-label="Page navigation example">
            <ul class="pagination pg-blue justify-content-end">
              <li class="page-item"><a class="page-link">{{ $paginatedResults->links() }}  

</a></li>
               
              
            </ul>
          </nav>

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
        <script type="text/javascript">var expanded = false;

function showaoe() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;

  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }

}</script>
<script>
    // JavaScript code to handle the dynamic select boxes
    document.getElementById('stateSelect').addEventListener('change', function() {
        const stateId = this.value;
        const citySelect = document.getElementById('citySelect');

        // Clear the city select box
        citySelect.innerHTML = '<option value="">Select a City</option>';

        // Fetch cities for the selected state via AJAX
        fetch(`/home/cities/${stateId}`)
            .then(response => response.json())
            .then(cities => {
                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.id;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });
            });
    });
</script>
    @endsection
