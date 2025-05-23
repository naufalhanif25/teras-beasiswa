<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('Login Admin') }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    input:-webkit-autofill {
      -webkit-box-shadow: 0 0 0px 1000px white inset !important;
      box-shadow: 0 0 0px 1000px white inset !important;
      -webkit-text-fill-color: black !important;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-white">
<div class="w-full fixed h-fit left-0 top-0 py-4">
        <a
        href="{{ route('welcome') }}"
        class="text-[#0C9CEB] hover:text-[#36B5FA] hover:underline font-medium cursor-pointer px-8 rounded-full transition duration-200 ease-in-out">

        Beranda
        </a>
    </div>

  <div class="w-full max-w-sm text-center">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Admin</h2>

    {{-- Pesan error jika login gagal --}}
    @if($errors->has('login'))
      <div class="mb-4 text-red-600 text-sm font-medium text-center">
        {{ $errors->first('login') }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
      @csrf
    
      <input type="text" name="username_admin" placeholder="Username" autocomplete="off"
             class="w-full appearance-none bg-white text-black border border-[1.5px] border-[#60C3FD] rounded-full px-5 py-2
                    focus:outline-none focus:ring-0 focus:border-[#60C3FD] placeholder-gray-400" />
    
      <input type="password" name="password" placeholder="Password" autocomplete="off"
             class="w-full appearance-none bg-white text-black border border-[1.5px] border-[#60C3FD] rounded-full px-5 py-2
                    focus:outline-none focus:ring-0 focus:border-[#60C3FD] placeholder-gray-400" />
    
      <button type="submit"
              class="w-full bg-[#60C3FD] hover:bg-blue-400 text-white text-sm font-medium py-2 rounded-full 
                     transition duration-200 ease-in-out">
        Log in
      </button>
    </form>
  </div>
</body>
</html>