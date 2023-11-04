@extends('layouts2.app')

@section('content')
<div class="page-height">
    <div class="container">


      <div class="mt-5 mb-4 row">
        <div class="col-md-12">
          <h1 class="mb-4 text-center">About us</h1>
        </div>
      </div>




      <div class="row ">
        <div class="col-md-12">

          <p>
            PMHNP.com is an exclusive online platform designed to connect patients directly with Psychiatric Mental
            Health Nurse Practitioners (PMHNPs). Established with a clear vision, our platform stands at the
            intersection of mental healthcare and digital innovation.
          </p>
          <p>
            We're committed to two central objectives - 'Connecting Patients to PMHNPs' and 'Increasing Public Awareness
            of the PMHNP Profession'. PMHNP.com is the only platform solely dedicated to PMHNPs, distinguishing us from
            other generic medical or healthcare platforms.
          </p>
          <p>
            Our mission is to facilitate easy, direct, and transparent interaction between PMHNPs and patients seeking
            their services. We believe that access to quality mental health services should be simplified and
            democratized.
          </p>
          <p>
            What sets us apart is our commitment to the profession of PMHNPs. We understand their unique strengths and
            the specific value they bring to mental health treatment. Our platform is designed to spotlight these
            professionals, showcasing their expertise and making it easy for patients to find and connect with them.
          </p>
          <p>
            At PMHNP.com, we're more than a digital platform - we're a community. We're dedicated to fostering a space
            that supports PMHNPs in expanding their practice and patients in finding the right mental healthcare
            provider.
          </p>
          <p>
            Join us as we revolutionize the way mental health services are sought, delivered, and perceived. Together,
            we can make a difference.
          </p>

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
