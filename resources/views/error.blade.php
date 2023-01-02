@extends('layout')
@section('content')

<div class="container pt-5">
    <img src="{{asset('assets/img/error.jpg')}}" alt="" max-width="250px" class="d-blok m-auto pt-5">
    <h5 class="text-center mt-3"> Anda tidak diperbolehkan mengakses halaman ini. </h5>
    <div class="d-flex justify-content-center mt-2">
        <a href="{{route('todo.index')}}" class="btn btn-primary"> Kembali</a>
    </div>
</div>
@endsection