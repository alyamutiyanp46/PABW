<?php
namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function simpan(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tinggi_genangan' => 'required|integer|min:0',
            'tanggal_kejadian' => 'required|date',
        ]);

        Laporan::create($validated);

        return view('konfirmasi');
    }

    public function daftar()
    {
        $laporan = Laporan::all();

        return view('laporan', compact('laporan'));
    }
}