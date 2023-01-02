<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Ppdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    public function createPayment()
    {
        $bayar= Payment::where('ppdb_id', Auth::user()->ppdb_id)->first();
        return view('pembayaran', compact('bayar'));
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function adminPembayaran()
    {
        return view('admin.pembayaran');
    }

    public function dashboard()
    {
        $bayar= Payment::where('ppdb_id', Auth::user()->ppdb_id)->first();
        return view('dashboard', compact('bayar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nm_bank' => 'required',
            'nm_rek' => 'required',
            'nominal' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
        ]);

        $image = $request->file('image');
        $imgName = time().rand().'.'.$image->extension();

        if(!file_exists(public_path('/assets/img/bukti/'.$image->getClientOriginalName()))){
            //set untuk menyimpan file nya
            $dPath = public_path('/assets/img/bukti/');
            //memindahkan file yang diupload ke directory yang telah ditentukan
            $image->move($dPath, $imgName);
            $uploaded = $imgName;
        }else{
            $uploaded = $image->getClientOriginalName();
        }
        Payment::create([
            'nm_bank' => $request->nm_bank,
            // 'bank' => $request->bank,
            'nm_rek' => $request->nm_rek,
            'nominal' => $request->nominal,
            'image' => $uploaded,
            'status' => 'Diproses',
            'ppdb_id' => Auth::user()->ppdb_id,
         ]);
         return redirect()->route('payment')->with('Success', 'Bukti Pembayaran Anda sedang di proses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'nm_bank' => 'required',
            'nm_rek' => 'required',
            'nominal' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
        ]);

        $image = $request->file('image');
        $imgName = time().rand().'.'.$image->extension();

        if(!file_exists(public_path('/assets/img/global/'.$image->getClientOriginalName()))){
            //set untuk menyimpan file nya
            $dPath = public_path('/assets/img/global/');
            //memindahkan file yang diupload ke directory yang telah ditentukan
            $image->move($dPath, $imgName);
            $uploaded = $imgName;
        }else{
            $uploaded = $image->getClientOriginalName();
        }
        Payment::create([
            'nm_bank' => $request->nm_bank,
            // 'bank' => $request->bank,
            'nm_rek' => $request->nm_rek,
            'nominal' => $request->nominal,
            'image' => $uploaded,
            'status' => 'Ditolak',
            'ppdb_id' => Auth::user()->ppdb_id,
         ]);
         return redirect()->route('updatePayment')->with('notSuccess', 'Bukti Pembayaran Anda ditolak oleh Admin');

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
