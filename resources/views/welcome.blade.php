
@extends('layouts2.app')

@section('content')
<div class="page-height">
    <div class="container">


      <div class="mt-5 mb-4 row">
        <div class="col-md-12">
          <h2 class="mb-4 text-center">Connecting Patients with PMHNPs</h2>          
        </div>
        <div class="col-lg-8 offset-lg-2">
          <p class="hometext">
            PMHNP.com: The dedicated platform for Psychiatric Mental Health Nurse Practitioners. We help PMHNPs expand their reach, 
            manage their practice and enhance their professional visibility. For patients, we offer a simple and secure way to find the 
            right PMHNP and book an appointment. Join us today and become a part of our growing community. 
          </p>
        </div>
      </div>

      <div class="mb-4 row">
        <div class="text-center col-md-12">
          {{-- <button type="submit" class="mb-4 btn btn-lg btn-primary"><a href="{{ route('register.step.one') }}  " >Join us now</a></button> --}}
          <a href="{{ route('register.step.one') }}" class="mb-4 btn btn-lg btn-primary">Join us now</a>

        </div>
      </div>


      <div class="row">
        <div class="mb-4 col-lg-6 col-md-6">
          <div class="benefitbox">
            <h3 class="mb-3 " style="margin-left: 35px;">
              Benefits for Patients 
            </h3>
            <ul>
              <li><i class="fa fa-check" aria-hidden="true"></i> Platform Exclusivity: Uniquely for PMHNPs </li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Boost Your Online Presence </li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Broaden Patient Reach </li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Encrypted Patient Communication</li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Showcase Your Expertise </li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Benefit from Patient Reviews </li>
            </ul>
          </div>
        </div>
        <div class="mb-4 col-lg-6 col-md-6">
          <div class="benefitbox">
            <h3 class="mb-3 " style="margin-left: 35px;">
              Benefits for PMHNPs
            </h3>
            <ul>
              <li><i class="fa fa-check" aria-hidden="true"></i> Connect with Dedicated PMHNPs </li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Explore PMHNPs' Expertise </li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Select from Wide Range of Specialists </li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Transparent PMHNP Reviews</li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Secure Messaging with Providers </li>
              <li><i class="fa fa-check" aria-hidden="true"></i> Receive Quality Mental Health Care </li>
            </ul>
          </div>
        </div>
      </div>


      <!-- How It Works for PMHNPs -->
      <div class="mt-5 mb-4 row" id="How-It-Works">
        <div class="col-md-12">
          <h3 class="text-center title-pmhnp">How It Works for PMHNPs</h2>          
        </div>
      </div>

      <div class="mb-4 row">
        <div class="mb-4 col-lg-3 col-md-3 col-sm-6">
          <h3 class="text-center title-step">Step 1</h3>
          <div class="image-pmhnp"><img src="{{ asset('src/img/register.jpg') }}" alt="">
          </div>  
          <h4 class="text-center">Register</h4>        
          <h6 class="text-center">
            Sign up with your professional email
          </h6>
        </div>

        <div class="mb-4 col-lg-3 col-md-3 col-sm-6">
          <h3 class="text-center title-step">Step 2</h3>
           <div class="image-pmhnp">
            <img src="{{ asset('src/img/choose-plan.jpg') }}" alt="">            
          </div> 
          <h4 class="text-center">Choose Plan</h4>
          <h6 class="text-center">
            Pick a suitable subscription plan
          </h6>
        </div>

        <div class="mb-4 col-lg-3 col-md-3 col-sm-6">
          <h3 class="text-center title-step">Step 3</h3>
          <div class="image-pmhnp"><img src="{{ asset('src/img/create-profile.jpg') }}" alt="">
          </div>  
          <h4 class="text-center">Create Profile</h4>        
          <h6 class="text-center">
            Fill out your professional details
          </h6>
        </div>

        <div class="mb-4 col-lg-3 col-md-3 col-sm-6">
          <h3 class="text-center title-step">Step 4</h3>
          <div class="image-pmhnp"><img src="{{ asset('src/img/connecting-patient.jpg') }}" alt="">
          </div>  
          <h4 class="text-center">Connect with Patients</h4>        
          <h6 class="text-center">
            Start connecting with patients
          </h6>
        </div>
      </div>
      <!-- How It Works for PMHNPs end -->


      <!-- How It Works for Patients -->
      <div class="mt-5 mb-4 row">
        <div class="col-md-12">
          <h3 class="text-center">How It Works for Patients</h2>          
        </div>
      </div>

      <div class="mb-4 row">

        <div class="mb-4 col-lg-4 col-md-4 col-sm-6">
          <h3 class="text-center title-step">Step 1</h3>
          <div class="image-patient"><img src="{{ asset('src/img/find-pmhnp.jpg') }}" alt="">
          </div>  
          <h4 class="text-center">Find Your PMHNP</h4>        
          <h6 class="text-center">
            Search PMHNPs by specialization, location, etc.
          </h6>
        </div>

        <div class="mb-4 col-lg-4 col-md-4 col-sm-6">
          <h3 class="text-center title-step">Step 2</h3>
          <div class="image-patient"><img src="{{ asset('src/img/review-profile.jpg') }}" alt="">
          </div>  
          <h4 class="text-center">Find Your PMHNP</h4>        
          <h6 class="text-center">
            Search PMHNPs by specialization, location, etc.
          </h6>
        </div>

        <div class="mb-4 col-lg-4 col-md-4 col-sm-6">
          <h3 class="text-center title-step">Step 3</h3>
          <div class="image-patient"><img src="{{ asset('src/img/connecting-direct.jpg') }}" alt="">
          </div>  
          <h4 class="text-center">Connect Directly</h4>        
          <h6 class="text-center">
            Send a message to your chosen PMHNP
          </h6>
        </div>

      </div>
      <!-- How It Works for Patients end -->

    </div>

    <!-- Home slide  -->
    <div class="hometestimonial">
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            
            <div class="homeslide">

              <!-- Carousel wrapper -->
              <div id="carouselPMHNP" class="carousel slide carousel-slide" data-mdb-ride="carousel">
                <!-- Inner -->
                <div class="carousel-inner">
                  <!-- Single item -->
                  <div class="carousel-item active">                    
                    <h4 class="text-center">
                      PMHNP.com has revolutionized how I connect with my patients. It's easy to use and gives my practice the visibility it needs. 
                      Since I joined, I've seen an uptick in patient inquiries and my schedule is consistently full. As a PMHNP, 
                      this platform is a game-changer! 
                    </h4>
                    <h4 class="text-center">
                      <span class="reviewpic">
                        <img src="{{ asset('src/img/reviewpic.jpg') }}" alt="">
                      </span> <strong>John smith 1</strong>
                    </h4>
                  </div>
  
                  <!-- Single item -->
                  <div class="carousel-item">
                    <h4 class="text-center">
                      PMHNP.com has revolutionized how I connect with my patients. It's easy to use and gives my practice the visibility it needs. 
                      Since I joined, I've seen an uptick in patient inquiries and my schedule is consistently full. As a PMHNP, 
                      this platform is a game-changer! 
                    </h4>
                    <h4 class="text-center">
                      <span class="reviewpic">
                        <img src="{{ asset('src/img/reviewpic.jpg') }}" alt="">
                      </span> <strong>John smith 1</strong>
                    </h4>
                  </div>  
                  
                </div>
                <!-- Inner -->
              </div>
  
              <!-- Indicators -->
              <div class="control-row">
                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselPMHNP"
                  data-mdb-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-mdb-target="#carouselPMHNP"
                  data-mdb-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>  
  
            </div>

          </div>
        </div>

      </div>
    </div>
    <!-- Home slide end -->
    

  </div>
    
@endsection

  



 


