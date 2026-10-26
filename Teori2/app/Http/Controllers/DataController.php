<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller{

    public function formulir(){
        return view('formulir');
    }

    public function inputdata(Request $requestdata){
            $nama = $requestdata->input('nama');
            $nim = $requestdata->input('nim');
            $prodi = $requestdata->input('prodi');

            return view('tampilkan', compact('nama', 'nim', 'prodi'));
            
    }

}
