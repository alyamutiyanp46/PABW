<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

    class MahasiswaController extends Controller
    {
        public function form2()
        {
            return view('form2');
        }

        public function output(Request $requestdata){
            $nim = $requestdata->input('nim');
            $nama = $requestdata->input('nama');
            $programstudi = $requestdata->input('programstudi');
            $semester = $requestdata->input('semester');

            return view('output', compact('nim', 'nama', 'programstudi', 'semester'));
            
        }
    }
