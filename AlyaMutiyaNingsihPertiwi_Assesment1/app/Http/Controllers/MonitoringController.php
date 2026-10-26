<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoring;

class MonitoringController extends Controller
{
    public function form() {
        return view('monitoring');
    }

    public function prosesData(Request $request) {
        $data = $request ->validate([
            'lokasi' => 'required|string',
            'nama_tanaman' => 'required|string',
            'kelembapan_tanah' => 'required|integer|min:20 max:90',
            'suhu_udara' => 'required|float|min:20 max:40',
            'kelembapan_udara' => 'required|float|min:40 max:95',
            'status_lahan' => 'required|string'
        ]);

        $nilai = $data ['kelembapan_tanah'];

        if($nilai > 70) {
            $kategori = 'Basah';
            $rekomendasi = 'Penyiraman tidak diperlukan';
        }elseif ($nilai >= 40 ) {
            $kategori = 'Normal';
            $rekomendasi = 'Kondisi optimal';
        }else {
            $kategori = 'kering';
            $rekomendasi = 'Perlu penyiraman';
        }

        $data ['kategori'] = $kategori;
        $data ['rekomendasi'] = $rekomendasi;

        Monitoring::create([
            'loaksi' => $data['lokasi'],
            'nama_tanaman' => $data['nama_tanaman'],
            'kelembapan_tanah' => $data['kelembapan_tanah'],
            'suhu_udara' => $data['suhu_udara'],
            'kelembapan_udara' => $data['kelembapan_udara'],
            'status_lahan' => $data['status_lahan'],
            'kategori' => $kategori,
        ]);

        return view('hasil', compact('data'));
        }

        public function riwayat() {
            $monitoring = Monitoring::all();
            return view('riwayat', compact('monitoring'));
        }

}
