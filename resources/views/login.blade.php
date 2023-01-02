@extends('layout')
@section('content')
<div class="login">
  <div class="card-log-1">
    <img class="img-log" src="{{asset('/assets/img/login.jpg')}}" alt="">
    </div>
    <div class="card-2">
          @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if (Session::get('notAllowed'))
        <div class="alert alert-danger w-100">
           {{ Session::get('notAllowed') }}
        </div>  
     @endif
        <h3>L O G I N</h3>
        <h6>Masuk ke Akun PPDB Mu!</h6>
        <form action="/login/auth" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn-log">LOGIN</button>
          </form>
    </div>
</div>
@endsection