<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DaftarAkun;

class DaftarAkunController extends Controller
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
        $data = $this->daftarAkun();
        return view('daftarakun/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->daftarAkun();
        return view('daftarakun/create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new DaftarAkun();
        
        if(!empty($request->kategori))
        {
            $akunMaster = DaftarAkun::where('akunKode',$request->kategori)->first();
            $data->akunParentId = $akunMaster->akunId;
        } 
        else 
        {
            $data->akunParentId = 0;
        }
        $data->akunKode = $request->kodeAkun.$request->subKodeAkun;
        $data->akunNama = $request->namaAkun;
        $data->akunSaldoNormal = $request->saldoNormal;
        $data->akunSaldoBertambah = $request->saldoBertambah;
        $data->akunSaldoBerkurang = $request->saldoBerkurang;
        $data->timestamps = false;
        $data->save();
        return redirect()->route('daftarakun.index')->with('alert-success','Berhasil Menambahkan Data!');
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
        $data = DaftarAkun::where('akunId',$id)->get();
        return view('daftarakun/edit',compact('data'));
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
        $data = DaftarAkun::where('akunId',$id)->first();
        $data->akunNama = $request->namaAkun;
        $data->akunSaldoNormal = $request->saldoNormal;
        $data->akunSaldoBertambah = $request->saldoBertambah;
        $data->akunSaldoBerkurang = $request->saldoBerkurang;
        $data->timestamps = false;
        $data->save();
        return redirect()->route('daftarakun.index')->with('alert-success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DaftarAkun::where('akunId',$id)->first();
        $data->delete();
        return redirect()->route('daftarakun.index')->with('alert-success','Data berhasi dihapus!');
    }

    function daftarAkun($parantId = 0)
    {   
        $result = array();
        $subDaftarAkun = array();
        $data = DaftarAkun::where('akunParentId', $parantId)->get();
        if(!empty($data)){
            foreach($data as $akun)
            {   
                // master
                $result[] = $akun;
                // sub
                $subDaftarAkun = $this->daftarAkun($akun->akunId);
                if(!empty($subDaftarAkun)){
                    foreach($subDaftarAkun as $subAkun)
                    {
                        $result[] = $subAkun;
                    }
                }
            }
        }

        return $result;
    }

}
