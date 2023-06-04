<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Griees</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
            integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body class="flex w-screen">
<nav class="flex flex-col bg-primary w-1/4 gap-2 p-4 text-white h-screen">
    <a href="/" class="w-1/4">
        <img src="/images/logo.png" alt="">
    </a>
    <a href="/dashboard">Dashboard</a>
    <hr>
    <a href="/transaksi/tambah">Kasir</a>
    <hr>
    <a href="/produk">Produk</a>
    <hr>
    <a href="/stok">Stok Produk</a>
    <hr>
    <a href="/transaksi">Riwayat Transaksi</a>
    <hr>
    @if(auth()->user() ? auth()->user()->jabatan->jabatan_name === "pemilik" : false)
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-start">Keuangan
        </button>
        <hr>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="/keuangan/laporan" class="block px-4 py-2">Laporan Keuangan</a>
                </li>
                <li>
                    <a href="/keuangan/masuk" class="block px-4 py-2">Arus Kas Masuk</a>
                </li>
                <li>
                    <a href="/keuangan/keluar" class="block px-4 py-2">Arus Kas Keluar</a>
                </li>
            </ul>
        </div>
        <a href="/pegawai">Pegawai</a>
        <hr>
    @endif
</nav>

<main class="flex-grow bg-slate-100 px-4 h-screen overflow-y-hidden">
    <div class="flex justify-end items-center text-white font-bold px-4 bg-primary h-[10%] mb-4">
        <button data-modal-target="logout-modal" data-modal-toggle="logout-modal" class="flex items-center gap-2">Logout<span>{{auth()->user()->name}}</span></button>

        <div id="logout-modal" tabindex="-1"
             class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-hide="logout-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah anda yakin ingin keluar?</h3>
                        <a href="/logout" type="button"
                           class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Ya
                        </a>
                        <button data-modal-hide="logout-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                            Tidak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield("content")
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
