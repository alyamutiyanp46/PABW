<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BanjirController extends Controller
{
    public function FormBanjir() {
        return view('lapor-banjir');
    }

    public function LaporanBanjir(Request $request) {
        $nama_pelapor = $request->input('nama_pelapor');
        $lokasi_kejadian = $request->input('lokasi_kejadian');
        $tinggi_genangan = $request->input('tinggi_genangan');

        return view('lapor-hasil-banjir', compact('nama_pelapor', 'lokasi_kejadian', 'tinggi_genangan'));
    }
}