@extends("layouts.blank")
@section("content")
    <main class="flex-grow h-screen flex flex-col gap-4 items-center justify-center">
        <h1 class="font-bold text-3xl">Register</h1>
        <div class="bg-primary rounded-full p-2">
            <img src="/images/logo.png" alt="">
        </div>
        <form method="POST" class="flex flex-col gap-2">
            @include("components.popup")
            @csrf
            <label for="nama_usaha">Nama Usaha</label><input type="text" class="form-input" name="nama_usaha" id="nama_usaha" placeholder="Nama Usaha">
            <div class="flex gap-4">
                <div class="flex flex-col">
                    <label for="name">Nama</label><input type="text" class="form-input" name="name" id="name" placeholder="Nama">
                    <label for="email">Email</label><input type="email" class="form-input" name="email" id="email" placeholder="Email">
                    <label for="password">Password</label><input type="password" class="form-input" name="password" id="password" placeholder="Password">
                </div>
                <div class="flex flex-col">
                    <label for="phone">Nomor Telepon</label><input type="tel" class="form-input" name="phone" id="phone" placeholder="No. Telepon">
                    <label for="bidang">Bidang</label><input type="text" class="form-input" name="bidang" id="bidang" placeholder="Bidang Usaha">
                    <label for="jumlah_pegawai">Jumlah Pegawai</label><input type="number" class="form-input" name="jumlah_pegawai" id="jumlah_pegawai" placeholder="Jumlah Pegawai">
                </div>
            </div>
            <button type="submit" class="bg-primary text-white py-2 rounded-full">Selanjutnya</button>
        </form>
    </main>
@stop
