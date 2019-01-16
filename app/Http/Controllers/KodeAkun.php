<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelKodeAkun;

class KodeAkun extends Controller
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
        $data = ModelKodeAkun::all();
        return view('kodeakun/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kodeakun/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ModelKodeAkun();
        $data->akun_kode = $request->kodeakun;
        $data->akun_nama = $request->namaakun;
        $data->save();
        return redirect()->route('kodeakun.index')->with('alert-success','Berhasil Menambahkan Data!');
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
        $data = ModelKodeAkun::where('akun_id',$id)->get();
        return view('kodeakun/edit',compact('data'));
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
        $data = ModelKodeAkun::where('akun_id',$id)->first();
        $data->akun_kode = $request->kodeakun;
        $data->akun_nama = $request->namaakun;
        $data->save();
        return redirect()->route('kodeakun.index')->with('alert-success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelKodeAkun::where('akun_id',$id)->first();
        $data->delete();
        return redirect()->route('kodeakun.index')->with('alert-success','Data berhasi dihapus!');
    }
}
