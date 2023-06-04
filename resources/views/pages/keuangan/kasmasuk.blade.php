@extends("layouts.auth")
@section("content")
    <div class="p-4 bg-white flex flex-col items-center h-[calc(100vh-10%-1rem)] gap-4">
        <h1 class="text-center font-bold text-2xl">Arus Kas Masuk</h1>
        <form>
            <select onchange="submit()" class="px-2" name="created_at" id="created_at">
                @foreach($times as $time)
                    <option value="{{$time->tanggal}}"
                            @if($time->tanggal === request()->input("created_at")) selected @endif>
                        Tanggal: {{$time->tanggal}}</option>
                @endforeach
            </select>
        </form>
        <div class="flex gap-4">
            <div class="flex flex-col items-center bg-slate-300 p-4 rounded-xl">
                <h1 class="font-bold text-2xl">Pembelian</h1>
                <div class="h-1 w-full bg-black"></div>
                <h2 class="font-medium text-lg">Jumlah Transaksi</h2>
                <h3>{{$res["jumlahPembelian"]}}</h3>
                <h2 class="font-medium text-lg">Jumlah Produk Terjual</h2>
                <h3>{{$res["jumlahProdukPembelian"]}}</h3>
                <h2 class="font-medium text-lg">Jumlah Omzet</h2>
                <h3>Rp. {{$res["totalPembelian"]}}</h3>
            </div>
            <div class="flex flex-col items-center bg-slate-300 p-4 rounded-xl">
                <h1 class="font-bold text-2xl">Pemesanan</h1>
                <div class="h-1 w-full bg-black"></div>
                <h2 class="font-medium text-lg">Jumlah Transaksi</h2>
                <h3>{{$res["jumlahPemesanan"]}}</h3>
                <h2 class="font-medium text-lg">Jumlah Produk Terjual</h2>
                <h3>{{$res["jumlahProdukPemesanan"]}}</h3>
                <h2 class="font-medium text-lg">Jumlah Omzet</h2>
                <h3>Rp. {{$res["totalPemesanan"]}}</h3>
            </div>
        </div>
    </div>
@stop
