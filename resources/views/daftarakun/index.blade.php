@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @component('components.menu')
        @endcomponent
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Daftar Akun
                    <a href="{{ route('daftarakun.create') }}" class=" btn btn-sm btn-success float-right">Tambah</a>
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
                                <th rowspan="2" class="text-center">Kode Akun</th>
                                <th rowspan="2" class="text-center">Nama Akun</th>
                                <th colspan="3" class="text-center">Saldo</th>
                                <th rowspan="2" class="text-center">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center">Normal</th>
                                <th class="text-center">Bertambah</th>
                                <th class="text-center">Berkurang</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $datas)
                            <tr>
                                <!-- td class="text-center">{{ $no++ }}</td -->
                                <td>{{ $datas->akunKode }}</td>
                                <td>{{ $datas->akunNama }}</td>
                                <td class="text-center">
                                    @if($datas->akunSaldoNormal == 'D')
                                        Debit
                                    @else
                                        Kredit
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($datas->akunSaldoBertambah == 'D')
                                        Debit
                                    @else
                                        Kredit
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($datas->akunSaldoBerkurang == 'D')
                                        Debit
                                    @else
                                        Kredit
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('daftarakun.destroy', $datas->akunId) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="{{ route('daftarakun.edit',$datas->akunId) }}" class=" btn btn-sm btn-primary">Edit</a>
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
