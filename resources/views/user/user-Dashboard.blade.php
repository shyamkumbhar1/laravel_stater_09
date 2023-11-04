@extends('layouts2.app')

@section('content')

    <div class="page-height">
        <div class="container">


            <div class="mt-5 mb-4 row">
                <div class="col-md-12">
                    <h2 class="mb-4 text-center">Welcome To PMHNPS Dashboard</h2>
                    <div style="text-align: center;">
                     
                  <a  href="{{ route('user.Dashboard.edit') }}" class="mb-4 btn btn-lg btn-primary">Update profile</a>
                  <a  href="{{ route('user.my.subscription') }}" class="mb-4 btn btn-lg btn-primary">My subscription</a>


                   
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
