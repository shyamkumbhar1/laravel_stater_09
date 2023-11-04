<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <h1><strong>Update Your Details :</strong> </h1>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Full Name')" />

                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name',$user->name)" required autofocus />
            </div>
            <div>
                <label for="professional_title">Professional Title</label>

                <select id="professional_title" class="block w-full mt-1" name="professional_title" required>
                    <option value="">Select Professional Title</option>
                    <option value="DNP" {{ old('professional_title', $user->professional_title) === 'DNP' ? 'selected' : '' }}>Doctor of Nursing Practice (DNP)</option>
                    <option value="MSN" {{ old('professional_title', $user->professional_title) === 'MSN' ? 'selected' : '' }}>Master of Science in Nursing (MSN)</option>
                    <option value="RN" {{ old('professional_title', $user->professional_title) === 'RN' ? 'selected' : '' }}> Registered Nurse (RN)</option>
                    <option value="PMHNP-BC" {{ old('professional_title', $user->professional_title) === 'PMHNP-BC' ? 'selected' : '' }}>Board Certified Psychiatric-Mental Health Nurse Practitioner (PMHNP-BC)</option>
                    <!-- Add more options as needed -->
                    <option value="other" {{ old('professional_title', $user->professional_title) === 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>


            <div>
                <x-label for="phone_number" :value="__('Phone Number')" />

                <x-input id="phone_number" class="block w-full mt-1" type="text" name="phone_number" :value="old('phone_number', $user->phone_number)"
                    placeholder="Phone Number" required autofocus />
            </div>
            <div>
                <x-label for="professional_license_number" :value="__('Professional License Number')" />

                <x-input id="professional_license_number" class="block w-full mt-1" type="text"
                    name="professional_license_number" :value="old('professional_license_number', $user->professional_license_number)"
                    placeholder="Professional License Number" required />
            </div>

            <div>
                <label for="state_of_licensure">State of Licensure</label>

                <select id="state_of_licensure" class="block w-full mt-1" name="state_of_licensure" required>
                    <option value="">Select State of Licensure</option>
                    <option value="ME" {{ old('state_of_licensure', $user->state_of_licensure) === 'ME' ? 'selected' : '' }}>Maine (ME)</option>
                    <!-- Add more options as needed -->
                    <option value="other" {{ old('state_of_licensure', $user->state_of_licensure) === 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div>
                <x-label for="areas_of_expertise" :value="__('Areas of Expertise')" />

                {{-- <div>
                    <input id="area_of_expertise1" type="checkbox" name="areas_of_expertise[]" value="child psychiatry" {{ in_array('child psychiatry', old('areas_of_expertise', $user->areas_of_expertise), true) ? 'checked' : '' }}>
                    <label for="area_of_expertise1">child psychiatry</label>
                </div> --}}

                <!-- Add more checkboxes as needed -->

                {{-- <div>
                    <input id="area_of_expertise_other" type="checkbox" name="areas_of_expertise[]" value="other" {{ in_array('other', old('areas_of_expertise', $user->areas_of_expertise), true) ? 'checked' : '' }}>
                    <label for="area_of_expertise_other">Other</label>
                </div> --}}
            </div>

            <div>
                <x-label for="bio" :value="__('Bio')" />

                <textarea id="bio" class="block w-full mt-1" name="bio" placeholder="Bio" required>{{ old('bio', $user->bio) }}</textarea>
            </div>

            {{-- <div>
                <x-label for="profile_picture" :value="__('Profile Picture')" />

                <input id="profile_picture" class="block w-full mt-1" type="file" name="profile_picture" accept="image/*" />
            </div> --}}

            <div>
                <x-label for="work_address" :value="__('Work Address')" />

                <textarea id="work_address" class="block w-full mt-1" type="text" name="work_address"
                    :value="old('work_address', $user->work_address)" placeholder="Work Address" required />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Update Profile') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
