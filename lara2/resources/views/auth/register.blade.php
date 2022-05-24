<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

                <div class="mt-4">
                    <x-jet-label for="username" value="{{ __('username') }}" />
                    <x-jet-input id="username" class="block mt- w-full" type="text" name="username" :value="old('username')" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="contact" value="Contact" />
                    <x-jet-input id="contact" class="block mt- w-full" type="text" name="contact" :value="old('contact')" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="address" value="address "/>
                    <x-jet-input id="address" class="block mt- w-full" type="text" name="address" :value="old('address')" required/>
                </div>

    
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="date_of_birth" value="{{ __('date_of_birth') }}" />
                <x-jet-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="gender" value="{{ __('gender') }}" />
                <select id="gender" class="block mt-1 w-full" type="gender" name="gender" :value="old('gender')" required >
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="status" value="{{ __('status') }}" />
                <select id="status" class="block mt-1 w-full" type="status" name="status" :value="old('status')" required >
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
            </div>
            
            <div class="mt-4">
                <x-jet-label for="userType" value="{{ __('userType') }}" />
                <select id="userType" class="block mt-1 w-full" type="userType" name="userType" :value="old('userType')" required >
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Married">Guest</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="schoolName" value="{{ __(' School Name') }}" />
                <x-jet-input id="schoolName" class="block mt-1 w-full" type="text" name="schoolName" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="border-gray-300 block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <x-jet-input id="active" class="border-gray-300 block mt-1 w-full" type="hidden" name="active" value="1" required />
            <!-- <x-jet-input id="lastLogin" class="border-gray-300 block mt-1 w-full" type="hidden" name="lastLogin" /> -->

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
