<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Beasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-white">
  <div class="w-full max-w-2xl p-6">
    <h2 class="text-center text-2xl font-semibold text-gray-800 mb-8">Tambah Beasiswa</h2>
    <form class="space-y-4">
      <input type="text" placeholder="Nama beasiswa" class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />

      <div class="flex flex-col space-y-1">
        <textarea
          placeholder="Deskripsi"
          rows="3"
          oninput="this.style.height='auto'; this.style.height = (this.scrollHeight)+'px';"
          class="w-full border border-[1.5px] border-[#60C3FD] rounded-3xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-[#60C3FD] resize-none overflow-hidden min-h-[96px]"
        ></textarea>
      </div>      

      <div class="flex gap-4">
        <div class="w-full">
          <label class="block text-sm text-gray-600 mb-1">Tanggal daftar</label>
          <input type="date" class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />
        </div>
        <div class="w-full">
          <label class="block text-sm text-gray-600 mb-1">Tanggal tutup</label>
          <input type="date" class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />
        </div>
      </div>

      <input type="url" placeholder="Link panduan" class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />

      <input type="url" placeholder="Link sumber" class="w-full border border-[1.5px] border-[#60C3FD] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#60C3FD]" />

   <!-- Tombol tambah -->
      <div class="flex justify-center pt-2">
        <button type="submit"
                class="bg-[#60C3FD] hover:bg-blue-500 text-white font-medium px-24 py-2 rounded-full transition duration-200 ease-in-out">
          Tambah
        </button>
      </div>
    </form>
  </div>
</body>
</html>
