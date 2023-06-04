@extends("pages.produk.index")
@section("sidebar")
    <section id="sidebar" class="bg-white p-4 w-1/2 h-full overflow-y-scroll">
        <h1 class="font-bold text-xl mb-3">Tambah Produk Baru</h1>
        <form action="/produk/tambah" enctype="multipart/form-data" method="POST" class="flex flex-col gap-2 w-full">
            @csrf
            <div>
                <label for="nama">Nama Produk:</label>
                <input type="text" name="nama" id="nama" class="form-input w-full" placeholder="Nama Produk">
            </div>
            <div>
                <label for="varian">Varian:</label>
                <input type="text" name="varian" id="varian" class="form-input w-full" placeholder="Varian">
            </div>
            <div>
                <label for="ukuran">Ukuran:</label>
                <input type="text" name="ukuran" id="ukuran" class="form-input w-full" placeholder="Ukuran">
            </div>
            <div>
                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" class="form-input w-full" placeholder="Harga">
            </div>
            <div>
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar" class="form-input w-full">
            </div>
            <div>
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-input w-full p-2"
                          placeholder="Deskripsi"></textarea>
            </div>
            <div class="flex justify-between gap-2">
                <a href="/produk" class="text-center bg-gray-200 text-black px-2 py-1 rounded-lg flex-grow">Batal</a>
                <button type="submit" class="text-center bg-primary text-white px-2 py-1 rounded-lg flex-grow">
                    Simpan
                </button>
            </div>
        </form>
    </section>
@stop
