<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="stylesheet" href="css/root.css">
        <link rel="stylesheet" href="css/welcome.css">
    </head>
    <body class="lato-regular h-screen w-screen flex flex-col items-center justify-start">
        <!-- Header -->
        <header class="fixed z-100 flex flex-row items-center justify-between" style="padding: 12px 24px;">
            
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>

            @if (Route::has('login'))
                <nav class="flex items-center justify-end" style="gap: 24px;">
                    @auth
                    @else
                        <a href="{{ route('login') }}" class="button text-[12pt]">Masuk</a>
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button text-[12pt]">Daftar</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Main -->
        <main class="w-screen h-fit flex flex-col items-center justify-center">
            <!-- Cover image -->
            <div class="w-screen h-[360px] flex items-center justify-center overflow-hidden">
                <img class="opacity-[0.5] w-full" src="img/illustration_fit.jpg">
                <div class="absolute z-1 flex flex-col items-center justify-center gap-[8px]">
                    <h1 class="text-[48pt] text-[var(--text-black)] lato-bold">Selamat Datang</h1>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="solid-button">Mulai sekarang</a>
                        @else
                            <a href="{{ route('login') }}" class="solid-button">Mulai sekarang</a>
                        @endauth
                    @endif
                </div>
            </div>

            <!-- Container -->
            <section class="w-screen h-fit flex flex-col items-center justify-center py-[32px]">
                <!-- About container -->
                <section class="w-screen flex flex-col items-center justify-center py-[24px] px-[208px] gap-[24px]">
                    <h1 class="text-[var(--text-black)] text-[20pt] lato-bold">Apa itu {{ config('app.name', 'Laravel') }}?</h1>
                    <p class="text-[var(--text-black)] text-[12pt] text-center">
                        {{ config('app.name', 'Laravel') }} adalah sebuah website sistem informasi beasiswa yang dirancang untuk memberikan kemudahan akses bagi para pencari beasiswa dengan menyediakan informasi yang lengkap, akurat, dan terorganisir. Platform ini memungkinkan pengguna untuk menemukan berbagai jenis beasiswa sesuai kebutuhan dan kriteria mereka dengan cepat dan efisien. Dengan antarmuka yang ramah pengguna dan navigasi yang intuitif, {{ config('app.name', 'Laravel') }} memastikan pengalaman pencarian beasiswa yang nyaman. Selain itu, sistem ini juga mengutamakan keamanan data dengan menerapkan enkripsi pada semua informasi pengguna, sehingga menjamin privasi dan kerahasiaan data pribadi secara maksimal.
                    </p>
                    <p class="quote text-[var(--text-black)] text-[12pt] lato-regular">
                        “Satu teras, ribuan peluang.”
                    </p>
                </section>

                <!-- Excellence container -->
                <section class="w-screen flex flex-col items-center justify-center py-[24px] px-[128px] gap-[24px]">
                    <h1 class="text-[var(--text-black)] text-[20pt] lato-bold">Keunggulan</h1>
                    <div class="w-full flex flex-row items-center justify-center gap-[16px]">
                        <span class="feature flex flex-grow flex-col items-center justify-start p-[20px]">
                            <span class="w-[80px] h-[80px] flex items-center justify-center">
                                <svg width="80px" height="80px" viewBox="-5 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M34.0234 6.68921C31.0764 4.97912 27.6525 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24C44 20.3727 43.0344 16.9709 41.3461 14.0377" class="stroke-[var(--base)]" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M31.9498 16.0502C31.9498 16.0502 28.5621 25.0947 27.0001 26.6568C25.438 28.2189 22.9053 28.2189 21.3432 26.6568C19.7811 25.0947 19.7811 22.562 21.3432 20.9999C22.9053 19.4378 31.9498 16.0502 31.9498 16.0502Z" class="stroke-[var(--base)]" stroke-width="3.2" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <h1 class="text-[16pt] lato-bold text-center">Cepat</h1>
                            <p class="text-[12pt] text-center">Cari beasiswa dengan cepat</p>
                        </span>
                        <span class="feature flex flex-grow flex-col items-center justify-start p-[20px]">
                            <span class="w-[80px] h-[80px] flex items-center justify-center">
                                <svg fill="none" width="78px" height="78px" viewBox="0 0 24 24" id="secure" data-name="Line Color" xmlns="http://www.w3.org/2000/svg" class="icon line-color">
                                    <polyline points="9 11 11 13 15 9" class="stroke-[var(--base)]" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"></polyline>
                                    <path d="M12,21l.88-.38a11,11,0,0,0,6.63-9.26l.43-5.52a1,1,0,0,0-.76-1L12,3,4.82,4.8a1,1,0,0,0-.76,1l.43,5.52a11,11,0,0,0,6.63,9.26Z" class="stroke-[var(--base)]" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"></path>
                                </svg>
                            </span>
                            <h1 class="text-[16pt] lato-bold text-center">Aman</h1>
                            <p class="text-[12pt] text-center">Data pengguna terenkripsi</p>
                        </span>
                        <span class="feature flex flex-grow flex-col items-center justify-start p-[20px]">
                            <span class="w-[80px] h-[80px] flex items-center justify-center">
                                <svg width="72px" height="72px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path class="stroke-[var(--base)]" fill="none" stroke-width="1.4" d="M2,5.07692308 C2,5.07692308 3.66666667,2 12,2 C20.3333333,2 22,5.07692308 22,5.07692308 L22,18.9230769 C22,18.9230769 20.3333333,22 12,22 C3.66666667,22 2,18.9230769 2,18.9230769 L2,5.07692308 Z M2,13 C2,13 5.33333333,16 12,16 C18.6666667,16 22,13 22,13 M2,7 C2,7 5.33333333,10 12,10 C18.6666667,10 22,7 22,7"/>
                                </svg>
                            </span>
                            <h1 class="text-[16pt] lato-bold text-center">Lengkap</h1>
                            <p class="text-[12pt] text-center">100.000+ beasiswa terbaru</p>
                        </span>
                    </div>
                </section>
            </section>
        </main>

        <!-- Footer -->
        <x-footer></x-footer>
    </body>
</html>
