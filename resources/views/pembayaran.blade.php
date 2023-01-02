@extends('sidebar')
@section('sdbar')
<div id="sidebar">
  <header>
    <a href="#">PPDB 2023-2024</a>
  </header>
  <ul class="nav">
     <li>
        <div class="card-sb" style=" width: 250px;">
            <div class="cardsb">
                <div class="card-body">
                    <img style="width:30px" src="{{asset('/assets/img/home.png')}}" alt="">
                    <a href="/dashboard">
                        <i></i> Dashboard
                      </a>
                </div>
              </div>
            <div class="cardsb">
                <div class="card-body">
                    <img style="width:30px" src="{{asset('/assets/img/payment.png')}}" alt="">
                    <a href="/pembayaran">
                        <i></i> Pembayaran
                      </a>
                </div>
            </div>
      </li>
  </ul>
</div>
</div>
    <div class="pembayaran" style="padding-left:20%">
      <div class="profile d-flex">
        <img src="{{asset('/assets/img/profile.png')}}"  style="width:40px;margin-left:70%" alt="">
        <div class="dropdown">
          <button class="mt-1" style="border:none;background-color:transparent;color:white;" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->nama}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <li><a class="dropdown-item" type="button" href="/login" >Logout</a></li>
          </ul>
        </div>
      </div>
      <div class="card1 d-flex" style="border: none">
          <div class="card-body" style="width: 18rem;">
                  <h4>Hi, {{Auth::user()->nama}}</h4>
                  <p> Silakan upload bukti pembayaran anda pada form berikut!</p>
          </div>
    </div>
    <div class="card">
      <div class="card-pembayaran">
        @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(is_null($bayar))
        <form method="post" enctype="multipart/form-data" action="{{route('payment')}}">
          @csrf
          @method('POST')
          <h6>Pembayaran</h6>
          <div class="d-flex">
            <div class="mb-3" style="width:45%;margin-right:5%">
              <label for="exampleInputPassword1" class="form-label">Nama Bank</label>
              <select name="nm_bank" class="form-select" aria-label="Default select example">
                <option selected>--pilih bank--</option>
                <option value="bri">Bank BRI</option>
                <option value="bca">Bank BCA</option>
                <option value="mandiri">Bank Mandiri</option>
              </select>
            </div>
            <div class="mb-3" style="width:45%;margin-right:5%">
              <label for="exampleInputPassword1" class="form-label">Nama Pemilik Rekening</label>
              <input type="text" name="nm_rek" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3" style="width:45%;">
              <label for="exampleInputEmail1" class="form-label">Nominal</label>
              <input name="nominal" type="integer" class="form-control uang" id="rupiah">
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Bukti Pembayaran</label>
            <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <button type="submit" class="btn-pem">Upload Bukti Pembayaran</button>
        </form>
        @elseif ($bayar['status'] == 'Ditolak')
        <form method="post" enctype="multipart/form-data" action="{{route('createPayment')}}">
          @csrf
          @method('PATCH')
          <h6>Pembayaran</h6>
          <div class="d-flex">
            <div class="mb-3" style="width:45%;margin-right:5%">
              <label for="exampleInputPassword1" class="form-label">Nama Bank</label>
              <select name="nm_bank" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="bri">Bank BRI</option>
                <option value="bca">Bank BCA</option>
                <option value="mandiri">Bank Mandiri</option>
              </select>
            </div>
            <div class="mb-3" style="width:45%;margin-right:5%">
              <label for="exampleInputPassword1" class="form-label">Nama Pemilik Rekening</label>
              <input type="text" name="nm_rek" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3" style="width:45%;">
              <label for="exampleInputEmail1" class="form-label">Nominal</label>
              <input name="nominal" type="integer" class="form-control uang" id="rupiah">
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Bukti Pembayaran</label>
            <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <button type="submit" class="btn-pem">Upload Bukti Pembayaran</button>
        </form>
        @elseif ($bayar['status'] == 'Diproses')
        <div class="alert alert-primary w-100">
            Pembayaran Anda sedang di proses oleh Admin!
         </div>
        @else
        <div class="alert alert-success w-100">
            Pembayaran Anda sudah di terima oleh Admin!
         </div>
        @endif
      </div>
    </div>
    </div>
@endsection
<script>
  /* Rupiah */
var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e)
    {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>