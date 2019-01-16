
                    <center>
                        <h2>
                            <b>Petit Gallery</b><br />
                            Buku Besar<br />
                            {{ date('d-m-Y', strtotime($data['tanggal_awal'])) }} - {{ date('d-m-Y', strtotime($data['tanggal_akhir'])) }}
                        </h2> 
                    </center>

                    @foreach($data['akun'] as $akuns)
                        <table>
                            <tr>
                                <td>Kode Akun</td>
                                <td>: {{ $akuns['data']->jurnalKodeAkun }}</td>
                            </tr>
                            <tr>
                                <td>Nama Akun</td>
                                <td>: {{ $akuns['data']->jurnalNamaAkun }}</td>
                            </tr>
                        </table>

                        
                            <table border="1" width="100%">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Transaksi</th>
                                    <th>Ref</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                    <th>Saldo</th>
                                </tr>

                                @foreach($akuns['detail'] as $detail)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                
                            </table>
                    
                    @endforeach

<script>
	window.print();
</script>