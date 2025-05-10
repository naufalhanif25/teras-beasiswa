<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Daftar Beasiswa') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-white">
    <div class="w-full fixed h-fit left-0 top-0 py-4">
        <a
        href="{{ route('admin.form') }}"
        class="text-[#0C9CEB] hover:text-[#36B5FA] hover:underline font-medium cursor-pointer px-8 rounded-full transition duration-200 ease-in-out">

        Kembali
        </a>
    </div>

    <main class="flex flex-col items-center justify-center gap-[4px]">
        <h1 class="text-2xl font-bold mb-4 text-center">Daftar Beasiswa</h1>
        <div class="w-[72vw] h-[76vh] overflow-hidden rounded-[16px]" style="border: 2px solid #94B4C7;">
            <div class="size-full overflow-auto">
                <table class="min-w-full border border-[#94B4C7] bg-[#FAFAFA]">
                    <thead class="bg-[#C9E8FB] text-[#244456] font-semibold">
                        <tr>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">ID Beasiswa</td>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">Nama Beasiswa</td>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">Deskripsi</td>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">Tanggal Buka</td>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">Tanggal Tutup</td>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">Kategori</td>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">URL Cover</td>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">Link Panduan</td>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">Link Sumber</td>
                            <td class="border border-[#94B4C7] px-4 py-2 text-center">Opsi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($beasiswa) && count($beasiswa) > 0)
                            @foreach($beasiswa as $item)
                                <tr class="hover:bg-gray-100 text-[#080808]">
                                    <td class="border border-[#94B4C7] px-4 py-2 text-center">{{ $item->id_beasiswa }}</td>
                                    <td class="cursor-pointer border border-[#94B4C7] px-4 py-2" ondblclick="toggleEdit(this)">
                                        <span class="view-mode">{{ $item->nama_beasiswa }}</span>
                                        <form action="{{ route('admin.beasiswa-update', $item->id_beasiswa) }}" method="POST" class="edit-mode hidden flex flex-col gap-[8px]">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="nama_beasiswa" value="{{ $item->nama_beasiswa }}" class="border rounded px-2 py-1 text-sm w-full">
                                            <button type="submit" class="bg-blue-500 text-white w-[68px] py-1 rounded mt-1">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="cursor-pointer border border-[#94B4C7] px-4 py-2" ondblclick="toggleEdit(this)">
                                        <span class="view-mode">{{ $item->deskripsi }}</span>
                                        <form action="{{ route('admin.beasiswa-update', $item->id_beasiswa) }}" method="POST" class="edit-mode hidden flex flex-col gap-[8px]">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="deskripsi" value="{{ $item->deskripsi }}" class="border rounded px-2 py-1 text-sm w-full">
                                            <button type="submit" class="bg-blue-500 text-white w-[68px] py-1 rounded mt-1">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="cursor-pointer border border-[#94B4C7] px-4 py-2 text-center" ondblclick="toggleEdit(this)">
                                        <span class="view-mode">
                                            {{ 
                                                $item->tanggal_buka 
                                            }}
                                        </span>
                                        <form action="{{ route('admin.beasiswa-update', $item->id_beasiswa) }}" method="POST" class="edit-mode hidden flex flex-col gap-[8px]">
                                            @csrf
                                            @method('PUT')
                                            <input type="date" name="tanggal_buka" value="{{ $item->tanggal_buka }}" class="border rounded px-2 py-1 text-sm w-full">
                                            <button type="submit" class="bg-blue-500 text-white w-[68px] py-1 rounded mt-1">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="cursor-pointer border border-[#94B4C7] px-4 py-2 text-center" ondblclick="toggleEdit(this)">
                                        <span class="view-mode">{{ $item->tanggal_tutup }}</span>
                                        <form action="{{ route('admin.beasiswa-update', $item->id_beasiswa) }}" method="POST" class="edit-mode hidden flex flex-col gap-[8px]">
                                            @csrf
                                            @method('PUT')
                                            <input type="date" name="tanggal_tutup" value="{{ $item->tanggal_tutup }}" class="border rounded px-2 py-1 text-sm w-full">
                                            <button type="submit" class="bg-blue-500 text-white w-[68px] py-1 rounded mt-1">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="cursor-pointer border border-[#94B4C7] px-4 py-2" ondblclick="toggleEdit(this)">
                                        <span class="view-mode">{{ $item->kategori }}</span>
                                        <form action="{{ route('admin.beasiswa-update', $item->id_beasiswa) }}" method="POST" class="edit-mode hidden flex flex-col gap-[8px]">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="kategori" value="{{ $item->kategori }}" class="border rounded px-2 py-1 text-sm w-full">
                                            <button type="submit" class="bg-blue-500 text-white w-[68px] py-1 rounded mt-1">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="cursor-pointer border border-[#94B4C7] px-4 py-2" ondblclick="toggleEdit(this)">
                                        <span class="view-mode cursor-pointer hover:underline text-[#0C9CEB] hover:text-[#36B5FA]" onclick="window.open('{{ $item->cover }}', '_blank')">{{ $item->cover }}</span>
                                        <form action="{{ route('admin.beasiswa-update', $item->id_beasiswa) }}" method="POST" class="edit-mode hidden flex flex-col gap-[8px]">
                                            @csrf
                                            @method('PUT')
                                            <input type="url" name="cover" value="{{ $item->cover }}" class="border rounded px-2 py-1 text-sm w-full">
                                            <button type="submit" class="bg-blue-500 text-white w-[68px] py-1 rounded mt-1">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="cursor-pointer border border-[#94B4C7] px-4 py-2" ondblclick="toggleEdit(this)">
                                        <span class="view-mode cursor-pointer hover:underline text-[#0C9CEB] hover:text-[#36B5FA]" onclick="window.open('{{ $item->url_panduan }}', '_blank')">{{ $item->url_panduan }}</span>
                                        <form action="{{ route('admin.beasiswa-update', $item->id_beasiswa) }}" method="POST" class="edit-mode hidden flex flex-col gap-[8px]">
                                            @csrf
                                            @method('PUT')
                                            <input type="url" name="url_panduan" value="{{ $item->url_panduan }}" class="border rounded px-2 py-1 text-sm w-full">
                                            <button type="submit" class="bg-blue-500 text-white w-[68px] py-1 rounded mt-1">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="cursor-pointer border border-[#94B4C7] px-4 py-2" ondblclick="toggleEdit(this)">
                                        <span class="view-mode cursor-pointer hover:underline text-[#0C9CEB] hover:text-[#36B5FA]" onclick="window.open('{{ $item->url_sumber }}', '_blank')">{{ $item->url_sumber }}</span>
                                        <form action="{{ route('admin.beasiswa-update', $item->id_beasiswa) }}" method="POST" class="edit-mode hidden flex flex-col gap-[8px]">
                                            @csrf
                                            @method('PUT')
                                            <input type="url" name="url_sumber" value="{{ $item->url_sumber  }}" class="border rounded px-2 py-1 text-sm w-full">
                                            <button type="submit" class="bg-blue-500 text-white w-[68px] py-1 rounded mt-1">Simpan</button>
                                        </form>
                                    </td>
                                    <td class="border border-[#94B4C7] px-4 py-2">
                                        <div class="flex flex-col items-center justify-center gap-[12px]">
                                            <form action="{{ route('admin.beasiswa-destroy', $item->id_beasiswa) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus beasiswa ini?')">
                                                @csrf
                                                @method('DELETE')
    
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white w-[64px] py-1 rounded">
                                                    Hapus
                                                </button>
                                            </form>    
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center border border-[#94B4C7] px-4 py-4 text-gray-500">Data tidak tersedia</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
        function toggleEdit(cell) {
            const viewMode = cell.querySelector('.view-mode');
            const editMode = cell.querySelector('.edit-mode');

            if (viewMode && editMode) {
                viewMode.classList.toggle('hidden');
                editMode.classList.toggle('hidden');
            }
        }
    </script>
</body>
</html>