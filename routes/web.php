<?php

use App\Http\Controllers\masyarakatController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\hargaController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\lelangController;
use App\Models\historymodel;
use App\Models\lelangmodel;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/postlogin', [loginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

// Route::middleware(['auth','ceklevel:admin'])->group( function () {

// });

Route::middleware('auth:petugas')->group( function () {
    Route::get('/admin', [adminController::class, 'index'])->name('index');

    Route::get('/datauser', [adminController::class, 'datauser'])->name('datauser');
    Route::get('/databarang', [adminController::class, 'databarang'])->name('databarang');

    //Crud petugas
    Route::get('/datapetugas', [petugasController::class, 'indexpetugas'])->name('indexpetugas');
    Route::post('/tambahpetugas',[petugasController::class,'tambahpetugas']);
    Route::post('ubahpetugas/{user}', [petugasController::class, 'ubahpetugas'])->name('ubahpetugas');
    Route::get('hapuspetugas/{id}',[petugasController::class, 'hapuspetugas'])->name('hapuspetugas');

    //Crud barang
    Route::get('/databarang', [barangController::class, 'indexbarang'])->name('indexbarang');
    Route::post('/tambahbarang',[barangController::class,'tambahbarang']);
    Route::post('ubahbarang/{user}', [barangController::class, 'ubahbarang'])->name('ubahbarang');
    Route::get('hapusbarang/{id}',[barangController::class, 'hapusbarang'])->name('hapusbarang');

    //Crud masyarakat
    Route::get('/datamasyarakat', [masyarakatController::class, 'indexmasyarakat'])->name('indexmasyarakat');
    Route::post('/tambahmasyarakat',[masyarakatController::class,'tambahmasyarakat']);
    Route::post('ubahmasyarakat/{user}', [masyarakatController::class, 'ubahmasyarakat'])->name('ubahmasyarakat');
    Route::get('hapusmasyarakat/{id}',[masyarakatController::class, 'hapusmasyarakat'])->name('hapusmasyarakat');

    //status barang
    Route::get('/Upload', [barangController::class, 'belumselesai'])->name('belumselesai');
    Route::post('/Upload/Tambah', [lelangController::class, 'tambahlelang']);
    Route::post('ubahlelang/status/{user}', [lelangController::class, 'lelangStatus'])->name('lelangStatus');
    Route::get('hapuslelang/{id}',[lelangController::class, 'hapuslelang'])->name('hapuslelang');

    Route::get('/Statusbarang', [lelangController::class, 'indexlelang'])->name('indexlelang');
    Route::get('/Laporan', [lelangController::class, 'laporan'])->name('laporan');
    Route::post('ubahlelang/pemanang/{user}', [lelangController::class, 'Uploadpemenang'])->name('Uploadpemenang');
    Route::post('uploadbarang/{user}', [barangController::class, 'Upload'])->name('Upload');

    Route::get('/databarang', [barangController::class, 'indexbarang'])->name('indexbarang');

    //user !!!!!!!!!!
    Route::get('user/barang/{barang}', function (lelangmodel $barang) {
        $contactsharga = historymodel::with('barang','lelang','masyarakat')->where('id_barang',$barang->barang->id_barang)->get();
        $harga_tertinggi = historymodel::where('id_barang',$barang->barang->id_barang)->max('penawaran_harga');

        return view('user/barang')->with(compact('barang', 'contactsharga', 'harga_tertinggi'));
    });

    

});

Route::middleware('auth:masyarakat')->group( function () {
    Route::get('/hasil', function (lelangmodel $barang) {
        $barang = lelangmodel::with('barang')->where('status','=','selesai')->where('id_user',Auth::guard('masyarakat')->user()->id_user)->get();
        $harga_tertinggi = historymodel::max('penawaran_harga');

        return view('user/hasil')->with(compact('barang', 'harga_tertinggi'));
    });

    Route::get('/', [lelangController::class, 'display'])->name('display');
    Route::post('/user/barangmasuk', [hargaController::class, 'tambahharga']);
    Route::get('/user/coba', [hargaController::class, 'indexharga']);
});