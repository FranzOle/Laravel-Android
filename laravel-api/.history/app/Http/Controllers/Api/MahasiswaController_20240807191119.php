<?php

namespace App\Http\Controllers\Api;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MahasiswaResource;

class MahasiswaController extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa::all();

        return new MahasiswaResource(true, "List Semua Mahasiswa", $mahasiswa);
    }

    public function store(Request $request) {
        
    }
}
