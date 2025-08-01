<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report SPT</title>
     <style>
        .p {
            margin: 0 !important;
        }

        .konten-summernote table {
            width: 100%;
            border-collapse: collapse;
        }

        .konten-summernote table,
        .konten-summernote th,
        .konten-summernote td {
            border: 1px solid black;
            padding: 4px;
            font-size: 12px;
        }
    </style>
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
                <strong>UNIT PELAYANAN PENDAPATAN DAERAH BANJARMASIN I</strong>
                <br/>
                Jl. Jendral A.Yani Km. 6 Telp/Fax (0511) 3257025 KODE POS. 70249
                <br />
                <strong>BANJARMASIN</strong>
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
     <div class="konten-summernote">
        {!!$data->yang_ditugaskan!!}
    </div>
    <br/>
    Maksud surat perintah tugas :
    <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td style="vertical-align: top">1. Keperluan</td>
            <td style="vertical-align: top" width="6px">:</td>
            <td width="70%">{{$data->keperluan}}</td>
        </tr>
        <tr>
            <td style="vertical-align: top">2. Tempat Tujuan</td>
            <td style="vertical-align: top">:</td>
            <td>{{$data->tujuan}}</td>
        </tr>
        <tr>
            <td style="vertical-align: top">3. Berlaku mulai tanggal</td>
            <td style="vertical-align: top">:</td>
            <td>{{\Carbon\Carbon::parse($data->berlaku)->translatedFormat('d F Y')}}</td>
        </tr>
        <tr>
            <td style="vertical-align: top">4. Alat angkut</td>
            <td style="vertical-align: top">:</td>
            <td>{{$data->transport}}</td>
        </tr>
        <tr>
            <td style="vertical-align: top">5. Pembebanan biaya SPT</td>
            <td style="vertical-align: top">:</td>
            <td>{{$data->pembebanan_biaya}}</td>
        </tr>
        
    </table>
    <br/>
    Demikian surat perintah tugas ini dibuat untuk dilaksanakan sebagaimana mestinya setelah selesai menjalankan SPT ini diharuskan menyampaikan hasil laporan kepada yang memberikan tugas
    <table width="100%">
         <tr>
            <td style="text-align: center;" width="40%">
            <td></td>
            <td style="text-align: center;">
                <br>Banjarmasin, {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} <br/>
                <strong><br />KEPALA UPPD BANJARMASIN I</strong><br />
                <br /><br /><br /><br /><br />
            
                <u><strong> MIRZA LUFFILLAH, SE.,M.M</strong></u><br />
                <Canter>Pembina<br/>
                NIP. 19811204 200904 1 001
            </td>
        </tr>
    </table>
</body>
</html>


{{-- <table width="100%" border="1" cellpadding="5" cellspacing="0">
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
                <br />NIP. {{$item2->pegawai->nip}}
                @endif
            </td>
            <td>{{$item2->pegawai->jabatan->nama_jabatan}}
                @if ($item2->pegawai->status == 'PNS')
                <br />Gol. {{$item2->pegawai->golongan}}
                @endif
            </td>
        </tr>
        @endforeach
    </table> --}}