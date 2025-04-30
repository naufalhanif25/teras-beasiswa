<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoBeasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
            \Log::error('Error in BeasiswaController: ' . $e->getMessage());
            
            // Redirect dengan pesan error
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan saat memuat data. Silakan coba lagi.');
        }
    }
}