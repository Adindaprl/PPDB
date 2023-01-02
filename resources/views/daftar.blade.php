@extends('layout')
@section('content')

<div class="daftar-form">
    <div class="daftar">
        <form method="POST" action="{{route('daftar.input')}}">
          @csrf
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" value="" placeholder="Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="" placeholder="Email">
            </div>
            <div class="selform d-flex">
                <div class="mb-3" style="width: 45%">
                    <label class="form-label">NISN</label>
                    <input type="integer" class="form-control" name="nisn" value="" placeholder="NISN">
                </div>
                <div class=" mb-3" style="width: 45%;margin-left: 10%">
                <label class="form-label" placeholder="Pilih Jenis kelamin"></label>
                    <select class="form-select" name="jenisKelamin">
                    <option selected>Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
            </div>
            <label for="exampleInputEmail1" class="form-label">Asal Sekolah</label>
            <div class="search_select_box">
            <select name="asalSekolah" class="form-select mb-3" id="sekolah" onchange="tampil()">
                <option placeholder="Pilih Asal Sekolah"selected></option>
              @foreach ($schools as $item)
                  <option {{$item['nama_sekolah']}}>{{$item['nama_sekolah']}}</option>
              @endforeach
              <option value="lainnya">Lainnya...</option>
              </select>
              <div id="tampil"></div>
              <script>
                function tampil() {
                    var sekolah = document.getElementById("sekolah").value
                    if (sekolah == "lainnya") {
                        document.getElementById("tampil").innerHTML =
                            "<input type='text' style='width:400px;margin-top:8px' name='asal_sekolah'>";
                    } else {
                        document.getElementById("tampil").innerHTML = "";
                    }

                }
            </script>
            </div>
            <div class="mb-3">
              <label class="form-label">Nomor Handphone</label>
              <input type="integer" class="form-control" name="nomor" placeholder="Contoh:08...">
            </div>
            <div class="selform d-flex">
                <div class="mb-3" style="width: 45%">
                    <label class="form-label">Nomor HP Ayah</label>
                    <input type="integer" class="form-control" name="noAyah" placeholder="Contoh:08...">
                  </div>
                  <div class="mb-3"style="width: 45%;margin-left: 10%">
                    <label class="form-label">Nomor HP Ibu</label>
                    <input type="integer" class="form-control" name="noIbu" placeholder="Contoh:08...">
                  </div>
            </div>
            <center>
            <button type="submit" class="btnreg">Registrasi</button>
            </center>
          </form>
    </div>
</div>
@endsection