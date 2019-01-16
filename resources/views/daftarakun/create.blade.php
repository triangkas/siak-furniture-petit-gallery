@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @component('components.menu')
        @endcomponent
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Tambah Daftar Akun</div>

                <div class="card-body">
                    <form action="{{ route('daftarakun.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kategori" onchange="select_category(this.value)">
                                    <option value="">Utama</option>
                                    @foreach($data as $datas)
                                        <option value="{{ $datas->akunKode }}">{{ $datas->akunKode }} - {{ $datas->akunNama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kode" class="col-sm-2 col-form-label">Kode Akun</label>
                            <div class="col-sm-2">
                                <input type="text" name="kodeAkun" class="form-control text-center" id="kode" readonly />
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="subKodeAkun" class="form-control" id="subkode" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Akun</label>
                            <div class="col-sm-10">
                                <input type="text" name="namaAkun" class="form-control" id="nama" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Saldo</label>
                            <div class="col-sm-10 row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="email">Normal</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoNormal" id="saldoNormalDebit" value="D" checked>
                                            <label class="form-check-label" for="saldoNormalDebit">
                                                Debit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoNormal" id="saldoNormalKredit" value="K" >
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
                                            <input class="form-check-input" type="radio" name="saldoBertambah" id="saldoBertambahDebit" value="D" checked>
                                            <label class="form-check-label" for="saldoBertambahDebit">
                                                Debit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoBertambah" id="saldoBertambahKredit" value="K">
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
                                            <input class="form-check-input" type="radio" name="saldoBerkurang" id="saldoBerkurangDebit" value="D" checked>
                                            <label class="form-check-label" for="saldoBerkurangDebit">
                                                Debit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="saldoBerkurang" id="saldoBerkurangKredit" value="K">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    function select_category(kode)
    {
        $('#kode').val(kode);
    }
</script>
@endsection