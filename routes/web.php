<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
// });

Route::get('/', [ MahasiswaController::class, 'getAll' ]);

Route::get('/test', function() {
    return view('test');
});

Route::get('/form-tambah', function() {
    return view('form-tambah');
});

Route::post('/tambah', [ MahasiswaController::class, 'tambah' ]);

Route::get('/hapus/{id}', [ MahasiswaController::class, 'remove' ]);

Route::get('/ubah/{id}', [ MahasiswaController::class, 'ubah' ]);

Route::post('/ubah', [ MahasiswaController::class, 'ubahData' ]);