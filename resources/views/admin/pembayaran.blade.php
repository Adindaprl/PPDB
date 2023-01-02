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
        <form>
          <h6>Pembayaran</h6>
          <div class="d-flex">
            <div class="mb-3" style="width:45%;margin-right:5%">
              <label for="exampleInputPassword1" class="form-label">Nama Bank</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="mb-3" style="width:45%;margin-right:5%">
              <label for="exampleInputPassword1" class="form-label">Nama Pemilik Rekening</label>
              <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3" style="width:45%;">
              <label for="exampleInputEmail1" class="form-label">Nominal</label>
              <input type="integer" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nominal</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <button type="submit" class="btn-pem">Upload Bukti Pembayaran</button>
        </form>
      </div>
    </div>
    </div>

@endsection