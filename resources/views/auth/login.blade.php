<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="title lato-bold mb-2" align="center">{{ __('Masuk') }}</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Kata sandi')" />

            <div class="flex flex-row gap-[12px] items-center">
                <x-text-input id="password" class="block mt-1 w-full pr-10"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

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

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center gap-[12px]">
                <input id="remember_me" type="checkbox" class="checkbox rounded border-[var(--base-mid)]" name="remember">
                <span class="text-[10px] lato-regular">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4 gap-[16px]">
            @if (Route::has('password.request'))
                <a class="lato-regular hover:underline" href="{{ route('password.request') }}">
                    {{ __('Lupa kata sandi?') }}
                </a>
            @endif

            <x-primary-button class="lato-regular">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>

    <script src="js/hideshow.js"></script>
</x-guest-layout>
