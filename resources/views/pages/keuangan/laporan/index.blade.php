@extends("layouts.auth")
@section("content")
    <div class="p-4 h-[calc(100vh-10%-1rem)] bg-white overflow-y-scroll">
        <h1 class="text-center font-bold text-2xl">Laporan Keuangan</h1>
        <table class="w-full mt-4">
            <tr class="bg-primary text-white">
                <th class="py-2 border-2 border-gray-200 w-1/12">No.</th>
                <th class="py-2 border-2 border-gray-200">Tanggal</th>
                <th class="py-2 border-2 border-gray-200">Aksi</th>
            </tr>
            @foreach($days as $i=>$d)
                <tr>
                    <td class="border-2 border-gray-200 text-center">{{$i+1}}</td>
                    <td class="border-2 border-gray-200 text-center">{{$d->tanggal}}</td>
                    <td class="border-2 border-gray-200 text-center"><a href="?tanggal={{$d->tanggal}}"
                                                                        class="material-icons">visibility</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@stop
