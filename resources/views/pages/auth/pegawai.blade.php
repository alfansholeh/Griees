@extends("layouts.auth")
@section("content")
    @include("components.popup")
    <div class="flex justify-between items-start h-[calc(100vh-10%-1rem)] bg-white p-4">
        <div class="h-full overflow-y-scroll">
            <table>
                <tr class="bg-primary text-white">
                    <th class="px-2 border-2 border-gray-200">Nama</th>
                    <th class="px-2 border-2 border-gray-200">Jabatan</th>
                    <th class="px-2 border-2 border-gray-200 w-1/12">Jenis Kelamin</th>
                    <th class="px-2 border-2 border-gray-200">Nomor Telp</th>
                    <th class="px-2 border-2 border-gray-200">Email</th>
                    <th class="px-2 border-2 border-gray-200">Password</th>
                    <th class="px-2 border-2 border-gray-200">Aksi</th>
                </tr>
                @foreach($pegawais as $pegawai)
                    <tr>
                        <td class="text-center px-2 border-2 border-gray-200">{{$pegawai->name}}</td>
                        <td class="text-center px-2 border-2 border-gray-200 capitalize">{{$pegawai->jabatan->jabatan_name}}</td>
                        <td class="text-center px-2 border-2 border-gray-200">{{$pegawai->gender}}</td>
                        <td class="text-center px-2 border-2 border-gray-200">{{$pegawai->phone}}</td>
                        <td class="text-center px-2 border-2 border-gray-200">{{$pegawai->email}}</td>
                        <td class="text-center px-2 border-2 border-gray-200">***</td>
                        <td class="text-center px-2 border-2 border-gray-200">
                            <a href="/pegawai/edit/{{$pegawai->id}}" class="material-icons">edit</a>
                            <a href="/pegawai/{{$pegawai->id}}" class="material-icons">visibility</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <form enctype="multipart/form-data" method="POST" class="flex flex-col gap-2">
            @csrf
            @if($edit)
                <h1 class="font-bold">Edit Data Pegawai</h1>
            @else
                <h1 class="font-bold">Tambah Data Pegawai</h1>
            @endif
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-input p-1" placeholder="Nama"
                   value="{{$edit?$pegawai->name:""}}">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-input p-1">
                <option value selected disabled>Pilih Gender</option>
                <option value="L" @if($edit)
                    {{$pegawai->gender === "L" ? "selected" : ""}}
                    @endif>Laki-laki
                </option>
                <option value="P" @if($edit)
                    {{$pegawai->gender === "P" ? "selected" : ""}}
                    @endif>Perempuan
                </option>
            </select>
            <label for="phone">Nomor Telp</label>
            <input type="tel" class="form-input p-1" name="phone" id="phone" placeholder="Nomor Telp"
                   value="{{$edit?$pegawai->phone:""}}">
            <label for="email">Email</label>
            <input type="email" class="form-input p-1" name="email" id="email" placeholder="Email"
                   value="{{$edit?$pegawai->email:""}}">
            <label for="password">Password</label>
            <input type="password" class="form-input p-1" name="password" id="password" placeholder="Password">
            <button class="bg-primary px-4 py-2 rounded-xl text-white font-medium"
                    type="submit">{{$edit?"Simpan":"Tambah"}}</button>
        </form>
    </div>
@stop
