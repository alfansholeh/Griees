<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', function () {
    return view("index");
});
Route::get("/home", function () {
    return redirect("/");
});

Route::middleware(["guest"])->group(function () {
    Route::get("/login", [AuthController::class, "loginform"])->name("login");
    Route::post("/login", [AuthController::class, "login"]);
    Route::get("/register", [AuthController::class, "registerform"]);
    Route::post("/register", [AuthController::class, "register"]);
});

Route::middleware(["auth"])->group(function () {
    Route::get("/confirm", [AuthController::class, "confirmForm"]);
    Route::post("/confirm", [AuthController::class, "confirm"]);
    Route::get("/logout", [AuthController::class, "logout"]);
    Route::middleware(["isactive"])->group(function () {
        Route::get('/produk/', [ProdukController::class, "index"]);
        Route::get("/pic/produk/{name}", [ProdukController::class, "getpic"]);
        Route::get("/produk/p/{id}", [ProdukController::class, "getDataProduk"]);
        Route::get("/produk/tambah", [ProdukController::class, "tambahProdukForm"]);
        Route::get("/produk/edit/{id}", [ProdukController::class, "ubahProdukForm"]);
        Route::post("/produk/tambah", [ProdukController::class, "tambahProduk"]);
        Route::post("/produk/edit/{id}", [ProdukController::class, "ubahProduk"]);

        Route::get("/stok", [StokController::class, "index"]);
        Route::post("/stok/tambah", [StokController::class, "tambahStok"]);
        Route::post("/stok/edit/{id}", [StokController::class, "editStok"]);

        Route::get("/transaksi", [TransaksiController::class, "index"]);
        Route::get("/transaksi/tambah", [TransaksiController::class, "tambahForm"]);
        Route::post("/transaksi/tambah", [TransaksiController::class, "tambah"]);

        Route::get("/keuangan/keluar", [KeuanganController::class, "keluar"]);
        Route::get("/keuangan/keluar/tambah", [KeuanganController::class, "tambahKeluarForm"]);
        Route::post("/keuangan/keluar/tambah", [KeuanganController::class, "tambahKeluar"]);
        Route::get("/bukti/{filename}", [KeuanganController::class, "bukti"]);

        Route::get("/dashboard", [KeuanganController::class, "grafik"]);
        Route::get("/keuangan/masuk", [KeuanganController::class, "masuk"]);
        Route::get("/keuangan/laporan", [KeuanganController::class, "laporan"]);

        Route::get("/pegawai", [AuthController::class, "pegawaiForm"]);
        Route::post("/pegawai", [AuthController::class, "tambahPegawai"]);
        Route::get("/pegawai/{id}", [AuthController::class, "detail"]);
        Route::get("/pegawai/edit/{id}", [AuthController::class, "editPegawaiForm"]);
        Route::post("/pegawai/edit/{id}", [AuthController::class, "editPegawai"]);
    });
});
