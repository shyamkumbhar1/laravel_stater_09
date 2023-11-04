  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-header">
      <!-- Container wrapper -->
      <div class="container align-items-center">

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <a class="mt-2 navbar-brand mt-lg-0" href="{{ route('welcome') }}">
            <img src="{{ asset('src/img/logo.jpg') }}" alt="" loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="mb-2 navbar-nav mb-lg-0">
            <li class="nav-item">
             <!--  <a class="nav-link" href="{{ route('home.find_pmhnps') }}">Find PMHNPs</a> -->
               <a class="nav-link" href="#">Find PMHNPs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#How-It-Works">How It Works</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.about') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.contact') }}">Contact Us</a>
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
      
        @if (Auth::user())
        <div class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              {{-- <img src="{{ asset('src/img/profilpic.jpg') }}" class="rounded-circle" height="25" alt="" loading="lazy" /> --}}


           @php
$img_call = auth()->user()->profile_picture;
if($img_call=='')
{
@endphp
 
  <img src="{{asset('storage/Profile-Picture/default-image.jfif')  }}" alt="profile Image" class="rounded-circle" height="25" alt="" loading="lazy">
@php
}else{
@endphp
 <img src="{{ asset(auth()->user()->profile_picture) }}" alt="profile Image" class="rounded-circle" height="25" alt="" loading="lazy">

  
  @php
}
@endphp




            {{-- <img src="{{ asset('storage/Profile-Picture\1.jfif') }}" alt="dfggg"> --}}
              {{-- <h1>{{ dd(Auth::user()->profile_picture,Auth::user()->name) }}</h1> --}}
              
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                  <a class="dropdown-item" href="{{ route('user.Dashboard') }}">Dashboard</a>
              </li> 
              {{-- <li>
                  <a class="dropdown-item" href="{{ route('user.Dashboard.my.profile') }}">My profile</a>
              </li> --}}
               <li>
                  <a class="dropdown-item" href="{{ route('user.Dashboard.edit') }}">Update profile</a>
              </li>
              <li>
                  <a class="dropdown-item" href="{{ route('user.my.subscription') }}">My subscription</a>
              </li>
              {{-- <li>
                <a class="dropdown-item" href="{{ route('user.my.reviews') }}">My reviews</a>
            </li> --}}
              <li>
                <a class="nav-link"  href="#">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </a>
              </li>
          </ul>
        </div>
        @else
        <div class="d-flex align-items-center">
          <a class="text-reset nav-link-singin me-3" href="{{ route('login') }}">
            PMHNP Sign in
          </a>
          <a class="btn btn-primary" href="{{ route('register.step.one') }}">
            PMHNP Sign up
          </a>
         
        </div>
        @endif        
      
       
        <!-- Right elements -->
      </div>
      
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

  </header>
  <!--Main Navigation-->