<?php

namespace App\Http\Controllers\Api;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MahasiswaResource;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa::all();

        return new MahasiswaResource(true, "List Semua Mahasiswa", $mahasiswa);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'namamahasiswa' =>'required|string|max:255',
            'nim' => 'required|string|max:11|unique:mahasiswas',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'agama' => 'required|string|max:50',
            'usia' => 'required|string|max:3',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ], 
        [
            'namamahasiswa.required' => 'Nama harus diisi',
            'nim.required' => 'NIM harus diisi',
            'nim.unique' => 'NIM sudah terdaftar',
            'nim.max' => 'Angka NIM tidak boleh lebih dari 11',
            'alamat.required' => 'Alamat harus diisi',
            'gender.required' => 'Gender harus diisi',
            'agama.required' => 'Agama harus diisi',
            'usia.required' => 'Usia harus diisi',
            'usia.max' => 'Usia tidak lebih dari 3 digit',
            'image.required' => 'Image harus diisi',
        ]);
    }
}
