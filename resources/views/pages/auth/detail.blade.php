@extends("layouts.auth")
@section("content")
    <div class="flex flex-col items-center gap-4 w-full h-[calc(100vh-10%-1rem)] bg-white p-4 border">
        <h1 class="font-bold text-2xl">Data Pengguna</h1>
        <div class="flex gap-2">
            <div class="flex flex-col gap-2">
                <label for="name">Nama</label><input type="text" name="name" id="name" class="form-input p-1"
                                                     placeholder="Nama" value="{{$pegawai->name}}" disabled>
                <label for="jabatan_id">jabatan</label><select name="jabatan_id" class="form-input p-1" id="jabatan_id"
                                                               disabled>
                    <option selected>{{$pegawai->jabatan->jabatan_name}}</option>
                </select>
                <label for="gender">Jenis Kelamin</label><select name="gender" class="form-input p-1" id="gender"
                                                                 disabled>
                    <option value="L" {{$pegawai->gender === "L" ? "selected" : ""}}>Laki-laki
                    </option>
                    <option value="P" {{$pegawai->gender === "P" ? "selected" : ""}}>Perempuan
                    </option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="phone">Nomor Telepon</label><input type="text" class="form-input p-1" name="phone"
                                                               id="phone" placeholder="Nomor Telp"
                                                               value="{{$pegawai->phone}}" disabled>
                <label for="email">Email</label><input type="email" class="form-input p-1" name="email" id="email"
                                                       placeholder="Email" value="{{$pegawai->email}}" disabled>
                <label for="password">Password</label><input type="password" class="form-input p-1" name="password"
                                                             id="password" placeholder="Password" value="*********"
                                                             disabled>
            </div>
        </div>
    </div>
@stop
