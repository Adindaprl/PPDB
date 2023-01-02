@extends('layout')
@section('content')
<form action="/daftar">
    @csrf
    <div class="home">
        <div class="cardhome">
                <div class="t1">
                    <h1>PPDB TP 2023-2024</h1>
                    <h1>SMK Wikrama Bogor</h1>
                    <h6>Ayo segera daftarkan dirimu ke SMK Wikrama Bogor!</h6>
                    <button class="bhome">PENDAFTARAN PPDB</button>
            </div>
            <div class="card1 d-flex bg-light " style="border: none">
                <div class="card-body" style="width: 18rem;">
                        <h4>MOTTO</h4>
                        <p>Ilmu yang Amaliah, Amal yang Ilmiah, Akhlaqul Karimah</p>
                 </div>
                <div class="card-body" style="width: 18rem;">
                        <h4>AFIRMASI</h4>
                        <p>Padamu negeri - Kami berjanji lulus Wikrama siap membangun negeri</p>
                </div>
                <div class="card-body" style="width: 18rem;">
                        <h4>ATITUDE</h4>
                        <p>Aku ada lingkunganku bahagia</p>
                </div>
            </div>
          </div>
           {{-- Jurusan --}}
              <div class="jurusan">
                <h2>MAJOR COMPETITY</h2>
                <div class="rombel d-flex">
                    <center>
                      <div class="rombel d-flex">
                        <div class="card" style="width:18rem;">
                          <h5 class="card-header">M P L B</h5>
                          <div class="card-body">
                            <h6 class="card-title">Manajemen Perkantoran dan Layanan Bisnis</h6>
                              <img src="{{asset('/assets/img/mmd.jpg')}}" class="card-img-top" alt="...">
                              <p class="card-text">Fast typing with 10-finger technique (250 EPM 98%), manage office documents and archives, handle phones, manage finances and handle guests.</p>
                            </div>
                          </div>
                        <div class="card" style="width:18rem;">
                          <h5 class="card-header">P M N</h5>
                          <div class="card-body">
                            <h6 class="card-title">Pemasaran</h6>
                              <img src="{{asset('/assets/img/mmd.jpg')}}" class="card-img-top" alt="...">
                              <p class="card-text">Portfolio, creative content, website, communication, telemarketing and marketing communications.</p>
                            </div>
                          </div>
                        <div class="card" style="width:18rem;">
                          <h5 class="card-header">H T L</h5>
                          <div class="card-body">
                            <h6 class="card-title">Hotel</h6>
                              <img src="{{asset('/assets/img/mmd.jpg')}}" class="card-img-top" alt="...">
                              <p class="card-text">Tourism, operator telephone, bellboy/porter, reservation, receptionist, financial transaction document, houskeeping.</p>
                            </div>
                          </div>
                        <div class="card" style="width:18rem;">
                          <h5 class="card-header">K L N</h5>
                          <div class="card-body">
                            <h6 class="card-title">Kuliner</h6>
                              <img src="{{asset('/assets/img/mmd.jpg')}}" class="card-img-top" alt="...">
                              <p class="card-text">Tourism, ingredient processing, serving and storage, assessing the nutritional content, sanitation, hygiene and safety of the food served, processing various types of dishes.</p>
                            </div>
                          </div>
                      </div>
                    <div class="rombel d-flex">
                      <div class="card">
                        <h5 class="card-header">D K V</h5>
                        <div class="card-body">
                          <h6 class="card-title">Desain Komunikasi Visual</h6>
                            <img src="{{asset('/assets/img/mmd.jpg')}}" class="card-img-top" alt="...">
                            <p class="card-text">Applied art, digital photography, videography, graphic design, 3D graphics, animation, creative process.</p>
                          </div>
                        </div>
                      <div class="card">
                        <h5 class="card-header">P P L G</h5>
                        <div class="card-body">
                          <h6 class="card-title">Pengembangan Perangkat Lunak dan Gim</h6>
                            <img src="{{asset('/assets/img/rpl.jpg')}}" class="card-img-top" alt="...">
                            <p class="card-text">Deskop Programming Web Programing, Mobile Progaming, Bussiness Analyst, Database Administration.</p>
                          </div>
                        </div>
                      <div class="card">
                        <h5 class="card-header">T J K T</h5>
                        <div class="card-body">
                          <h6 class="card-title">Teknik Jarinan Komputer dan Telekomunikasi</h6>
                            <img src="{{asset('/assets/img/mmd.jpg')}}" class="card-img-top" alt="...">
                            <p class="card-text">Network Technician, Network Administration, Network Engineer and master of communications.</p>
                          </div>
                        </div>
                      </div>
                    </center>
                 </div>
          </div>
    </div>
</form>
{{-- contact person --}}
<div class="contact">
    <h1 class="cp mb-5" style="text-align:center">Hubungi Kami</h1>
     <form action="/daftar">
        @csrf
    <div class="d-flex">
        <div class="card-alamat">
            <h5>Kontak Pendaftaran</h5>
            <p>Jl. Raya Wangun No.12, RT.01/RW.06, SIndangsari, kec. Bogor Timur, Kota Bogor, Jawa Barat 16146 prohumasi@smkwikrama.net</p>
            <h6>CS 1: Hubungi Kami  (klik disini)</h6>
            <h6>CS 2: Hubungi Kami  (klik disini)</h6>
            <button type="submit" class="btnpesan mt-3">Daftar Sekarang</button>
        </div>
    </form>
    {{-- <form action="">
        @csrf --}}
        <div class="card-cp">
                <div class="mb-3">
                    <input type="text" class="form-control" name="namalengkap" placeholder="Nama Lengkap">
                </div>
                <div class="selform d-flex">
                    <div class="mb-3" style="width: 50%">
                        <input type="integer" class="form-control" name="nohp" placeholder="+62">
                    </div>
                    <div class="mb-3"style="width: 50%;margin-left:5%">
                        <input type="email" class="form-control" name="nohp" placeholder="Alamat Email">
                    </div>
                </div>
                <div class="mb-3">
                    <input type="paragraph" class="pesan" name="pesan" placeholder="Pesan">
                </div>
                <button type="submit" class="btnpesan">Kirim Pesan</button>
        </div>
    </form>
    </div>
</div>
{{-- footer --}}
<div class="footer">
    <img src="{{asset('/assets/img/logo.png')}}" alt="" class="logo">
    <img src="{{asset('/assets/img/linkedin.png')}}" alt="" class="linkedin">
    {{-- <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> --}}
</div>
@endsection