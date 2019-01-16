<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DaftarAkunController;
use App\DaftarAkun;
use App\Jurnal;

class JurnalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jurnal::orderBy('jurnalTanggal', 'asc')->orderBy('jurnalId', 'asc')->get();
        return view('jurnal/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objDaftarAkun = new DaftarAkunController();
        $data = $objDaftarAkun->daftarAkun();
        return view('jurnal/create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Jurnal();
        
        if(!empty($request->akun))
        {
            $akun = DaftarAkun::where('akunId',$request->akun)->first();
            $data->jurnalKodeAkun = $akun->akunKode;
            $data->jurnalNamaAkun = $akun->akunNama;
        } 

        $data->jurnalTanggal = date('Y-m-d', strtotime($request->tanggal));
        $data->jurnalRef = $request->ref;
        $data->jurnalKeterangan = $request->keterangan;
        $data->jurnalDebit = $request->debit;
        $data->jurnalKredit = $request->kredit;
        $data->timestamps = false;
        $data->save();
        return redirect()->route('jurnal.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Jurnal::orderBy('jurnalTanggal', 'asc')->orderBy('jurnalId', 'asc')->get();
        return view('jurnal/show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objDaftarAkun = new DaftarAkunController();
        $data['akun'] = $objDaftarAkun->daftarAkun();
        $data['jurnal'] = Jurnal::where('jurnalId',$id)->get();
        return view('jurnal/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Jurnal::where('jurnalId',$id)->first();
        if(!empty($request->akun))
        {
            $akun = DaftarAkun::where('akunId',$request->akun)->first();
            $data->jurnalKodeAkun = $akun->akunKode;
            $data->jurnalNamaAkun = $akun->akunNama;
        } 
        $data->jurnalTanggal = date('Y-m-d', strtotime($request->tanggal));
        $data->jurnalRef = $request->ref;
        $data->jurnalKeterangan = $request->keterangan;
        $data->jurnalDebit = $request->debit;
        $data->jurnalKredit = $request->kredit;
        $data->timestamps = false;
        $data->save();
        return redirect()->route('jurnal.index')->with('alert-success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jurnal::where('jurnalId',$id)->first();
        $data->delete();
        return redirect()->route('jurnal.index')->with('alert-success','Data berhasi dihapus!');
    }
}
