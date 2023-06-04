@extends("layouts.auth")
@section("content")
    <div class="p-4 bg-white h-[calc(100vh-10%-1rem)] overflow-y-scroll">
        <h1 class="text-center font-bold text-2xl mb-3">Riwayat Transaksi</h1>
        <table class="w-full">
            <thead>
            <tr class="bg-primary text-white border-2 border-gray-100">
                <th class="border-2 border-gray-200 px-8 py-2">No.</th>
                <th class="border-2 border-gray-200 px-8 py-2">Tanggal</th>
                <th class="border-2 border-gray-200 px-8 py-2">Jenis Transaksi</th>
                <th class="border-2 border-gray-200 px-8 py-2">Pembayaran</th>
                <th class="border-2 border-gray-200 px-8 py-2">Nama Pegawai</th>
                <th class="border-2 border-gray-200 px-8 py-2">Invoice</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksis as $no=>$transaksi)
                <tr>
                    <td class="text-center border-2 border-gray-100">{{$no+1}}</td>
                    <td class="text-center border-2 border-gray-100">{{$transaksi->day->tanggal}}</td>
                    <td class="text-center border-2 border-gray-100">{{$transaksi->kategori_transaksi}}</td>
                    <td class="text-center border-2 border-gray-100">{{$transaksi->total}}</td>
                    <td class="text-center border-2 border-gray-100">{{$transaksi->user->name}}</td>
                    <td class="text-center border-2 border-gray-100">
                        @include("pages.transaksi.detail")
                        <button type="button" data-modal-target="detailTransaksi-{{$no+1}}"
                                data-modal-toggle="detailTransaksi-{{$no+1}}"
                                class="material-icons">file_open
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
