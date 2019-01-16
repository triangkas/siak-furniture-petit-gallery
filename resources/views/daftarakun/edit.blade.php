@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @component('components.menu')
        @endcomponent
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Daftar Akun</div>

                <div class="card-body">
                    @foreach($data as $datas)
                    <form action="{{ route('daftarakun.update', $datas->akunId) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    
                        <div class="form-group row">
                            <label for="kode" class="col-sm-2 col-form-label">Kode Akun</label>
                            <div class="col-sm-3">
                                <input type="text" name="kodeAkun" class="form-control-plaintext font-weight-bold" id="kode" value="{{$datas->akunKode}}" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Akun</label>
                            <div class="col-sm-10">
                                <input type="text" name="namaAkun" class="form-control" id="nama" value="{{$datas->akunNama}}"  />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Saldo</label>
                            <div class="col-sm-10 row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="email">Normal</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoNormal" id="saldoNormalDebit" value="D" @if($datas->akunSaldoNormal == 'D') checked @endif >
                                            <label class="form-check-label" for="saldoNormalDebit">
                                                Debit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoNormal" id="saldoNormalKredit" value="K" @if($datas->akunSaldoNormal == 'K') checked @endif >
                                            <label class="form-check-label" for="saldoNormalKredit">
                                                Kredit
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="email">Bertambah</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoBertambah" id="saldoBertambahDebit" value="D" @if($datas->akunSaldoBertambah == 'D') checked @endif >
                                            <label class="form-check-label" for="saldoBertambahDebit">
                                                Debit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoBertambah" id="saldoBertambahKredit" value="K" @if($datas->akunSaldoBertambah == 'K') checked @endif >
                                            <label class="form-check-label" for="saldoBertambahKredit">
                                                Kredit
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="email">Berkurang</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoBerkurang" id="saldoBerkurangDebit" value="D" @if($datas->akunSaldoBerkurang == 'D') checked @endif >
                                            <label class="form-check-label" for="saldoBerkurangDebit">
                                                Debit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoBerkurang" id="saldoBerkurangKredit" value="K" @if($datas->akunSaldoBerkurang == 'K') checked @endif >
                                            <label class="form-check-label" for="saldoBerkurangKredit">
                                                Kredit
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group offset-sm-2">
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
