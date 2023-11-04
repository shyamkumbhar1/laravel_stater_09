@extends('layouts2.app')


@section('content')
    <div class="page-height">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="steps-row">
                        <ul>
                            <li class="active">
                                <a href="{{ route('register.step.one') }}"> <span>1</span> Step 1 </a>
                            </li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                            <li>
                               <!--  <a href="{{ route('plans.all') }}"> <span><i class="fa fa-check"
                                            aria-hidden="true"></i></span> Step 2 </a> -->

                                             <a  > <span><i class="fa fa-check"
                                            aria-hidden="true"></i></span> Step 2 </a>
                            </li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                            <li>
                                <a  > <span><i class="fa fa-check" aria-hidden="true"></i> </span> Step 3 </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mb-4 row">
                <div class="col-md-12">
                    <h2 class="mb-4 text-center">Sign up As PMHNP Professional</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif

                    <form class="padding" method="POST" action="{{ route('register.step.one.post') }}" autocomplete="off"
                        id="regForm">
                        @csrf

                        <div class="mb-4 form-outline">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label class="form-label" for="name">{{ __(' Full Name') }} <span
                                    class="mandatory">*</span></label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <!-- <label for="professional_title" class="col-form-label">Professional Title <span class="mandatory">*</span></label> -->
                            <select id="professional_title" class="form-select form-control" name="professional_title"
                                required>
                                <option value="">Select Professional Title</option>
                                <option value="DNP">DNP (Doctor of Nursing Practice)</option>
                                <option value="MSN"> MSN (Master of Science in Nursing)</option>
                                <option value="RN">RN (Registered Nurse)</option>
                                <option value="PMHNP-BC">PMHNP-BC (Board Certified Psychiatric-Mental Health Nurse
                                    Practitioner)</option>
                                <!-- Add more options as needed -->
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="mb-4 form-outline">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="email" class="form-label">{{ __('Email Address') }}<span
                                    class="mandatory">*</span></label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-outline">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            <label for="password" class="form-label">{{ __('Password') }}<span
                                    class="mandatory">*</span></label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-outline">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}<span
                                    class="mandatory">*</span></label>
                        </div>

                        <div class="mb-4 text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                {{ __('Sign Up') }}
                            </button>
                        </div>


                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <!-- Custom scripts -->
    <script type="text/javascript">
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleButton = document.querySelector(".toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.parentNode.classList.add("password-visible");
            } else {
                passwordInput.type = "password";
                toggleButton.parentNode.classList.remove("password-visible");
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                    name: "required",
                    email: "required",
                    professional_title: "required",
                    password: "required",

                }
            });
        });
    </script>
@endsection
