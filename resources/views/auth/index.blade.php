<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <h1> Update Details :</h1>
        <div>
            {{ Auth::user()->id}}

        </div>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-label for="phone_number" :value="__('Phone Number')" />

                <x-input id="phone_number" class="block w-full mt-1" type="text" name="phone_number" :value="old('phone_number')"
                    placeholder="Phone Number" required autofocus />
            </div>
            <div>
                <x-label for="professional_license_number" :value="__('Professional License Number')" />

                <x-input id="professional_license_number" class="block w-full mt-1" type="text"
                    name="professional_license_number" :value="old('professional_license_number')" placeholder="Professional License Number"
                    required />
            </div>


            <div>
                <label for="state_of_licensure">State of Licensure</label>

                <select id="state_of_licensure" class="block w-full mt-1" name="state_of_licensure" required>
                    <option value="">Select State of Licensure</option>
                    <option value="ME">Maine (ME) </option>

                    <!-- Add more options as needed -->
                    <option value="other">Other</option>
                </select>
            </div>

            {{-- <div>
                <x-label for="areas_of_expertise" :value="__('Areas of Expertise')" />

                <x-input id="areas_of_expertise" class="block w-full mt-1" type="text" name="areas_of_expertise"
                    :value="old('areas_of_expertise')" placeholder="Areas of Expertise" required />
            </div> --}}
            <div>
                <x-label for="areas_of_expertise" :value="__('Areas of Expertise')" />

                <div>
                    <input id="area_of_expertise1" type="checkbox" name="areas_of_expertise[]" value="child psychiatry" {{ in_array('option1', old('areas_of_expertise', [])) ? 'checked' : '' }}>
                    <label for="area_of_expertise1">child psychiatry</label>
                </div>


                <!-- Add more checkboxes as needed -->

                <div>
                    <input id="area_of_expertise_other" type="checkbox" name="areas_of_expertise[]" value="other" {{ in_array('other', old('areas_of_expertise', [])) ? 'checked' : '' }}>
                    <label for="area_of_expertise_other">Other</label>
                </div>
            </div>

            {{-- <div>
                <x-label for="bio" :value="__('Bio')" />

                <x-input id="bio" class="block w-full mt-1" type="text" name="bio" :value="old('bio')"
                    placeholder="Bio" required />
            </div> --}}
            <div>
                <x-label for="bio" :value="__('Bio')" />

                <textarea id="bio" class="block w-full mt-1" name="bio" placeholder="Bio" required>{{ old('bio') }}</textarea>
            </div>

            {{-- <div>
                <x-label for="profile_picture" :value="__('Profile Picture')" />

                <x-input id="profile_picture" class="block w-full mt-1" type="text" name="profile_picture"
                    :value="old('profile_picture')" placeholder="Profile Picture" required />
            </div> --}}
            <div>
                <x-label for="profile_picture" :value="__('Profile Picture')" />

                <input id="profile_picture" class="block w-full mt-1" type="file" name="profile_picture" accept="image/*"  />
            </div>


            <div>
                <x-label for="work_address" :value="__('Work Address')" />

                <x-input id="work_address" class="block w-full mt-1" type="text" name="work_address"
                    :value="old('work_address')" placeholder="Work Address" required />
            </div>



            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Complete Profile') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
