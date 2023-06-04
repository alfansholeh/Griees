<div id="editStok" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="bg-white p-8 rounded-xl">
            <div class="flex justify-end">
                <button data-modal-hide="editStok" class="material-icons">close</button>
            </div>
            <div class="w-full flex flex-col">
                <h1 class="font-bold mb-2">Edit Stok Produk</h1>
                <form action="/stok/edit/" method="POST" id="stok-form">
                    @csrf
                    <div class="w-full">
                        <label for="nama">Nama Produk:</label><br>
                        <select class="w-full form-input p-1" name="id" id="id" disabled>
                            <option value="" id="stok-nama" selected></option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="stok">Stok:</label><br>
                        <input required class="w-full form-input p-1" type="number" min="0" name="stok" id="stok-stok" placeholder="Stok">
                    </div>
                    <div class="w-full">
                        <label for="stok">Deskripsi:</label><br>
                        <textarea required class="w-full form-input p-1" name="deskripsi" id="stok-deskripsi" cols="30" rows="10" placeholder="Deskripsi" disabled></textarea>
                    </div>
                    <div class="flex justify-between gap-2">
                        <button class="text-center bg-gray-200 text-black px-2 py-1 rounded-lg flex-grow" data-modal-hide="editStok" type="button">Batal</button>
                        <button class="text-center bg-primary text-white px-2 py-1 rounded-lg flex-grow" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function editStok(id, nama, stok, deskripsi){
        $("#stok-form").attr("action", `/stok/edit/${id}`);
        $("#stok-nama").html(nama);
        $("#stok-stok").val(stok);
        $("#stok-deskripsi").val(deskripsi);
    }
</script>
