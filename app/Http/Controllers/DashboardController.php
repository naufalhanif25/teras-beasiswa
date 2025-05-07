<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\infoBeasiswa; 
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        // Simpan riwayat pencarian ke tabel history jika keyword diisi dan user login
        if ($keyword && Auth::check()) {
            History::create([
                'query'   => $keyword,
                'user_id' => Auth::id(),
                'tanggal' => now()
            ]);
        }

        // Ambil data beasiswa dengan filter keyword jika ada
        $beasiswa = InfoBeasiswa::when($keyword, function ($query) use ($keyword) {
            return $query->where('nama_beasiswa', 'like', '%' . $keyword . '%');
        })->paginate(10);

        // Kirim data ke view dashboard.blade.php
        return view('dashboard', compact('beasiswa', 'keyword'));
    }
}
