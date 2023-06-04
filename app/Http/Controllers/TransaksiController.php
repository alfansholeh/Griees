<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Error;
use PHPUnit\Util\Exception;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::where("usaha_id", Auth::user()->usaha_id)->get();
        return view("pages.transaksi.index", compact("transaksis"));
    }

    public function tambahForm()
    {
        $produks = Produk::where("usaha_id", Auth::user()->usaha_id)->get();
        return view("pages.transaksi.tambah", compact("produks"));
    }

    public function tambah(Request $request)
    {
        $data = $request->validate([
            "tanggal" => "required",
            "kategori_transaksi" => "required",
            "status_pembayaran" => "required",
            "jumlah_pembayaran" => "required",
            "keterangan" => "required"
        ]);
        $produks = $request->validate([
            "produk" => "required",
            "jumlah" => "required",
        ]);
        DB::beginTransaction();
        try {
            $day = Day::firstOrCreate(["tanggal" => $data["tanggal"]]);
            $data["day_id"] = $day->id;
            $data["total"] = 0;
            $data["user_id"] = Auth::user()->id;
            $data["usaha_id"] = Auth::user()->usaha->id;
            for ($i = 0; $i < count($produks["produk"]); $i++) {
                $produk = Produk::find($produks["produk"][$i]);
                if($produk->stok < $produks["jumlah"][$i]){
                    return back()->withInput($request->input())->with("message", "Stok tidak cukup");
                }
                $produk->stok -= $produks["jumlah"][$i];
                $produk->save();
                $data["total"] += $produk->harga * $produks["jumlah"][$i];
            }
            $transaksi = new Transaksi($data);
            $transaksi->save();
            for ($i = 0; $i < count($produks["produk"]); $i++) {
                $produk = new DetailTransaksi([
                    "produk_id" => $produks["produk"][$i],
                    "jumlah" => $produks["jumlah"][$i],
                    "transaksi_id" => $transaksi->id
                ]);
                $produk->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect("/transaksi");
    }
}
