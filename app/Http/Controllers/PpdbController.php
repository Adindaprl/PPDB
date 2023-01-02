<?php

namespace App\Http\Controllers;

use App\Models\ppdb;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = user::all();
        return view('index');
    }

    public function daftar()
    {
        $schools = Http::get('https://akmalweb.my.id/api/daftar_smp.php')->json();
        return view('daftar', compact('schools'));
    }

    public function daftarAccount(Request $request){
        // dd($request->all());
        $request->validate([
                    'nama'=>'required',
                    'nisn'=>'required',
                    'email'=>'required',
                    'jenisKelamin'=>'required',
                    'asalSekolah'=>'required',
                    'nomor'=>'required',
                    'noAyah'=>'required',
                    'noIbu'=>'required',
               ]);
               User::create([
                    'nama'=> $request->nama,
                    'nisn'=> $request->nisn,
                    'email'=> $request->email,
                    'jenisKelamin'=> $request->jenisKelamin,
                    'asalSekolah'=> $request->asalSekolah,
                    'nomor'=> $request->nomor,
                    'noAyah'=> $request->noAyah,
                    'noIbu'=> $request->noIbu,
                    'role'=> 'user',
                    'username'=> $request->email,
                    'password'=> Hash::make($request->nisn),
               ]);
            return redirect('pdf')->with('success', 'Anda Berhasil Daftar!');
    }

    public function pdf()
    {
        $users=User::latest()->first();
        return view('pdf', compact('users'));
    }

    public function login()
    {
        return view('/login');
    }

    public function logout(){
        Auth::logout();
        return redirec()->route('login');
    }

    public function error(){
        return view('/error');
     }

    public function auth(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ], [
            'email.exists' => 'email ini belum tersedia',
            'email.required' => 'email harus diisi',
            'password.required' => 'password harus diisi',
        ]);
       $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect('dashboard');
        } else {
            return redirect()->back()->with('error', 'Gagal login silahkan cek dan coba lagi');
        }
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function show(ppdb $ppdb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function edit(ppdb $ppdb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ppdb $ppdb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function destroy(ppdb $ppdb)
    {
        //
    }
}
