@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @component('components.menu')
        @endcomponent
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Posting Jurnal</div>

                <div class="card-body">
                    <form action="{{ route('jurnal.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-3">
                                <input type="text" name="tanggal" class="form-control text-center" id="tanggal" />
                            </div>
                            <label for="ref" class="col-sm-1 col-form-label">Ref</label>
                            <div class="col-sm-3">
                                <input type="text" name="ref" class="form-control" id="ref" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Akun</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="akun" onchange="select_category(this.value)">
                                    @foreach($data as $datas)
                                        <option value="{{ $datas->akunId }}">{{ $datas->akunKode }} - {{ $datas->akunNama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="keterangan" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="debit" class="col-sm-2 col-form-label">Debit</label>
                            <div class="col-sm-4">
                                <input type="text" name="debit" class="form-control text-right" id="debit" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kredit" class="col-sm-2 col-form-label">Kredit</label>
                            <div class="col-sm-4">
                                <input type="text" name="kredit" class="form-control text-right" id="kredit" />
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