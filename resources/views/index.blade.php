@extends("layouts.blank")
@section("content")
    @include("components.popup")
    <div class="h-[calc(100vh-10%)] overflow-y-scroll">
        <div class="h-[calc(100vh-10%)]" id="home">
            <img src="/images/slider.png" class="h-full object-cover" alt="">
        </div>
        <div class="h-screen p-8 flex flex-col items-center justify-center">
            <h1 class="font-bold text-3xl text-primary">Ragam Fitur Griees</h1>
            <p>Kelola bisnis jadi lebih hemat biaya, hemat tenaga, dan hemat waktu</p>
            <div class="mt-8 w-full flex gap-4 justify-center">
                <div class="w-1/4 shadow flex flex-col items-center rounded-3xl">
                    <img src="/images/il1.png" class="w-full">
                    <div class="p-4 pt-8 mt-[-50px] bg-white rounded-3xl">
                        <h2 class="text-primary font-bold text-xl mb-2 text-center">Mempermudah Pencatatan Keuangan
                            Anda</h2>
                        <p class="text-center">Maksimalkan keuntungan dengan pengelolaan penjualan, keuangan, dan
                            inventori. Maksimalkan keuntungan dengan pengelolaan penjualan, keuangan, dan inventori.</p>
                    </div>
                </div>
                <div class="w-1/4 shadow flex flex-col items-center rounded-3xl">
                    <img src="/images/il2.png" class="w-full">
                    <div class="p-4 pt-8 mt-[-50px] bg-white rounded-3xl">
                        <h2 class="text-primary font-bold text-xl mb-2 text-center">Mempermudah Pencatatan Keuangan
                            Anda</h2>
                        <p class="text-center">Maksimalkan keuntungan dengan pengelolaan penjualan, keuangan, dan
                            inventori. Maksimalkan keuntungan dengan pengelolaan penjualan, keuangan, dan inventori.</p>
                    </div>
                </div>
                <div class="w-1/4 shadow flex flex-col items-center rounded-3xl">
                    <img src="/images/il3.png" class="w-full">
                    <div class="p-4 pt-8 mt-[-50px] bg-white rounded-3xl">
                        <h2 class="text-primary font-bold text-xl mb-2 text-center">Mempermudah Pencatatan Keuangan
                            Anda</h2>
                        <p class="text-center">Maksimalkan keuntungan dengan pengelolaan penjualan, keuangan, dan
                            inventori. Maksimalkan keuntungan dengan pengelolaan penjualan, keuangan, dan inventori.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="min-h-screen bg-primary flex flex-col items-center p-8 justify-center" id="packet">
            <h1 class="font-bold text-3xl text-white">Paket Yang Kami Tawarkan</h1>
            <p class="text-white">Pilih paket sesuai kebutuhan Anda, dan kekola bisnis Anda dengan sukses!</p>
            <div class="flex justify-center items-center gap-4 mt-8">
                <div class="text-center rounded-3xl p-4 bg-white w-1/4 flex flex-col items-center gap-2">
                    <img src="/images/packet.png" alt="">
                    <h2 class="font-bold text-xl">Paket Berlangganan Silver</h2>
                    <p class="font-medium bg-yellow-300 px-4 py-1 rounded-xl">Rp 100.000,-</p>
                    <p class="text-slate-400">Masa aktif 3 bulan</p>
                    <p>Fitur lengkap dengan limited storage data dan pengguna. Paket ini cocok untuk membangun bisnis Anda yang masih berusia sekitar 1-2 tahun dan memiliki
                        alur bisni yang masih simple. Paket ini juga cocok untuk masa percobaan menggunakan layanan
                        kami.</p>
                    <a href="/register" class="bg-primary text-white self-stretch py-2 rounded-xl">Beli Paket</a>
                </div>
                <div class="text-center rounded-3xl p-4 bg-white w-1/3 flex flex-col items-center gap-2">
                    <img src="/images/packet.png" alt="">
                    <h2 class="font-bold text-xl">Paket Berlangganan Platinum</h2>
                    <p class="font-medium bg-yellow-300 px-4 py-1 rounded-xl">Rp 300.000,-</p>
                    <p class="text-slate-400">Masa aktif 6 bulan</p>
                    <p>Fitur lengkap dengan limited storage data dan pengguna. Peket ini cocok untuk membangun bisnis Anda yang masih berusia sekitar 1-2 tahun dan memiliki
                        alur bisni yang masih simple. Paket ini juga cocok untuk masa percobaan menggunakan layanan
                        kami.</p>
                    <a href="/register" class="bg-primary text-white self-stretch py-2 rounded-xl">Beli Paket</a>
                </div>
                <div class="text-center rounded-3xl p-4 bg-white w-1/4 flex flex-col items-center gap-2">
                    <img src="/images/packet.png" alt="">
                    <h2 class="font-bold text-xl">Paket Berlangganan Gold</h2>
                    <p class="font-medium bg-yellow-300 px-4 py-1 rounded-xl">Rp 500.000,-</p>
                    <p class="text-slate-400">Masa aktif 1 tahun</p>
                    <p>Fitur lengkap dengan unlimited storage data dan pengguna. Peket ini cocok untuk membangun bisnis Anda yang masih berusia sekitar 1-2 tahun dan memiliki
                        alur bisni yang masih simple. Paket ini juga cocok untuk masa percobaan menggunakan layanan
                        kami.</p>
                    <a href="/register" class="bg-primary text-white self-stretch py-2 rounded-xl">Beli Paket</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center p-8" id="about">
            <h1 class="font-bold text-3xl text-primary">Ragam Fitur Griees</h1>
            <p>Kelola bisnis jadi lebih hemat biaya, hemat tenaga, dan hemat waktu</p>
            <div class="w-2/3 flex flex-col gap-8 mt-8">
                <div class="flex gap-4">
                    <img src="/images/il4.png" class="rounded-xl w-1/2 object-cover" alt="">
                    <div>
                        <h2 class="font-bold text-xl">TENTANG GRIEES</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-primary text-white p-8">
            <div class="flex justify-center gap-20">
                <div class="flex flex-col gap-4 w-1/4">
                    <img src="/images/logo.png" class="self-start" alt="">
                    <p>Aplikasi wirausaha terlengkap untuk kelola bisnismu jadi lebih maju.</p>
                    <div class="flex flex-col gap-2">
                        <h2 class="font-bold text-slate-400">Call Center</h2>
                        <p>0345-56789-321</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <h2 class="font-bold text-slate-400">Fitur</h2>
                        <a href="/transaksi/tambah">Kasir</a>
                        <a href="/dashboard">Dashboard Analisis</a>
                        <a href="/keuangan/keluar">Pencatatan Keuangan</a>
                        <a href="/stok">Pencatatan Stok</a>
                        <a href="/login">Akun</a>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h2 class="font-bold text-slate-400">Fitur</h2>
                        <p>Sumbersari, Jember</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <h2 class="font-bold text-slate-400">Layanan</h2>
                        <a href="/transaksi/tambah">Kasir</a>
                        <a href="/dashboard">Dashboard Analisis</a>
                        <a href="/keuangan/keluar">Pencatatan Keuangan</a>
                        <a href="/stok">Pencatatan Stok</a>
                        <a href="/login">Akun</a>
                    </div>
                </div>
            </div>
            <p class="text-center font-bold mt-4">@2023 GRIEES Website Pencatatan dan Analisis</p>
        </footer>
    </div>
@stop
