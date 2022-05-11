<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function getAll() {
        $data = Mahasiswa::all();
        return view('list-mahasiswa', [ 'data' => $data ]);
    }

    public function tambah(Request $req) {
        $data = new Mahasiswa;
        $data->nim = $req->nim;
        $data->nama = $req->nama;
        $data->kelas = $req->kelas;
        $data->save();
        return $this->getAll();
    }

    public function remove($id) {
        $mhs = Mahasiswa::find($id);
        $mhs->delete();
        return $this->getAll();
    }

    public function ubah($id) {
        $mhs = Mahasiswa::where('nim', $id)->first();
        return view('form-ubah', [
            'data' => $mhs
        ]);
    }

    public function ubahData(Request $req) {
        $mhs = Mahasiswa::where('nim', $req->nim)->first();
        $mhs->nama = $req->nama;
        $mhs->kelas = $req->kelas;
        $mhs->save();
        return $this->getAll();
    }

}
