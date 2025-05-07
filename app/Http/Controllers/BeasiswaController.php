<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoBeasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class BeasiswaController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Jumlah beasiswa per halaman
            $perPage = 10;

            // Cek apakah ada keyword pencarian
            $keyword = $request->input('keyword');

            // Query dasar
            $query = InfoBeasiswa::query();

            // Jika ada keyword, tambahkan filter pencarian
            if ($keyword) {
                $query->where(function($q) use ($keyword) {
                    $q->where('nama_beasiswa', 'like', '%' . $keyword . '%')
                      ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                      ->orWhere('kategori', 'like', '%' . $keyword . '%');

                    // Hanya tambahkan pencarian tanggal jika kolom benar-benar ada
                    if (Schema::hasColumn('info_beasiswa', 'tanggal_buka')) {
                        $q->orWhere('tanggal_buka', 'like', '%' . $keyword . '%');
                    }

                    if (Schema::hasColumn('info_beasiswa', 'tanggal_tutup')) {
                        $q->orWhere('tanggal_tutup', 'like', '%' . $keyword . '%');
                    }
                });
            }

            // Urutkan beasiswa - Pastikan kolom ini ada
            // Jika tidak yakin, gunakan id_beasiswa yang pasti ada
            $query->orderBy('id_beasiswa', 'desc');

            // Ambil data dengan pagination
            $beasiswa = $query->paginate($perPage);

            // Kembalikan view dengan data beasiswa
            return view('dashboard', compact('beasiswa'));

        } catch (\Exception $e) {
            // Log error
            Log::error('Error in BeasiswaController: ' . $e->getMessage());

            // Redirect dengan pesan error
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan saat memuat data. Silakan coba lagi.');
        }
    }

// Method Untuk Tambah Data Beasiswa Admin
public function store(Request $request)
{
    $request->validate([
        'nama_beasiswa' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal_buka' => 'required|date',
        'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
        'url_panduan' => 'required|url',
        'url_sumber' => 'required|url',
    ], [
        'nama_beasiswa.required' => 'Nama beasiswa wajib diisi.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'tanggal_buka.required' => 'Tanggal buka wajib diisi.',
        'tanggal_tutup.required' => 'Tanggal tutup wajib diisi.',
        'tanggal_tutup.after_or_equal' => 'Tanggal tutup tidak boleh lebih awal dari tanggal buka.',
        'url_panduan.required' => 'Link panduan wajib diisi.',
        'url_panduan.url' => 'Link panduan harus berupa URL yang valid.',
        'url_sumber.required' => 'Link sumber wajib diisi.',
        'url_sumber.url' => 'Link sumber harus berupa URL yang valid.',
    ]);

    InfoBeasiswa::create([
        'nama_beasiswa' => $request->nama_beasiswa,
        'deskripsi' => $request->deskripsi,
        'tanggal_buka' => $request->tanggal_buka,
        'tanggal_tutup' => $request->tanggal_tutup,
        'url_panduan' => $request->url_panduan,
        'url_sumber' => $request->url_sumber,
        'kategori' => '', // default sementara
        'cover' => '', // bisa ditambahkan nanti untuk upload
    ]);

    return redirect()->back()->with('success', 'Beasiswa berhasil ditambahkan!');
}
}
