@extends("layouts.auth")
@section("content")
    <div class="bg-white p-4 h-[calc(100vh-10%-1rem)] overflow-y-scroll flex flex-col gap-8">
        @if(isset($paket))
            <div class="w-1/2">
                <h2 class="font-bold">Paket Aktif:</h2>
                <ul class="list-disc px-6">
                    <li>{{$paket->paket->name}}</li>
                    <li>{{$paket->paket->spec}}</li>
                </ul>
            </div>
        @endif
        <div class="flex flex-col items-center gap-4">
            <h1 class="font-bold text-2xl">VISUALISASI DATA PENJUALAN</h1>
            <form>
                <select onchange="submit()" class="px-4 py-1" name="tahun" id="tahun">
                    @foreach($years as $year)
                        <option value="{{$year["tahun"]}}" {{$year["tahun"] == $tahun ?"selected":""}}>
                            Tahun {{$year["tahun"]}}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="flex justify-center gap-4">
            <div class="flex justify-between items-end px-4 py-2 bg-slate-400 rounded-xl">
                <span class="w-1/4">Jumlah Transaksi</span>
                <span class="bg-black w-1 h-full"></span>
                <span class="text-5xl font-bold">{{$data["n_transaksi"]}}</span>
                <span class="text-sm">Transaksi</span>
            </div>
            <div class="flex justify-between items-end px-4 py-2 bg-slate-400 rounded-xl">
                <span class="w-1/2">Jumlah Produk Terjual</span>
                <span class="bg-black w-1 h-full"></span>
                <span class="text-5xl font-bold">{{$data["n_produk"]}}</span>
                <span class="text-sm">Produk</span>
            </div>
        </div>
        <div class="flex gap-4">
            <div class="w-1/2 flex flex-col items-center">
                <canvas id="jumlah" class="w-1/2"></canvas>
                <h1>Grafik Jumlah Transaksi</h1>
            </div>
            <div class="w-1/2 flex flex-col items-center">
                <canvas id="jumlahproduk" class="w-1/4"></canvas>
                <h1>Grafik Jumlah Produk Terjual</h1>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxjumlah = document.getElementById('jumlah');
        new Chart(ctxjumlah, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($data["graph"] as $d)
                        "{{$d["tanggal"]}}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: [
                        @foreach($data["graph"] as $d)
                            "{{$d["jumlah_transaksi"]}}",
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctxjumlahproduk = document.getElementById('jumlahproduk');
        new Chart(ctxjumlahproduk, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($data["graph"] as $d)
                        "{{$d["tanggal"]}}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Produk Terjual',
                    data: [
                        @foreach($data["graph"] as $d)
                            "{{$d["jumlah_produk"]}}",
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop
