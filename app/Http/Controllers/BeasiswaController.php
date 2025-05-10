<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\infoBeasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class BeasiswaController extends Controller
{
    public function index(Request $request)
    {
        try {
            $perPage = 10;
            $keyword = $request->input('keyword');
            $query = infoBeasiswa::query();

            if ($keyword) {
                $query->where(function($q) use ($keyword) {
                    $q->where('nama_beasiswa', 'like', '%' . $keyword . '%')
                      ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                      ->orWhere('kategori', 'like', '%' . $keyword . '%');

                    if (Schema::hasColumn('info_beasiswa', 'tanggal_buka')) {
                        $q->orWhere('tanggal_buka', 'like', '%' . $keyword . '%');
                    }

                    if (Schema::hasColumn('info_beasiswa', 'tanggal_tutup')) {
                        $q->orWhere('tanggal_tutup', 'like', '%' . $keyword . '%');
                    }
                });
            }

            $query->orderBy('id_beasiswa', 'desc');
            $beasiswa = $query->paginate($perPage);
            
            return view('dashboard', compact('beasiswa'));
            
        } catch (\Exception $e) {
            Log::error('Error in BeasiswaController: ' . $e->getMessage());
            
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan saat memuat data. Silakan coba lagi.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
            'kategori' => 'nullable|string|max:255',
            'cover' => 'nullable|url',
            'url_panduan' => 'nullable|url',
            'url_sumber' => 'nullable|url',
        ], [
            'nama_beasiswa.required' => 'Nama beasiswa wajib diisi.',
            'tanggal_buka.required' => 'Tanggal buka wajib diisi.',
            'tanggal_tutup.required' => 'Tanggal tutup wajib diisi.',
            'tanggal_tutup.after_or_equal' => 'Tanggal tutup tidak boleh lebih awal dari tanggal buka.',
            'cover.url' => 'URL cover harus valid.',
            'url_panduan.url' => 'Link panduan harus berupa URL yang valid.',
            'url_sumber.url' => 'Link sumber harus berupa URL yang valid.',
        ]);

        infoBeasiswa::create([
            'nama_beasiswa' => $request->nama_beasiswa,
            'deskripsi' => $request->deskripsi,
            'tanggal_buka' => $request->tanggal_buka,
            'tanggal_tutup' => $request->tanggal_tutup,
            'url_panduan' => $request->url_panduan ?: "#",
            'url_sumber' => $request->url_sumber ?: "#",
            'kategori' => $request->kategori ?: '',
            'cover' => $request->cover ?: "https://t3.ftcdn.net/jpg/05/79/68/24/360_F_579682465_CBq4AWAFmFT1otwioF5X327rCjkVICyH.jpg",
        ]);

        return redirect()->back()->with('success', 'Beasiswa berhasil ditambahkan!');
    }
}