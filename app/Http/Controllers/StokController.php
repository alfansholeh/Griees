<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StokController extends Controller
{
    public function index()
    {
        $produks = Produk::where("usaha_id", Auth::user()->usaha_id)->get();
        return view("pages.stok.index", compact("produks"));
    }

    public function tambahStok(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required",
            "stok" => "required",
            "deskripsi" => "nullable"
        ]);
        if($validator->fails()){
            return back()->with("message", "Ada data yang belum terisi");
        }
        $data = $validator->safe()->only([
            "id", "stok", "deskripsi"
        ]);
        $produk = Produk::find($data["id"]);
        $produk->stok += $data["stok"];
        $produk->save();
        return back()->with("message", "Data berhasil disimpan");
    }

    public function editStok($id, Request $request){
        $validator = Validator::make($request->all(), [
            "stok" => "required",
        ]);
        if($validator->fails()){
            return back()->with("message", "Ada data yang belum terisi");
        }
        $data = $validator->safe()->only([
            "stok", "deskripsi"
        ]);
        $stok = Produk::find($id);
        $stok->stok = $data["stok"];
        $stok->save();
        return back()->with("message", "Data berhasil disimpan");
    }
}
