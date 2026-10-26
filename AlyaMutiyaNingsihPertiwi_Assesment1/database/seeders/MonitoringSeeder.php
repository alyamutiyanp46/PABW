<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Monitoring;
use Faker\Factory as Faker;

class MonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for($i=0; $i<15; $i++) {
            $nilai = $faker -> numberBetween(0,100);
            
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

            Monitoring::create([
                'lokasi'=>$faker->randomElement(['Garut Kota', 'Tarogong Kaler', 'Samarang']),
                'nama_tanaman'=>$faker->randomElement(['Padi', 'Jagung', 'Cabai']),
                'kelembapan_tanah'=>$faker->numberBetween(20,90),
                'suhu_udara'=>$faker->numberBetween(20,40),
                'kelembapan_udara'=>$faker->numberBetween(40,95), 
                'status_lahan'=>$faker->$nilai,
                'kategori'=>$faker->$kategori,
            ]);
        }
    }
}
