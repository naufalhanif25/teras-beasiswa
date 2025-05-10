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
        $userId = Auth::id();

        if ($keyword && Auth::check()) {
            History::create([
                'query'   => $keyword,
                'user_id' => $userId,
                'tanggal' => now()
            ]);
        }

        $recommendedIds = [];

        if (Auth::check()) {
            $historyKeywords = History::where('user_id', $userId)
                ->pluck('query')
                ->toArray();

            $recommendedBeasiswa = InfoBeasiswa::where(function ($query) use ($historyKeywords) {
                foreach ($historyKeywords as $word) {
                    $query->orWhere('nama_beasiswa', 'like', '%' . $word . '%');
                }
            })->get();

            $recommendedIds = $recommendedBeasiswa->pluck('id_beasiswa')->toArray();
        }

        $beasiswa = InfoBeasiswa::when($keyword, function ($query) use ($keyword) {
                return $query->where('nama_beasiswa', 'like', '%' . $keyword . '%');
            })
            ->orderByRaw('FIELD(id_beasiswa, ' . implode(',', $recommendedIds ?: [0]) . ') DESC')
            ->paginate(10);

        return view('dashboard', compact('beasiswa', 'keyword'));
    }
}
