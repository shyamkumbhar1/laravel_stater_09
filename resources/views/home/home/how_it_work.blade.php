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
                  <input type="text" id="" class="form-control" placeholder="Professional Title" />
                </div>
                <div class="mb-3 col-lg-3 col-md-6 col-sm-6 mb-lg-0 ">
                  <div class="mymultiselect">
                    <!-- <label>Area of Expertise</label> -->
                    <select name="field1" id="field1" multiple
                      onchange="console.log(Array.from(this.selectedOptions).map(x=>x.value??x.text))"
                      multiselect-hide-x="true" >
                      <option selected>Area of Expertise</option>
                      <option value="1">Child Psychiatry</option>
                      <option value="2">Geriatric Psychiatry</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 col-lg-2 col-md-4 col-sm-4 mb-lg-0 mb-sm-0">
                  <input type="number" id="" class="form-control" placeholder="Enter pin code" />
                </div>
                <div class="mb-3 col-lg-2 col-md-4 col-sm-4 mb-lg-0 mb-sm-0">
                  <select class="form-select form-control">
                    <option selected>Select City</option>
                    <option value="2">City 1</option>
                    <option value="3">City 2</option>
                  </select>
                </div>
                <div class="mb-3 col-lg-2 col-md-4 col-sm-4 mb-lg-0 mb-sm-0">
                  <select class="form-select form-control">
                    <option selected>Select state</option>
                    <option value="2">State 1</option>
                    <option value="3">State 2</option>
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
        <div class="pmhnplist">
          <div class="pmhnp-probox">
            <div class="pmhnppicbox">
              <img src="img/noimage.jpg" alt="">
            </div>
            <div class="mt-3 text-center">
              <button type="submit" class="btn btn-lg btn-primary">View Profile</button>
            </div>
          </div>
          <div class="">
            <h3>Lindsay Cygan, DNP</h3>
            <p>
              Dr. Jane Doe. DNP. PMHNP-BC, is a board-certified Psychiatric Mental Health Nurse Practitioner with a
              Doctorate in Nursing Practice.
              With over ten years of experience in mental health care. Dr. Doe is dedicated to providing holistic,
              patient-centered care with a
              focus on individual strengths and wellness.
            </p>
            <h5 class="mt-3">Area of Expertise</h5>
            <div class="mt-3 mb-4 expertise-row">
              <span class="badge-expert">Child Psychiatry</span>
              <span class="badge-expert">Geriatric Psychiatry</span>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="location">
                  <i class="fa fa-map-marker faicon" aria-hidden="true"></i> 1612 Choto Markets Way <br>Knoxville, TN
                </div>
              </div>
              <div class="mt-3 col-sm-6 reviews text-start text-sm-end mt-sm-0">
                <i class="fa fa-star" aria-hidden="true"></i> <strong>4.77</strong> (636 reviews)
              </div>
            </div>
          </div>
        </div>
        <!-- PMHNP list end -->

        <!-- PMHNP list -->
        <div class="pmhnplist">
          <div class="pmhnp-probox">
            <div class="pmhnppicbox">
              <img src="img/noimage.jpg" alt="">
            </div>
            <div class="mt-3 text-center">
              <button type="submit" class="btn btn-lg btn-primary">View Profile</button>
            </div>
          </div>
          <div class="">
            <h3>Lindsay Cygan, DNP</h3>
            <p>
              Dr. Jane Doe. DNP. PMHNP-BC, is a board-certified Psychiatric Mental Health Nurse Practitioner with a
              Doctorate in Nursing Practice.
              With over ten years of experience in mental health care. Dr. Doe is dedicated to providing holistic,
              patient-centered care with a
              focus on individual strengths and wellness.
            </p>
            <h5 class="mt-3">Area of Expertise</h5>
            <div class="mt-3 mb-4 expertise-row">
              <span class="badge-expert">Child Psychiatry</span>
              <span class="badge-expert">Geriatric Psychiatry</span>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="location">
                  <i class="fa fa-map-marker faicon" aria-hidden="true"></i> 1612 Choto Markets Way <br>Knoxville, TN
                </div>
              </div>
              <div class="mt-3 col-sm-6 reviews text-start text-sm-end mt-sm-0">
                <i class="fa fa-star" aria-hidden="true"></i> <strong>4.77</strong> (636 reviews)
              </div>
            </div>
          </div>
        </div>
        <!-- PMHNP list end -->

        <!-- PMHNP list -->
        <div class="pmhnplist">
          <div class="pmhnp-probox">
            <div class="pmhnppicbox">
              <img src="img/noimage.jpg" alt="">
            </div>
            <div class="mt-3 text-center">
              <button type="submit" class="btn btn-lg btn-primary">View Profile</button>
            </div>
          </div>
          <div class="">
            <h3>Lindsay Cygan, DNP</h3>
            <p>
              Dr. Jane Doe. DNP. PMHNP-BC, is a board-certified Psychiatric Mental Health Nurse Practitioner with a
              Doctorate in Nursing Practice.
              With over ten years of experience in mental health care. Dr. Doe is dedicated to providing holistic,
              patient-centered care with a
              focus on individual strengths and wellness.
            </p>
            <h5 class="mt-3">Area of Expertise</h5>
            <div class="mt-3 mb-4 expertise-row">
              <span class="badge-expert">Child Psychiatry</span>
              <span class="badge-expert">Geriatric Psychiatry</span>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="location">
                  <i class="fa fa-map-marker faicon" aria-hidden="true"></i> 1612 Choto Markets Way <br>Knoxville, TN
                </div>
              </div>
              <div class="mt-3 col-sm-6 reviews text-start text-sm-end mt-sm-0">
                <i class="fa fa-star" aria-hidden="true"></i> <strong>4.77</strong> (636 reviews)
              </div>
            </div>
          </div>
        </div>
        <!-- PMHNP list end -->


      </div>


      <div class="mb-5 row">
        <div class="col-md-12">

          <nav aria-label="Page navigation example">
            <ul class="pagination pg-blue justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" tabindex="-1"><span aria-hidden="true">&laquo;</span> Previous</a>
              </li>
              <li class="page-item"><a class="page-link">1</a></li>
              <li class="page-item active">
                <a class="page-link">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link">3</a></li>
              <li class="page-item">
                <a class="page-link">Next <span aria-hidden="true">&raquo;</span></a>
              </li>
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
    @endsection
