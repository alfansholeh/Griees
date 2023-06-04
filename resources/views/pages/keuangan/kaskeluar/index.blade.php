@extends("layouts.auth")
@section("content")
    <div class="p-4 flex flex-col bg-white items-center h-[calc(100vh-10%-1rem)] overflow-y-scroll">
        <div class="flex justify-between w-full items-center mb-4">
            <h1 class="flex-grow text-center font-bold text-2xl">Arus Kas Keluar</h1>
            <a href="/keuangan/keluar/tambah"
               class="mt-4 w-1/3 text-center bg-primary py-2 rounded-xl text-white">Tambah
                Data</a>
        </div>
        <table class="w-full">
            <thead>
            <tr class="bg-primary text-white">
                <th class="border-2 border-gray-200 px-8 py-2">No.</th>
                <th class="border-2 border-gray-200 px-8 py-2">Tanggal</th>
                <th class="border-2 border-gray-200 px-8 py-2 w-1/3">Jenis Pengeluaran</th>
                <th class="border-2 border-gray-200 px-8 py-2 w-1/3">Jumlah Pengeluaran</th>
                <th class="border-2 border-gray-200 px-8 py-2">Keterangan</th>
                <th class="border-2 border-gray-200 px-8 py-2">Bukti Pengeluaran</th>
            </tr>
            </thead>
            <tbody>
            @foreach($keluars as $i=>$keluar)
                <tr>
                    <td class="text-center border-gray-200 border-2">{{$i+1}}</td>
                    <td class="text-center border-gray-200 border-2">{{$keluar->created_at}}</td>
                    <td class="text-center border-gray-200 border-2">{{$keluar->jenis_pengeluaran}}</td>
                    <td class="text-center border-gray-200 border-2">{{$keluar->jumlah_pengeluaran}}</td>
                    <td class="text-center border-gray-200 border-2">{{$keluar->keterangan}}</td>
                    <td class="text-center border-gray-200 border-2"><a href="/{{$keluar->bukti}}">Bukti</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
