<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\DetailTransaksi;
use App\Models\KasKeluar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KeuanganController extends Controller
{
    public function keluar()
    {
        $keluars = KasKeluar::where("usaha_id", Auth::user()->usaha_id)->get();
        return view("pages.keuangan.kaskeluar.index", compact("keluars"));
    }

    public function tambahKeluarForm()
    {
        return view("pages.keuangan.kaskeluar.tambah");
    }

    public function tambahKeluar(Request $request)
    {
        $data = $request->validate([
            "tanggal" => "required",
            "jenis_pengeluaran" => "required",
            "jumlah_pengeluaran" => "required",
            "keterangan" => "required",
            "filebukti"
        ]);
        $day = Day::firstOrCreate(["tanggal" => $data["tanggal"]]);
        $data["day_id"] = $day->id;
        $bukti = $request->file("filebukti");
        if (!$bukti) {
            return back();
        }
        $data["bukti"] = Storage::put("bukti", $bukti);
        $data["user_id"] = Auth::id();
        $data["usaha_id"] = Auth::user()->usaha->id;
        $kaskeluar = new KasKeluar($data);
        $kaskeluar->save();
        return redirect("/keuangan/keluar");
    }

    public function bukti($filename)
    {
        if (Storage::has("bukti/" . $filename)) {
            return response()->file(storage_path("app/bukti/$filename"));
        }
        abort(404);
    }

    public function masuk(Request $request)
    {
        $time = $request->input("created_at");
        if (!$time) {
            $time = Transaksi::where("usaha_id", Auth::user()->usaha_id)->latest()->first();
            $time = $time->day->tanggal;
        }
        $data = Transaksi::where("usaha_id", Auth::user()->usaha_id)->join("days", "day_id", "=", "days.id")->whereDate("days.tanggal", $time)->with("details")->get();
        $res = [];
        $res["totalPemesanan"] = $data->where("kategori_transaksi", "pemesanan")->sum("total");
        $res["jumlahProdukPemesanan"] = 0;
        foreach ($data->where("kategori_transaksi", "pemesanan") as $p) {
            foreach ($p["details"] as $d) {
                $res["jumlahProdukPemesanan"] += $d["jumlah"];
            }
        }
        $res["jumlahPemesanan"] = $data->where("kategori_transaksi", "pemesanan")->count();
        $res["totalPembelian"] = $data->where("kategori_transaksi", "pembelian")->sum("total");
        $res["jumlahProdukPembelian"] = 0;
        foreach ($data->where("kategori_transaksi", "pembelian") as $p) {
            foreach ($p["details"] as $d) {
                $res["jumlahProdukPembelian"] += $d["jumlah"];
            }
        }
        $res["jumlahPembelian"] = $data->where("kategori_transaksi", "pembelian")->count();
        $times = Transaksi::where("usaha_id", Auth::user()->usaha_id)->join("days", "day_id", "=", "days.id")->select("tanggal")->groupBy("tanggal")->orderBy("tanggal")->get();
        return view("pages.keuangan.kasmasuk", compact("times", "res"));
    }

    public function laporan(Request $request)
    {
        $date = $request->input("tanggal");
        $days = Day::with(["transaksi", "keluar"])->whereHas("keluar", function ($q) {
            $q->where("usaha_id", Auth::user()->usaha_id);
        })->orWhereHas("transaksi", function ($q) {
            $q->where("usaha_id", Auth::user()->usaha_id);
        })->get();
        if ($date) {
            $data = [];

            $data["keluar"] = KasKeluar::where("usaha_id", Auth::user()->usaha_id)->whereHas("day", function ($q) use ($date) {
                $q->whereDate("tanggal", $date);
            })->select(["jenis_pengeluaran", "jumlah_pengeluaran"])->get();

            $data["masuk"] = Transaksi::where("usaha_id", Auth::user()->usaha_id)->whereHas("day", function ($q) use ($date) {
                $q->whereDate("tanggal", $date);
            })->select(DB::raw("COUNT(transaksis.id) as n_transaksi, SUM(total) as pemasukan"))->first();
            $data["masuk"]["n_produk"] = Transaksi::where("usaha_id", Auth::user()->usaha_id)->whereHas("day", function ($q) use ($date) {
                $q->whereDate("tanggal", $date);
            })->join("detail_transaksis as dt", "dt.transaksi_id", "=", "transaksis.id")->sum("dt.jumlah");
            $data["masuk"]["pemasukan"] = $data["masuk"]["pemasukan"] ?? 0;
            $data["masuk"]["n_produk"] = $data["masuk"]["n_produk"] ?? 0;

            $data["status"] = [];
            $data["status"]["total_keluar"] = (int)KasKeluar::where("usaha_id", Auth::user()->usaha_id)->whereHas("day", function ($q) use ($date) {
                $q->whereDate("tanggal", $date);
            })->sum("jumlah_pengeluaran");
            $data["status"]["keuntungan"] = $data["masuk"]["pemasukan"] - $data["status"]["total_keluar"];
            $data["status"]["status"] = $data["status"]["keuntungan"] <= 0 ? "Rugi" : "Untung";

            return view("pages.keuangan.laporan.detail", compact("data", "days", "date"));
        }
        return view("pages.keuangan.laporan.index", compact("days"));
    }

    public function grafik(Request $request)
    {
        $tahun = $request->input("tahun");
        $years = Transaksi::where("usaha_id", Auth::user()->usaha_id)->join("days", "day_id", "=", "days.id")->groupBy(DB::raw("YEAR(tanggal)"))->select(DB::raw("YEAR(tanggal) as tahun"))->orderBy(DB::raw("YEAR(tanggal)"), "DESC")->get();
        if (count($years) > 0) {
            if (!$tahun) {
                $tahun = $years[0]?->tahun;
            }
            $data["graph"] = Transaksi::where("usaha_id", Auth::user()->usaha_id)->join("days", "day_id", "=", "days.id")->select(DB::raw("DATE_FORMAT(tanggal, '%M') as tanggal, COUNT(DISTINCT transaksis.id) as jumlah_transaksi, SUM(jumlah)  as jumlah_produk"))->join("detail_transaksis", "transaksis.id", "=", "transaksi_id")->whereYear("tanggal", $tahun)->groupBy(DB::raw("DATE_FORMAT(tanggal, '%M')"))->orderBy("tanggal", "DESC")->get();
            $data["n_transaksi"] = Transaksi::where("usaha_id", Auth::user()->usaha_id)->join("days", "day_id", "=", "days.id")->whereYear("tanggal", $tahun)->count();
            $data["n_produk"] = Transaksi::where("usaha_id", Auth::user()->usaha_id)->join("days", "day_id", "=", "days.id")->whereYear("tanggal", $tahun)->join("detail_transaksis as dt", "dt.transaksi_id", "=", "transaksis.id")->sum("jumlah");
        } else {
            $data = [
                "graph" => [],
                "n_transaksi" => 0,
                "n_produk" => 0
            ];
        }
        if (Auth::user()->jabatan->jabatan_name === "pemilik") {
            $paket = Auth::user()->paket;
            return view("pages.keuangan.grafik", compact("data", "years", "tahun", "paket"));
        }
        return view("pages.keuangan.grafik", compact("data", "years", "tahun"));
    }
}
