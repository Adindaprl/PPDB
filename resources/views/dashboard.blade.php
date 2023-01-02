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
<div class="dashboard" style="padding-left:20%">
    <div class="profile d-flex">
              <img src="{{asset('/assets/img/profile.png')}}" style="width:40px;margin-left:70%" alt="">
              <div class="dropdown">
                <button class="mt-1" style="border:none;background-color:transparent;color:white;" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                  {{Auth::user()->nama}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a class="dropdown-item" type="button" href="/login" >Logout</a></li>
                </ul>
              </div>
            </div>
    <div class="card1 d-flex bg-light " style="border: none">
        <div class="card-body" style="width: 18rem;">
                <h4>Hi, {{Auth::user()->nama}}</h4>
                <p> Selamat Datang di dashboard!</p>
         </div>
</div>
</div>
@endsection