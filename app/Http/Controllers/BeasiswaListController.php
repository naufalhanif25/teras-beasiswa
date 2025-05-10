<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\infoBeasiswa;
use Carbon\Carbon;

class BeasiswaListController extends Controller
{
    public function index()
    {
        $beasiswa = infoBeasiswa::all();

        $monthsTranslation = [
            'Januari' => 'January',
            'Februari' => 'February',
            'Maret' => 'March',
            'April' => 'April',
            'Mei' => 'May',
            'Juni' => 'June',
            'Juli' => 'July',
            'Agustus' => 'August',
            'September' => 'September',
            'Oktober' => 'October',
            'November' => 'November',
            'Desember' => 'December',
        ];
    
        $beasiswa->transform(function ($item) use ($monthsTranslation) {
            if ($item->tanggal_tutup) {
                $tanggal_tutup = $item->tanggal_tutup;
                foreach ($monthsTranslation as $indonesianMonth => $englishMonth) {
                    $tanggal_tutup = str_replace($indonesianMonth, $englishMonth, $tanggal_tutup);
                }
    
                try {
                    $item->tanggal_tutup = Carbon::parse($tanggal_tutup)->translatedFormat('d F Y');
                } catch (\Exception $e) {
                    $item->tanggal_tutup = 'Invalid date';
                }
            }
            return $item;
        });
    

        return view('Admin.beasiswa-table', compact('beasiswa'));
    }

    public function destroy($id)
    {
        $beasiswa = infoBeasiswa::find($id);

        if (!$beasiswa) {
            return redirect()->back()->with('error', 'Beasiswa tidak ditemukan.');
        }

        $beasiswa->delete();

        return redirect()->back()->with('success', 'Beasiswa berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_beasiswa' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'tanggal_buka' => 'nullable|date',
            'tanggal_tutup' => 'nullable|date',
            'cover' => 'nullable|url',
            'url_panduan' => 'nullable|url',
            'url_sumber' => 'nullable|url',
        ]);

        $beasiswa = infoBeasiswa::findOrFail($id);
        $beasiswa->nama_beasiswa = $request->filled('nama_beasiswa') ? $request->nama_beasiswa : $beasiswa->nama_beasiswa;
        $beasiswa->deskripsi = $request->filled('deskripsi') ? $request->deskripsi : $beasiswa->deskripsi;
        $beasiswa->kategori = $request->filled('kategori') ? $request->kategori : $beasiswa->kategori;
        $beasiswa->tanggal_buka = $request->filled('tanggal_buka') ? $request->tanggal_buka : $beasiswa->tanggal_buka;
        $beasiswa->tanggal_tutup = $request->filled('tanggal_tutup') ? $request->tanggal_tutup : $beasiswa->tanggal_tutup;
        $beasiswa->cover = $request->filled('cover') ? $request->cover : $beasiswa->cover;
        $beasiswa->url_panduan = $request->filled('url_panduan') ? $request->url_panduan : $beasiswa->url_panduan;
        $beasiswa->url_sumber = $request->filled('url_sumber') ? $request->url_sumber : $beasiswa->url_sumber;
        $beasiswa->save();

        return redirect()->back()->with('success', 'Beasiswa berhasil diperbarui.');
    }
}
