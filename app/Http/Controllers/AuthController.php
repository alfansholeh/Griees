<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Paket;
use App\Models\Usaha;
use App\Models\User;
use App\Models\UserPaket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class AuthController extends Controller
{
    public function loginform()
    {
        return view("pages.auth.login");
    }

    public function login(Request $request)
    {
        $credential = Validator::make($request->all(), [
            "email" => "required|email|exists:users",
            "password" => "required"
        ]);
        if ($credential->fails()) {
            if ($this->isError("email", "required") || $this->isError("password", "required")) {
                return back()->with("message", "Ada data yang belum diisi");
            }
            return back()->with("message", "Periksa kembali data anda");
        }
        if (Auth::attempt($credential->safe()->only(["email", "password"]))) {
            return redirect("/dashboard");
        } else {
            return back()->with("message", "Periksa kembali data anda");
        }
    }

    public function registerform()
    {
        return view("pages.auth.register");
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|unique:users",
            "password" => "required",
            "phone" => "required|numeric",
            "nama_usaha" => "required",
            "bidang" => "required",
            "jumlah_pegawai" => "required"
        ]);
        if ($validator->fails()) {
            $emailNotUnique = $this->isError($validator->messages()->get("email"), "taken");
            if ($emailNotUnique) {
                return back()->with("message", "Email Sudah digunakan");
            }
            $phoneInvalid = $this->isError($validator->messages()->get("phone"), "number");
            if ($phoneInvalid) {
                return back()->with("message", "Nomor Telepon tidak valid");
            }
            return back()->with("message", "Ada data yang belum terisi");
        }
        $data = $validator->safe()->only(["name", "email", "password", "phone"]);
        $dataUsaha = $validator->safe()->only(["nama_usaha", "bidang", "jumlah_pegawai"]);
        DB::beginTransaction();
        try {
            $dataUsaha["nama"] = $dataUsaha["nama_usaha"];
            $usaha = new Usaha($dataUsaha);
            $usaha->save();

            $data["usaha_id"] = $usaha->id;
            $data["password"] = Hash::make($data["password"]);
            $data["jabatan_id"] = Jabatan::where("jabatan_name", "pemilik")->first()->id;
            $user = new User($data);
            $user->save();
            Auth::login($user);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect("/confirm");
    }

    public function confirmForm()
    {
        $pakets = Paket::all();
        return view("pages.auth.confirm", compact("pakets"));
    }

    public function confirm(Request $request)
    {
        $data = $request->validate([
            "paket_id" => "required",
            "metode" => "required",
            "bukti" => "required"
        ]);
        $file = $request->file("bukti");
        $data["bukti"] = Storage::put("pic/produk", $file);
        $data["user_id"] = Auth::user()->getAuthIdentifier();
        $userpaket = new UserPaket($data);
        $userpaket->save();
        $usaha = Usaha::find(Auth::user()->usaha_id);
        $usaha->activated_at = Carbon::now();
        $usaha->save();
        return redirect()->intended()->with("message", "Registrasi dan pembelian paket anda akan segera diproses. Terima kasih");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }

    public function pegawaiForm()
    {
        $edit = false;
        $pegawais = Auth::user()->usaha->users;
        return view("pages.auth.pegawai", compact("pegawais", "edit"));
    }

    public function tambahPegawai(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "phone" => "required|numeric",
            "gender" => "required",
        ]);
        if ($validator->fails()) {
            if ($this->isError($validator->messages()->get("phone"), "number")) {
                return back()->with("message", "Nomor Telepon tidak valid");
            }
            return back()->with("message", "Ada data yang belum diisi");
        }
        $data = $validator->safe()->only([
            "name", "email", "password", "phone", "gender", "jabatan_id",
        ]);
        $pegawai = Jabatan::where("jabatan_name", "pegawai")->first();
        $data["jabatan_id"] = $pegawai->id;
        $data["usaha_id"] = Auth::user()->usaha->id;
        $data["password"] = Hash::make($data["password"]);
        $pegawai = new User($data);
        $pegawai->save();
        return redirect("/pegawai")->with("message", "Perubahan data berhasil disimpan");
    }

    public function detail($id)
    {
        $pegawai = User::find($id);
        return view("pages.auth.detail", compact("pegawai"));
    }

    public function editPegawaiForm($id)
    {
        $edit = true;
        $pegawai = User::find($id);
        $pegawais = Auth::user()->usaha->users;
        return view("pages.auth.pegawai", compact("pegawais", "pegawai", "edit"));
    }

    public function editPegawai($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "password" => "nullable",
            "phone" => "required|numeric",
            "gender" => "required",
        ]);
        if ($validator->fails()) {
            return back()->with("message", "Ada data yang belum diisi");
        }
        $data = $validator->safe()->only([
            "name", "email", "password", "phone", "gender", "jabatan_id",
        ]);
        $pegawai = User::find($id);
        $pegawai->name = $data["name"];
        $pegawai->email = $data["email"];
        $pegawai->phone = $data["phone"];
        $pegawai->gender = $data["gender"];
        if ($data["password"]) {
            $pegawai->password = Hash::make($data["password"]);
        }
        $pegawai->save();
        return redirect("/pegawai")->with("message", "Perubahan data berhasil disimpan");
    }
}
