@extends('layouts2.app')

@section('content')
<div class="page-height">
    <div class="container">


      <div class="mt-5 mb-4 row">
        <div class="col-md-12">
          <h1 class="mb-4 text-center">Terms & Condition</h1>
        </div>
      </div>




      <div class="row ">
        <div class="col-md-12">

          <p>
            
Thank you for choosing Pmhnp, developed by Pmhnp. By using our Software, you agree to be bound by the following Terms of Use. Please read them carefully before using the Software.

          </p>
           
           <p>License and Restrictions<br>
1.1. License Grant: Subject to your compliance with these Terms of Use, we grant you a limited, non-exclusive, non-transferable, and revocable license to use the Software for personal or internal business purposes.

           </p>

          <p>1.2. Restrictions: You may not, under any circumstances:

           </p>
 <p>a) Copy, modify, adapt, translate, or create derivative works based on the Software;

           </p>

           
            <p>b) Reverse engineer, decompile, disassemble, or attempt to derive the source code of the Software;

           </p>
 <p>c) Remove, alter, or obscure any proprietary notices on the Software;

           </p>


             <p>
d) Use the Software in any manner that violates applicable laws or regulations or for any illegal or unauthorized purpose;

           </p>
 <p>e) Use the Software to infringe on the intellectual property rights or privacy rights of others;

           </p>
 <p>f) Share, sublicense, lease, lend, or distribute the Software to any third party without our prior written consent.

           </p>
 <p>User Accounts<br>
2.1. Registration: To use certain features of the Software, you may be required to create a user account. You are responsible for providing accurate and complete information during the registration process and keeping your login credentials secure.

           </p>
 <p>2.2. Account Termination: We reserve the right to suspend or terminate your account at any time if you violate these Terms of Use or engage in any fraudulent or abusive behavior.
           </p>
 <p>Intellectual Property
3.1. Ownership: The Software, including all associated intellectual property rights, is and shall remain the sole property of Pmhnp or its licensors. These Terms of Use do not grant you any right or license to use any trademarks, logos, or other proprietary elements of Pmhnp.

           </p>
 <p>Updates and Support<br>
4.1. Updates: We may release updates, patches, or new versions of the Software from time to time to improve functionality or address issues.
           </p>
 <p>
4.2. Support: We may provide customer support for the Software as described on our website or through other communication channels.
           </p>
 <p>Disclaimer of Warranty<Br>
5.1. AS IS: THE SOFTWARE IS PROVIDED "AS IS" WITHOUT WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED. PMHNP DISCLAIMS ALL WARRANTIES, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT.
           </p>
 <p>Limitation of Liability<br>
6.1. No Consequential Damages: IN NO EVENT SHALL PMHNP BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES ARISING OUT OF OR IN CONNECTION WITH THE USE OF THE SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
           </p>
<p>Indemnification<br>
7.1. Indemnity: You agree to indemnify, defend, and hold harmless PMHNP, its officers, directors, employees, and affiliates from and against any and all claims, liabilities, damages, losses, or expenses, including reasonable attorneys' fees and costs, arising out of or in any way connected with your use of the Software or violation of these Terms of Use.

</p>
<p>Changes to the Terms of Use<br>
8.1. Amendments: We may modify these Terms of Use at any time by posting the revised version on our website or through other means. Your continued use of the Software after such changes will constitute your acceptance of the updated Terms of Use.

</p>
<p>Governing Law and Jurisdiction<br>
9.1. Applicable Law: These Terms of Use shall be governed by and construed in accordance with the laws of Jurisdiction, without regard to its conflict of laws principles.

</p>
<p>
9.2. Dispute Resolution: Any dispute arising out of or in connection with these Terms of Use shall be subject to the exclusive jurisdiction of the courts located.
</p>
<p>Contact Us<Br>
If you have any questions, concerns, or feedback regarding these Terms of Use or the Software.
</p>
<p>
</p>
<p>
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
