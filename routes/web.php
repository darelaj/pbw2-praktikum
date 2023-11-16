<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DetailTransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/user', [UserController::class, 'index'])->name('user.daftarPengguna.get');
Route::get('/userRegistration', [UserController::class, 'create'])->name('user.registrasi');
Route::post('/userStore', [UserController::class, 'store'])->name('user.daftarPengguna.post');
Route::get('/userView/{user}', [UserController::class, 'show'])->name('user.infoPengguna');
Route::put('/userUpdate', [UserController::class, 'update'])->name('user.updateUser');
//Darel Ajni Fahrezi - 6706223060
Route::get('/koleksi', [CollectionController::class, 'index'])->name('koleksi.daftarKoleksi.get');
Route::get('/koleksiTambah', [CollectionController::class, 'create'])->name('koleksi.registrasi');
Route::post('/koleksiStore', [CollectionController::class, 'store'])->name('koleksi.daftarKoleksi.post');
Route::get('/koleksiView/{collection}', [CollectionController::class, 'show'])->name('koleksi.infoKoleksi');
Route::put('/koleksiUpdate', [CollectionController::class, 'update'])->name('koleksi.updateKoleksi');

route::get('/getAllCollections', [CollectionController::class, 'getAllCollections'])->middleware(['auth', 'verified']);

Route::get('/transaksi', [TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('transaksi');
Route::get('/transaksiTambah', [TransactionController::class, 'create'])->middleware(['auth', 'verified'])->name('transaksiTambah');
Route::post('/transaksiStore', [TransactionController::class, 'store'])->middleware(['auth', 'verified'])->name('transaksiSimpan');
Route::get('/transaksiView/{transaction}', [TransactionController::class, 'show'])->middleware(['auth', 'verified'])->name('transaksiTampil');

Route::get('/detailTransactionKembalikan/{detailTransactionId}', [DetailTransactionController::class, 'show'])->middleware(['auth', 'verified'])->name('detailKembali');
Route::post('/detailTransactionUpdate', [DetailTransactionController::class, 'update'])->middleware(['auth', 'verified'])->name('detailUpdate');

require __DIR__ . '/auth.php';
