@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @component('components.menu')
        @endcomponent
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Jurnal
                    <a href="{{ route('jurnal.create') }}" class=" btn btn-sm btn-success float-right">Posting</a>
                    <a href="{{ route('jurnal.index') }}/show" target="_blank" class=" btn btn-sm btn-info float-right">Cetak</a>
                </div>

                <div class="card-body">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success">
                            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <!-- th rowspan="2" class="text-center text-middle">No.</th -->
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Ref</th>
                                <th class="text-center">Kode Akun</th>
                                <th class="text-center">Nama Akun</th>
                                <th class="text-center">Debit</th>
                                <th class="text-center">Kredit</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php 
                            $no = 1; 
                            $oldTanggal = '';
                            $nowTanggal = '';
                        @endphp
                        @foreach($data as $datas)
                            @php 
                                $nowTanggal = date('d-m-Y', strtotime($datas->jurnalTanggal));
                                if($datas->jurnalTanggal == $oldTanggal){
                                    $nowTanggal = '';
                                }

                                $oldTanggal = $datas->jurnalTanggal;
                            @endphp
                            <tr>
                                <!-- td class="text-center">{{ $no++ }}</td -->
                                <td class="text-center">{{ $nowTanggal }}</td>
                                <td class="text-center">{{ $datas->jurnalRef }}</td>
                                <td class="text-center">{{ $datas->jurnalKodeAkun }}</td>
                                <td>
                                    {{ $datas->jurnalNamaAkun }}
                                    @if(!empty($datas->jurnalKeterangan))
                                        <br />
                                        <em>({{ $datas->jurnalKeterangan }})</em>
                                    @endif
                                </td>
                                <td class="text-right">@if(!empty($datas->jurnalDebit)) {{ number_format($datas->jurnalDebit, 0, ',', '.') }} @endif</td>
                                <td class="text-right">@if(!empty($datas->jurnalKredit)) {{ number_format($datas->jurnalKredit, 0,',', '.') }} @endif</td>
                                <td class="text-center">
                                    <form action="{{ route('jurnal.destroy', $datas->jurnalId) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="{{ route('jurnal.edit',$datas->jurnalId) }}" class=" btn btn-sm btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
