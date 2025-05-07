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

        if ($keyword && Auth::check()) {
            History::create([
                'query'   => $keyword,
                'user_id' => Auth::id(),
                'tanggal' => now()
            ]);
        }

        $beasiswa = InfoBeasiswa::when($keyword, function ($query) use ($keyword) {
            return $query->where('nama_beasiswa', 'like', '%' . $keyword . '%');
        })->paginate(10);

        return view('dashboard', compact('beasiswa', 'keyword'));
    }
}
