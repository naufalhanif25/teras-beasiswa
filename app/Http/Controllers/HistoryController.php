<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = auth()->user()->histories()
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('history', compact('histories'));
    }

    public function destroy($id)
    {
        $history = History::where('id_history', $id)->firstOrFail();

        if ($history->user_id !== auth()->id()) {
            abort(403);
        }

        $history->delete();

        return redirect()->back()->with("Riwayat berhasil dihapus");
    }
}

