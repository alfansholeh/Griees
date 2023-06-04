@extends("layouts.auth")
@section("content")
    <main class="h-[calc(100vh-10%-1rem)] overflow-y-scroll bg-white p-4">
        <h1 class="font-bold text-3xl">Edit Produk</h1>
        <form action="/produk/edit/{{$produk->id}}" enctype="multipart/form-data" method="POST" class="flex flex-col">
            @csrf
            <label for="nama">Nama Produk</label><input type="text" name="nama" id="nama" class="form-input" placeholder="Nama Produk"
                                             value="{{$produk->nama}}">
            <label for="varian">Varian</label><input type="text" name="varian" id="varian" class="form-input" placeholder="Varian"
                                               value="{{$produk->varian->nama}}">
            <label for="ukuran">Ukuran</label><input type="text" name="ukuran" id="ukuran" class="form-input" placeholder="Ukuran"
                                               value="{{$produk->ukuran}}">
            <label for="harga">Harga</label><input type="number" name="harga" id="harga" class="form-input" placeholder="Harga"
                                              value="{{$produk->harga}}">
            <input type="file" name="gambar" id="gambar" class="form-input">
            <label for="deskrips"></label><textarea name="deskripsi" id="deskrips" cols="30" rows="10" class="form-input p-4"
                                                    placeholder="Deskripsi">{{$produk->deskripsi}}</textarea>
            <div class="flex gap-2 mt-3">
                <a href="/" class="text-center bg-gray-200 text-black px-2 py-1 rounded-lg flex-grow">Batal</a>
                <button type="submit" class="text-center bg-primary text-white px-2 py-1 rounded-lg flex-grow">Simpan</button>
            </div>
        </form>
    </main>
    <script src="/js/addVarian.js"></script>
@stop
