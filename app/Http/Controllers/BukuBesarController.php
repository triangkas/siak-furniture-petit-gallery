<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DaftarAkun;
use App\Jurnal;

class BukuBesarController extends Controller
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
        return view('bukubesar/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data['tanggal_awal'] = $request->tanggal_awal;
        $data['tanggal_akhir'] = $request->tanggal_akhir;
        $akuns = Jurnal::whereBetween('jurnalTanggal', array($request->tanggal_awal, $request->tanggal_akhir))
                                ->orderBy('jurnalKodeAkun', 'asc')
                                ->get();

        $kodeAkun = '';
        $dataAkun = array();
        foreach($akuns as $akun) {
            if($kodeAkun != $akun->jurnalKodeAkun){
                $dataAkun[]['data'] = $akun;
                $dataAkun[]['detail'] = Jurnal::where('jurnalKodeAkun', $detail->jurnalKodeAkun)
                                                ->orderBy('jurnalTanggal', 'asc')
                                                ->get();
            }
            $kodeAkun = $akun->jurnalKodeAkun;
        } 

        $data['akun'] = $dataAkun;
        
        return view('bukubesar/cetak',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
