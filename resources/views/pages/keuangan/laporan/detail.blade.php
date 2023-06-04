@extends("layouts.auth")
@section("content")
    <div class="bg-white p-4 h-[calc(100vh-10%-1rem)] overflow-y-scroll">
        <div class="flex justify-between items-center mb-4">
            <form>
                <select onchange="submit()" class="px-4" name="tanggal" id="tanggal">
                    @foreach($days as $day)
                        <option
                            value="{{$day->tanggal}}" {{$day->tanggal === $date ?"selected":""}}>{{$day->tanggal}}</option>
                    @endforeach
                </select>
            </form>
            <h1 class="flex-grow text-center text-2xl font-bold">Detail Laporan Keuangan</h1>
        </div>
        <div class="flex justify-between gap-4">
            <div class="w-1/3 shadow-xl p-4 rounded-xl">
                <h2 class="text-center font-medium text-xl mb-2">DATA ARUS KAS KELUAR</h2>
                <table>
                    <tr class="bg-primary text-white">
                        <th class="border-2 border-gray-200">Kegiatan Pengeluaran</th>
                        <th class="border-2 border-gray-200">Jumlah Pengeluaran</th>
                    </tr>
                    @foreach($data["keluar"] as $keluar)
                        <tr>
                            <td class="border-2 border-gray-200">{{$keluar->jenis_pengeluaran}}</td>
                            <td class="border-2 border-gray-200">Rp. {{$keluar->jumlah_pengeluaran}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="w-1/3 shadow-xl p-4 rounded-xl">
                <h2 class="text-center font-medium text-xl mb-2">DATA ARUS KAS MASUK</h2>
                <div>
                    <h3 class="font-medium">Jumlah Produk Terjual</h3>
                    <p class="ps-2">{{$data["masuk"]->n_produk}}</p>
                </div>
                <div>
                    <h3 class="font-medium">Jumlah Transaksi</h3>
                    <p class="ps-2">{{$data["masuk"]->n_transaksi}}</p>
                </div>
                <div>
                    <h3 class="font-medium">Jumlah Pemasukan</h3>
                    <p class="ps-2">Rp. {{$data["masuk"]->pemasukan}}</p>
                </div>
            </div>
            <div class="w-1/3 shadow-xl p-4 rounded-xl">
                <h2 class="text-center font-medium text-xl mb-2">PERHITUNGAN LABA RUGI</h2>
                <div>
                    <h3 class="font-medium">Status Penjualan</h3>
                    <p class="ps-2">{{$data["status"]["status"]}}</p>
                </div>
                <div>
                    <h3 class="font-medium">Besar Keuntungan</h3>
                    <p class="ps-2">Rp. {{$data["status"]["keuntungan"]}}</p>
                </div>
            </div>
        </div>
    </div>
@stop
