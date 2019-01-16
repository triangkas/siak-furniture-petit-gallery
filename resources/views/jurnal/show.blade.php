                    <center>
                        <h2>
                            <b>Petit Gallery</b><br />
                            Jurnal Umum
                        </h2> 
                    </center>
                    
                    <table class="table table-bordered" width="100%" border="1">
                        <thead>
                            <tr>
                                <!-- th rowspan="2" class="text-center text-middle">No.</th -->
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Ref</th>
                                <th class="text-center">Kode Akun</th>
                                <th class="text-center">Nama Akun</th>
                                <th class="text-center">Debit</th>
                                <th class="text-center">Kredit</th>
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
                                <td class="text-center" align="center" valign="top">{{ $nowTanggal }}</td>
                                <td class="text-center" align="center" valign="top">{{ $datas->jurnalRef }}</td>
                                <td class="text-center" align="center" valign="top">{{ $datas->jurnalKodeAkun }}</td>
                                <td valign="top">
                                    {{ $datas->jurnalNamaAkun }}
                                    @if(!empty($datas->jurnalKeterangan))
                                        <br />
                                        <em>({{ $datas->jurnalKeterangan }})</em>
                                    @endif
                                </td>
                                <td class="text-right" align="right" valign="top">@if(!empty($datas->jurnalDebit)) {{ number_format($datas->jurnalDebit, 0, ',', '.') }} @endif</td>
                                <td class="text-right" align="right" valign="top">@if(!empty($datas->jurnalKredit)) {{ number_format($datas->jurnalKredit, 0,',', '.') }} @endif</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

<script>
	window.print();
</script>