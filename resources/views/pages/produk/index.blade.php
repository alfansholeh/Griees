@extends("layouts.auth")
@section("content")
    @include("components.popup")
    <div class="h-[calc(100vh-10%-1rem)] flex gap-4">
        <div class="p-4 bg-white flex-grow">
            <div class="flex justify-between items-center h-16">
                <form action="/produk" class="flex items-center w-1/3 bg-white rounded-xl border-2 border-primary">
                    <label for="keyword" class="material-icons px-2">search</label>
                    <input type="text" name="keyword" id="keyword" class="bg-white py-1 border-none w-2/3">
                    <button class="px-4 py-1 rounded-e-xl border-s-2 border-primary w-1/4">Cari</button>
                </form>
                <h1 class="font-bold text-2xl flex-grow text-center">Daftar Produk</h1>
                <div class="w-1/3 flex justify-end">
                    <a href="/produk/tambah" class="bg-primary text-white py-2 px-4 rounded-xl">Tambah Produk</a>
                </div>
            </div>
            <div class="flex flex-wrap h-[calc(90%-1rem)] overflow-y-scroll">
                @foreach($produks as $produk)
                    <div class="w-[25%] p-1">
                        <button data-modal-target="dataProduk" data-modal-toggle="dataProduk"
                                onclick="getDataProduk('{{$produk->id}}', '{{$produk->nama}}', '{{$produk->gambar}}', '{{$produk->varian->nama}}', '{{$produk->ukuran}}', '{{$produk->harga}}', '{{$produk->deskripsi}}')"
                                class="px-2 py-3 bg-gray-200 w-full flex flex-col gap-2 items-center">
                            <img src="/{{$produk->gambar}}" class="border h-52 w-full object-cover"
                                 alt="{{$produk->gambar}}">
                            <span class="capitalize font-bold text-xl">{{$produk->nama}}</span>
                            <span>Rp. {{$produk->harga}}</span>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        @yield("sidebar")
    </div>
    @include("pages.produk.dataProduk")
    <script src="/js/getDataProduk.js"></script>
@stop
