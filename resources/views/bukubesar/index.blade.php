@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @component('components.menu')
        @endcomponent
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Buku Besar
                </div>
            
                <div class="card-body">
                    <form action="{{ route('bukubesar.store') }}" method="post" target="_blank">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Range Tanggal</label>
                            <div class="col-sm-3">
                                <input type="text" name="tanggal_awal" class="form-control text-center" id="tanggal_awal" />
                            </div>
                            <label for="ref" class="col-sm-1 col-form-label">s/d</label>
                            <div class="col-sm-3">
                                <input type="text" name="tanggal_akhir" class="form-control text-center" id="tanggal_akhir" />
                            </div>
                        </div>

                        <div class="form-group offset-sm-2">
                            <button type="submit" class="btn btn-md btn-primary">Cetak</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection