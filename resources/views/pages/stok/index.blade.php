@extends("layouts.auth")
@section("content")
    @include("pages.stok.tambah")
    @include("pages.stok.edit")
    @include("pages.stok.detail")
    @include("components.popup")
    <div class="p-4 bg-white h-[calc(100vh-10%-1rem)] overflow-y-scroll">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-2xl">Stok Produk</h1>
            <button data-modal-target="tambahStok" data-modal-toggle="tambahStok"
                    class="px-4 py-2 bg-primary rounded-xl text-white my-2">Tambah Stok Produk
            </button>
        </div>
        <table class="w-full">
            <thead>
            <tr class="bg-primary text-white">
                <th class="border-2 border-gray-200 px-8 py-2">No.</th>
                <th class="border-2 border-gray-200 px-8 py-2">Id Produk</th>
                <th class="border-2 border-gray-200 px-8 py-2">Nama Produk</th>
                <th class="border-2 border-gray-200 px-8 py-2">Stok Produk</th>
                <th class="border-2 border-gray-200 px-8 py-2">Status</th>
                <th class="border-2 border-gray-200 px-8 py-2">Deskripsi</th>
                <th class="border-2 border-gray-200 px-8 py-2">Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($produks as $i=>$produk)
                <tr class="@if($produk->stok===0) bg-red-300 @endif">
                    <td data-modal-target="detailStok" data-modal-toggle="detailStok"
                        onclick="detailStok('{{$produk->nama}}','{{$produk->stok}}','{{$produk->deskripsi}}')"
                        class="border border-2 border-gray-200 p-2 text-center">{{$i+1}}</td>
                    <td data-modal-target="detailStok" data-modal-toggle="detailStok"
                        onclick="detailStok('{{$produk->nama}}','{{$produk->stok}}','{{$produk->deskripsi}}')"
                        class="border border-2 border-gray-200 p-2">{{$produk->id}}</td>
                    <td data-modal-target="detailStok" data-modal-toggle="detailStok"
                        onclick="detailStok('{{$produk->nama}}','{{$produk->stok}}','{{$produk->deskripsi}}')"
                        class="border border-2 border-gray-200 p-2">{{$produk->nama}}</td>
                    <td data-modal-target="detailStok" data-modal-toggle="detailStok"
                        onclick="detailStok('{{$produk->nama}}','{{$produk->stok}}','{{$produk->deskripsi}}')"
                        class="border border-2 border-gray-200 p-2 text-center">{{$produk->stok}}</td>
                    <td data-modal-target="detailStok" data-modal-toggle="detailStok"
                        onclick="detailStok('{{$produk->nama}}','{{$produk->stok}}','{{$produk->deskripsi}}')"
                        class="border border-2 border-gray-200 p-2 text-center">{{$produk->stok>0?"Tersedia":"Habis"}}</td>
                    <td data-modal-target="detailStok" data-modal-toggle="detailStok"
                        onclick="detailStok('{{$produk->nama}}','{{$produk->stok}}','{{$produk->deskripsi}}')"
                        class="border border-2 border-gray-200 p-2">{{Str::limit($produk->deskripsi, $limit = 20, $end = '...')}}</td>
                    <td class="border border-2 border-gray-200 p-2 text-center">
                        <button onclick="editStok('{{$produk->id}}','{{$produk->nama}}','{{$produk->stok}}', '{{$produk->deskripsi}}')"
                                data-modal-target="editStok" data-modal-toggle="editStok" class="material-icons">
                            edit
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
