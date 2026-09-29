<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanjirController extends Controller
{
    public function FormBanjir()
    {
        return view('lapor-banjir');
    }

    public function LaporanBanjir(Request $request)
    {
        $nama_pelapor = $request->input('nama_pelapor');
        $lokasi_kejadian = $request->input('lokasi_kejadian');
        $tinggi_genangan = $request->input('tinggi_genangan');

        return view('lapor-hasil-banjir', compact(
            'nama_pelapor',
            'lokasi_kejadian',
            'tinggi_genangan'
        ));
    }

    public function DaftarLaporan()
    {
        $laporan = [
            [
                'nama_pelapor' => 'Alya Mutiya',
                'lokasi_kejadian' => 'Bojongsoang',
                'tinggi_genangan' => 25
            ],
            [
                'nama_pelapor' => 'Budi Pratama',
                'lokasi_kejadian' => 'Dayeuhkolot',
                'tinggi_genangan' => 50
            ],
            [
                'nama_pelapor' => 'Lala haliza',
                'lokasi_kejadian' => 'Baleendah',
                'tinggi_genangan' => 85
            ],
            [
                'nama_pelapor' => 'Nana Pertiwi',
                'lokasi_kejadian' => 'Katapang',
                'tinggi_genangan' => 65
            ]
        ];

        return view('daftar-laporan', compact('laporan'));
    }
}