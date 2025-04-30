<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoBeasiswa;
use Illuminate\Support\Facades\DB;

class BeasiswaController extends Controller
{
    public function index(Request $request)
    {
        // Jumlah beasiswa per halaman
        $perPage = 3;
        
        // Cek apakah ada keyword pencarian
        $keyword = $request->input('keyword');
        
        // Query dasar
        $query = InfoBeasiswa::query();
        
        // Jika ada keyword, tambahkan filter pencarian
        if ($keyword) {
            $query->where('nama_beasiswa', 'like', '%' . $keyword . '%')
                  ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                  ->orWhere('kategori', 'like', '%' . $keyword . '%');
        }
        
        // Ambil data dengan pagination
        $beasiswa = $query->paginate($perPage);
        
        // Kembalikan view dengan data beasiswa
        return view('dashboard', compact('beasiswa'));
    }
}