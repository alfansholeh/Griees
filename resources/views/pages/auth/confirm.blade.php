@extends("layouts.blank")
@section("content")
    <main class="flex-grow h-screen flex items-center justify-center">
        <form method="POST" class="flex flex-col gap-2" enctype="multipart/form-data">
            @csrf
            <label for="paket">Paket</label><select name="paket_id" id="paket_id" class="form-input p-1">
                <option value selected disabled>Paket</option>
                @foreach($pakets as $paket)
                    <option value="{{$paket->id}}">{{$paket->name}} : Rp. {{$paket->price}}</option>
                @endforeach
            </select>
            <label for="metode">Metode</label><select name="metode" id="metode" class="form-input p-1">
                <option value selected disabled>Metode Pembayaran</option>
                <option value="BNI">BNI</option>
                <option value="BRI">BRI</option>
            </select>
            <label for="bukti">Bukti Pembayaran</label>
            <input type="file" name="bukti" id="bukti" class="form-input p-1">
            <button type="submit" class="bg-primary text-white py-2 rounded-full">Daftar</button>
        </form>
    </main>
@stop
