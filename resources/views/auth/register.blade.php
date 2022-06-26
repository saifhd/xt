<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            {{-- Contact No --}}
            <div>
                <x-label for="contact_no" :value="__('Contact No')" />

                <x-input id="contact_no" class="block mt-1 w-full" type="text" name="contact_no" :value="old('contact_no')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            {{-- DOB --}}
            <div class="mt-4">
                <x-label for="dob" :value="__('Date Of Birth')" />

                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" />
            </div>

            {{-- Address --}}
            <div class="mt-4">
                <x-label for="address_line_1" :value="__('Address Line 1')" />

                <x-input id="address_line_1" class="block mt-1 w-full" type="text" name="address_line_1" :value="old('address_line_1')" required />
            </div>
            <div class="mt-4">
                <x-label for="address_line_2" :value="__('Address Line 2')" />

                <x-input id="address_line_2" class="block mt-1 w-full" type="text" name="address_line_2" :value="old('address_line_2')" required />
            </div>
            <div class="mt-4">
                <x-label for="address_line_3" :value="__('Address Line 3')" />

                <x-input id="address_line_3" class="block mt-1 w-full" type="text" name="address_line_3" :value="old('address_line_3')" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
