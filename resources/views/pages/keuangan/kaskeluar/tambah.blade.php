@extends("layouts.auth")
@section("content")
        <div class="p-4 bg-white h-[calc(100vh-10%-1rem)] overflow-y-scroll">
            <form method="post" enctype="multipart/form-data" class="p-4 flex flex-col gap-2 items-center">
                @csrf
                <h1 class="font-bold text-2xl">BORANG ISIAN KAS KELUAR</h1>
                <div class="flex gap-2 w-full">
                    <div class="flex flex-col gap-2 w-1/2">
                        <div>
                            <label for="tanggal">Tanggal</label><br>
                            <input class="w-full form-input p-1" type="date" name="tanggal" id="tanggal" value="{{date("Y-m-d")}}">
                        </div>
                        <div>
                            <label for="jenis_pengeluaran">Jenis Pengeluaran</label><br>
                            <select class="w-full form-input p-1" name="jenis_pengeluaran"
                                    id="jenis_pengeluaran">
                                <option value="gaji">Gaji</option>
                                <option value="belanja bahan">Belanja Bahan</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label><br>
                            <input class="w-full form-input p-1" type="number"
                                   name="jumlah_pengeluaran"
                                   id="jumlah_pengeluaran">
                        </div>
                        <div>
                            <label for="keterangan">Keterangan</label><br>
                            <textarea class="w-full form-input p-1" name="keterangan" id="keterangan" cols="30" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="pb-8 w-1/2">
                        <label for="filebukti">Upload File Bukti</label><br>
                        <input type="file" class="w-full h-full form-input" name="filebukti" id="filebukti">
                    </div>
                </div>
                <button type="submit" class="bg-primary text-white w-full py-2 rounded-full">Simpan</button>
            </form>
        </div>
    </main>
@stop
