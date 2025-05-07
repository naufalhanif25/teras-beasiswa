<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Beasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-white">
  <div class="w-full fixed h-fit left-0 top-0 py-4">
    <a
      href="{{ route('admin.logout') }}"
      class="text-red-500 hover:text-red-600 hover:underline font-medium cursor-pointer px-8 rounded-full transition duration-200 ease-in-out">

      Logout
    </a>
  </div>

  <div class="w-full max-w-2xl p-6">

    {{-- Alert berhasil --}}
    @if (session('success'))
      <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <h2 class="text-center text-2xl font-semibold text-gray-800 mb-8">Tambah Beasiswa</h2>

    <form method="POST" action="{{ route('beasiswa.store') }}" class="space-y-4">
      @csrf

      <input type="text" name="nama_beasiswa" placeholder="Nama beasiswa" value="{{ old('nama_beasiswa') }}"
             class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />
      @error('nama_beasiswa')
        <p class="text-red-500 text-sm mt-1">* {{ $message }}</p>
      @enderror

      <div class="flex flex-col space-y-1">
        <textarea name="deskripsi" placeholder="Deskripsi" rows="3"
                  oninput="this.style.height='auto'; this.style.height = (this.scrollHeight)+'px';"
                  class="w-full border border-[1.5px] border-[#60C3FD] rounded-3xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-[#60C3FD] resize-none overflow-hidden min-h-[96px]">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
          <p class="text-red-500 text-sm mt-1">* {{ $message }}</p>
        @enderror
      </div>

      <div class="flex gap-4">
        <div class="w-full">
          <label class="block text-sm text-gray-600 mb-1">Tanggal daftar <span class="text-red-500">*</span></label>
          <input type="date" name="tanggal_buka" value="{{ old('tanggal_buka') }}"
                 class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />
          @error('tanggal_buka')
            <p class="text-red-500 text-sm mt-1">* {{ $message }}</p>
          @enderror
        </div>
        <div class="w-full">
          <label class="block text-sm text-gray-600 mb-1">Tanggal tutup <span class="text-red-500">*</span></label>
          <input type="date" name="tanggal_tutup" value="{{ old('tanggal_tutup') }}"
                 class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />
          @error('tanggal_tutup')
            <p class="text-red-500 text-sm mt-1">* {{ $message }}</p>
          @enderror
        </div>
      </div>

      <input type="url" name="url_panduan" placeholder="Link panduan" value="{{ old('url_panduan') }}"
             class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />
      @error('url_panduan')
        <p class="text-red-500 text-sm mt-1">* {{ $message }}</p>
      @enderror

      <input type="url" name="url_sumber" placeholder="Link sumber" value="{{ old('url_sumber') }}"
             class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />
      @error('url_sumber')
        <p class="text-red-500 text-sm mt-1">* {{ $message }}</p>
      @enderror

      <div class="flex flex-row gap-[8px] justify-center pt-2">
        <button type="submit"
                class="bg-[#60C3FD] hover:bg-blue-400 text-white font-medium px-24 py-2 rounded-full transition duration-200 ease-in-out">
          Tambah
        </button>
      </div>
    </form>
  </div>
</body>
</html>