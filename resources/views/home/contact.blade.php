@extends('layouts2.app')

@section('content')
<div class="page-height">
    <div class="container">


      <div class="mt-5 mb-5 row">

        <div class="mb-4 col-lg-5 col-md-5">
          <h1 class="mb-4 text-center text-md-start">Need Support?</h1>
          <h6 class="text-center text-md-start">Fill in the form to get in touch</h6>
          <div class="mt-4 contact-img">
            <img src="img/contact-img.jpg" alt="">
          </div>
        </div>

        <div class="col-lg-7 col-md-7">
          <form action="" class="padding">
          <div class="mt-2 row">
            <div class="mb-3 col-sm-6">
              <label class="form-label" for="">First Name</label>
              <div class="form-outline">
                <input type="text" id="" class="form-control" />                
              </div>
            </div>
            <div class="mb-3 col-sm-6">
              <label class="form-label" for="">Last Name</label>
              <div class="form-outline">
                <input type="text" id="" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-sm-12">
              <label class="form-label" for="">Email</label>
              <div class="form-outline">
                <input type="email" id="" class="form-control"/>                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-sm-12">
              <label class="form-label" for="">Phone</label>
              <div class="form-outline">
                <input type="number" id="" class="form-control" />                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-4 col-sm-12">
              <label class="form-label" for="">How can we help?</label>
              <div class="form-outline">
                <textarea class="form-control" id="" rows="5"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-4 col-sm-12">
              <!-- <input type="text" id="" class="form-control" /> -->
            <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-sm-12 text-start">
              <button type="submit" class="mb-4 btn btn-lg btn-block btn-primary">Submit</button>
            </div>
          </div>
        </form>
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
