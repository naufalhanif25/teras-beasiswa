<x-guest-layout>
    <h1 class="title lato-bold mb-4" align="center">{{ __('Lupa Kata Sandi') }}</h1>

    <div class="mb-4 lato-regular text-justify">
        {{ __('Anda lupa kata sandi? Tidak masalah. Cukup berikan alamat email Anda dan kami akan mengirimkan tautan pengaturan ulang kata sandi melalui email.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="lato-regular">
                {{ __('Kirim tautan ke email') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
