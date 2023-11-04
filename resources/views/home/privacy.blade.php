@extends('layouts2.app')

@section('content')
<div class="page-height">
    <div class="container">


      <div class="mt-5 mb-4 row">
        <div class="col-md-12">
          <h1 class="mb-4 text-center">Privacy Policy</h1>
        </div>
      </div>




      <div class="row ">
        <div class="col-md-12">

          <p>
           Thank you for using  Pmhnp, developed by Pmhnp. This Privacy Policy outlines how we collect, use, and protect your personal information when you interact with our Software. By using our Software, you agree to the practices described in this Privacy Policy.
          </p>
        <p>Information We Collect<br>
1.1. Personal Information: We may collect personal information that you provide directly to us, such as your name, email address, postal address, phone number, and any other information you choose to provide when using our Software.
        </p>
        <p>1.2. Automatically Collected Information: When you use our Software, certain information is automatically collected, including your device information (e.g., device type, operating system, and version), IP address, browsing activity, and usage statistics.

        </p>
        <p>
1.3. Cookies and Similar Technologies: We use cookies and similar tracking technologies to enhance your experience and collect information about how you use our Software. These technologies help us understand user behavior, improve our services, and deliver personalized content.

        </p>
        <p>
            How We Use Your Information<br>
2.1. Providing and Improving the Software: We use your personal information to provide you with access to our Software and its features. We may also use this information to enhance and improve the functionality and performance of our Software.

        </p>
        <p>
2.2. Communications: We may use your email address to send you important updates, announcements, or information related to our Software. You can opt-out of marketing communications at any time.

        </p>
        <p>2.3. Analytics: We use the automatically collected information to analyze usage patterns, troubleshoot issues, and optimize the Software's performance.
        </p>
          <p>2.4. Legal Compliance: We may use your information to comply with applicable laws, regulations, legal processes, or government requests.
        </p>
          <p>Data Sharing and Disclosure<br>
3.1. Third-Party Service Providers: We may share your personal information with trusted third-party service providers who assist us in operating our Software and providing services to you. These providers are bound by confidentiality agreements and are not allowed to use your personal information for any other purpose.

        </p>
          <p>3.2. Business Transfers: In the event of a merger, acquisition, or sale of all or a portion of our company, your personal information may be transferred to the acquiring entity.

        </p>
          <p>3.3. Legal Requirements: We may disclose your personal information if required by law or in response to a valid legal request.
        </p>
          <p>Data Security<br>
We take reasonable measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure. Therefore, we cannot guarantee absolute security.
        </p>
          <p>Your Choices and Rights<br>
You have the right to access, update, and delete your personal information. If you wish to exercise any of these rights or have questions about our data practices.

        </p>
          <p>Children's Privacy<br>
Our Software is not intended for use by individuals under the age of 21. We do not knowingly collect personal information from children under this age. If we become aware that we have inadvertently collected personal information from a child, we will take steps to delete such information as soon as possible.

        </p>
        <p>Changes to this Privacy Policy<br>
We may update this Privacy Policy from time to time. We will notify you of any significant changes by posting a prominent notice on our website or through other communication channels.

        </p>
         <p>Contact Us<br>
If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices.
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
