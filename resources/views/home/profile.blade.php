@extends('layouts2.app')

@section('content')

 @foreach($users as $user)
 <div class="page-height">
    <div class="container profile-page">

      <div class="row mt-5">
        <div class="col-lg-3">
          <div class="profile">
            <div class="profilepic">
              <img src="{{ $user->profile_picture }}" alt="">
            </div>

            <h3 class="text-center">{{ $user->name }}</h3>
            <h6 class="text-center">{{ $user->professional_title}} </h6>
            <p class="text-center">License Number : {{ $user->professional_license_number}}</p>
            <p class="text-center">State of License: {{ $user->state_of_licensure}}</p>
            <p class="mail">Email: {{ $user->email }}</p>
            <div class="mb-4 mt-4 text-center">
                 @if(Session::has('Contactsuccess'))
            <div class="alert alert-success">
                {{Session::get('Contactsuccess')}}
            </div>
        @endif
              <button type="button" class="btn btn-lg btn-primary mb-4" data-mdb-toggle="modal" data-mdb-target="#myModal">Contact Now</button>
            </div>
          </div>

        </div>
        <div class="col-lg-9">

          <div class="profile-text-box">
            <p>
             {{ $user->bio }}
            </p>
           
          </div>

          <h5 class="mt-5">Area of Expertise</h5>
          <div class="expertise-row mt-4 mb-5">
            @php
                  $extracted_value=explode(",",$user->areas_of_expertise);
              @endphp
              @foreach ($extracted_value as   $value)
              <span class="badge-expert">{{ $value }}</span>
               @endforeach
          </div>


          <div class="testimonial">

            <!-- Carousel wrapper -->
            <div id="carouselBasicExample" class="carousel slide carousel-slide" data-mdb-ride="carousel">
              <!-- Inner -->
              <div class="carousel-inner">
                <!-- Single item -->
                
                 @foreach($reviews as $key => $review)
                   @php
                   
                  $isactive='';
                  if($key==0){ $isactive="active";  }
                  
                 @endphp
                <div class="carousel-item {{ $isactive }}">
                   @php
                  $rating=$review->rating;  
                  @endphp
                  <h3>
                   @for($x = 0; $x <= $rating; $x++)
  
                    <i class="fa fa-star" aria-hidden="true"></i>
                    
                    @endfor
                  </h3>
                  <p>
                    “{{ $review->comment }}”
                  </p>
                  <h4>
                    {{ $review->name }}
                  </h4>
                </div>
               
                   @endforeach
                <!-- Single item -->
              
              
              </div>
              <!-- Inner -->
            </div>

            <!-- Indicators -->
            <div class="control-div">
              <div class="carousel-indicators">
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1">
                </button>
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1"
                  aria-label="Slide 2">
                </button>
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2"
                  aria-label="Slide 3">
                </button>
              </div>

              <!-- Controls -->
              <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample"
                data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>


          </div>


          <!-- Review section -->
          <h3>
            Write a review
          </h3>
          <div class="row">
            <div class="col-md-8">
        @if(Session::has('Reviewsuccess'))
            <div class="alert alert-success">
                {{Session::get('Reviewsuccess')}}
            </div>
        @endif
              <form class="padding" method="post" action="{{ route('register') }}">
               @csrf
                <!-- Name input -->
                <div class="form-outline mb-4">
                  <input type="text" name="name" class="form-control" />
                  <label class="form-label" for="">Full Name</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control" />
                  <label class="form-label" for="">Enter Email</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="hidden" name="user_id" value="{{ $user->id }}" class="form-control" />
                 </div>
                  
                                    
                <div class="form-outline mb-4">
                  <textarea class="form-control" name="comment" rows="5"></textarea>
                  <label class="form-label" for="">Enter your review</label>
                </div>
                  
 
                  <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                                    <input type="hidden" name="rating" id="star_rating" class="form-control" placeholder="Enter Your Name" />   

                
                <div class="mb-4">
                  <!-- <input type="text" id="" class="form-control" /> -->
                  <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
                </div>

                <!-- Submit button -->
                <div class="mb-4 text-start">
                  <button type="submit" name="submitreview" class="btn btn-lg btn-primary mb-4">Submit</button>
                </div>

              </form>


            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

@endforeach

               

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
        <!-- <h5 class="modal-title" id="">Modal Title</h5> -->
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <div class="modalform" style="margin-top: -40px;">
          <h2 class="mb-3">Contact PMHNP</h2>
           <form   method="post" action="{{ route('contact.store') }}">
            <!-- CROSS Site Request Forgery Protection -->
            @csrf
          <div class="row">
            <div class="col-sm-12 mb-3">              
              <div class="form-outline">
                <input type="text" name="name" class="form-control" /> 
                <label class="form-label" for="name">Enter Name</label>              
              </div>
            </div>
          </div>
          <div class="row" hidden>
            <div class="col-sm-12 mb-3">              
              <div class="form-outline">
                <input type="hidden" value="{{ $user->id }}" name="dr_id" class="form-control" /> 
                <input type="hidden" value="Contact Now Details" name="subject" class="form-control" /> 
                
               </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 mb-3">
              <div class="form-outline">
                <input type="email" name="email" class="form-control"/>   
                <label class="form-label" for="email">Enter Email</label>             
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 mb-3">
              <div class="form-outline">
                <textarea class="form-control" name="comment" rows="5"></textarea>
                <label class="form-label" for="message  ">Write your message</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 mb-3">
              <!-- <input type="text" id="" class="form-control" /> -->
            <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-start">
              <button type="submit" name="send" class="btn btn-lg  btn-primary">Submit</button>
            </div>
          </div>
      </form>
        </div>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Changes</button>
      </div> -->
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
<script>
var rating_data = 0;

  
    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });
    

    

  
  

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');
        $("#star_rating").val(rating_data);
        console.log("asdasd",rating_data);
    });

  

</script>
    @endsection
