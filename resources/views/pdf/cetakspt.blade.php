<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>
<body>

    <table width="100%">
        <tr>
            <td width="15%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('background/logo.png'))) }}" width="80px"> &nbsp;&nbsp;
            </td>
            <td style="text-align: center;" width="70%">
                <strong>PEMERINTAH PROVINSI KALIMANTAN SELATAN</strong><br />
                <strong>BADAN PENDAPATAN DAERAH</strong><br />
                <strong>UNIT PELAYANAN PENDAPATAN DAERAH BANJARMASIN I</strong><br />
                        JALAN JEND. A.YANI Km. 6 KODE POS. 70249<br />
                        BANJARMASIN
            </td>
            <td width="15%">
            </td>
            
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center"><u>SURAT PERINTAH TUGAS</u><br>
      NOMOR : {{$data->nomor}}
    </h3> 
    <br/>
    Yang bertanda tangan di bawah ini :<br/>

    <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$data->nama}}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{$data->nip}}</td>
        </tr>
        <tr>
            <td>Pangkat</td>
            <td>:</td>
            <td>{{$data->pangkat}}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{$data->jabatan}}</td>
        </tr>
        <br/>
        
    </table>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>Nomor</td>
            <td>Nama</td>
            <td>Jabatan</td>
        </tr>

        @foreach ($data->petugas as $key2=> $item2)
            <tr>
                <td>{{$key2 + 1}}</td>
                <td>{{$item2->pegawai->nama}}
                    @if ($item2->pegawai->status == 'PNS')
                    <br/>NIP. {{$item2->pegawai->nip}}
                    @endif
                </td>
                <td>{{$item2->pegawai->jabatan->nama_jabatan}}
                    @if ($item2->pegawai->status == 'PNS')
                        <br/>Gol. {{$item2->pegawai->golongan}}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <br/>
    Maksud surat perintah tugas :
    <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td>1. Keperluan</td>
            <td>: {{$data->nama}}</td>
        </tr>
        <tr>
            <td>2. Tempat Tujuan</td>
            <td>: {{$data->tujuan}}</td>
        </tr>
        <tr>
            <td>3. Berlaku mulai tanggal</td>
            <td>: {{$data->berlaku}}</td>
        </tr>
        <tr>
            <td>4. Alat angkut</td>
            <td>: {{$data->transport}}</td>
        </tr>
        <tr>
            <td>5. Pembebanan biaya SPT</td>
            <td>: {{$data->pembebanan_biaya}}</td>
        </tr>
        
    </table>
    Demikian surat perintah tugas ini dibuat untuk dilaksanakan sebagaimana mestinya.
    <table width="100%">
        <tr>
            <td width="50%"></td>
            <td></td>
            <td><br />Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                UPPD BANJARMASIN 1<br />
                <br /><br /><br /><br />

                <u>Lilis Sugiati, SE</u><br />
            </td>
        </tr>
    </table>
</body>
</html>