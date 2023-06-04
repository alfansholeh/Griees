<div id="detailStok" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="bg-gray-300 p-8">
            <div class="flex justify-end">
                <button data-modal-hide="detailStok" class="material-icons">close</button>
            </div>
            <div class="w-full flex flex-col">
                <h1 class="font-bold text-xl">Detail Stok Produk</h1>
                <div>
                    <div class="w-full">
                        <label class="font-bold" for="nama">Nama Produk:</label><br>
                        <h1 id="detail-nama"></h1>
                    </div>
                    <div class="w-full">
                        <label class="font-bold" for="stok">Stok:</label><br>
                        <h1 id="detail-stok"></h1>
                    </div>
                    <div class="w-full">
                        <label class="font-bold" for="stok">Deskripsi:</label><br>
                        <p id="detail-deskripsi"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function detailStok(nama, stok, deskripsi){
        $("#detail-nama").html(nama);
        $("#detail-stok").html(stok);
        $("#detail-deskripsi").html(deskripsi);
    }
</script>
