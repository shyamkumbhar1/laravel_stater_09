<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>
        <h1>Step 3 : Payment</h1>
        {{$UserData}}

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('create.step.three.post') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="full_name" :value="__('Full Name')" />

                <x-input id="full_name" class="block w-full mt-1" type="text" name="full_name" :value="old('name')" required autofocus />
            </div>




            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Next') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
