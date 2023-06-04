<div id="detailTransaksi-{{$no+1}}" tabindex="-1"
     class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg p-4">
            <div class="flex justify-end">
                <button data-modal-hide="detailTransaksi-{{$no+1}}" class="material-icons">close</button>
            </div>
            <div class="bg-white flex flex-col items-start p-8 gap-3 rounded-xl">
                <h2 class="font-bold text-3xl">INVOICE</h2>
                <hr class="w-full">
                <p class="font-medium">Tanggal: {{$transaksi->day->tanggal}}</p>
                <div class="flex flex-col items-start">
                    <p class="font-medium">Oleh:</p>
                    <p class="ps-4">{{$transaksi->user->nama? : "Pegawai"}}</p>
                    <p class="ps-4">{{$transaksi->user->email}}</p>
                </div>
                <table class="w-full">
                    <tr class="border-b-2 border-black">
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                    @foreach($transaksi->details as $detail)
                        <tr class="bg-gray-200 border-b-2 border-black">
                            <td class="border">{{$detail->produk->nama}}</td>
                            <td class="border">{{$detail->produk->harga}}</td>
                            <td class="border">{{$detail->jumlah}}</td>
                            <td class="border">{{$detail->jumlah * $detail->produk->harga}}</td>
                        </tr>
                    @endforeach
                </table>
                <div>
                    <h2>Keterangan</h2>
                    <p>
                        {{$transaksi->keterangan}}
                    </p>
                </div>
                <div class="flex flex-col w-full items-end">
                    <p class="font-bold text-lg">Total : Rp.{{$transaksi->total}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
