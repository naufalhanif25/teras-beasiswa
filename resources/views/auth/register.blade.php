<x-guest-layout>
    <h1 class="title lato-bold mb-2" align="center">{{ __('Daftar') }}</h1>    

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Kata sandi')" />

            <div class="flex flex-row gap-[12px] items-center">
                <x-text-input id="password" class="block mt-1 w-full pr-10"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <!-- Show/Hide toggle -->
                <button class="flex items-center justify-center" style="padding: 12px 12px;" type="button" onclick="togglePassword('password', 'toggle-icon')">
                    <span id="toggle-icon">
                        <svg class="stroke-[var(--text-white)]" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2,12S5,4,12,4s10,8,10,8-2,8-10,8S2,12,2,12Z"></path>
                            <circle cx="12" cy="12" r="4"></circle>
                        </svg>
                    </span>
                </button>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Ulangi kata sandi')" />

            <div class="flex flex-row gap-[12px] items-center">
                <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10"
                                type="password"
                                name="password_confirmation" 
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                <!-- Show/Hide toggle -->
                <button class="flex items-center justify-center" style="padding: 12px 12px;" type="button" type="button" onclick="togglePassword('password_confirmation', 'toggle-icon-conf')">
                    <span id="toggle-icon-conf">
                        <svg class="stroke-[var(--text-white)]" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2,12S5,4,12,4s10,8,10,8-2,8-10,8S2,12,2,12Z"></path>
                            <circle cx="12" cy="12" r="4"></circle>
                        </svg>
                    </span>
                </button>
            </div>
        </div>

        <div class="flex items-center justify-end mt-8 gap-[16px]">
            <a class="lato-regular hover:underline" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="lato-regular">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>

    <script src="js/hideshow.js"></script>
</x-guest-layout>
