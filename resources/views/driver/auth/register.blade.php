<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/img/logo/logo.png" style=" margin-top:0px; margin-left: 10px;" width="120px;" alt="">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Role') }}" />
                <x-jet-input id="role" style="text-align:center; font-weight:900; font-size:20px; color:;"  value="Driver" class="block mt-1 w-full" type="text" name="role" readonly/>
            </div>
            <div class="mt-4 hidden">
                <!-- ALlowed Login -->
                    <label class="switch">
                    <input type="checkbox" name="loginauth" id="loginauth" value="0" checked>
                    <span class="slider round"></span>
                  </label>
                </div>
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div>
                
            </div>

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
