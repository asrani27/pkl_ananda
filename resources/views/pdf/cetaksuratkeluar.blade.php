<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
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
            padding: 8px;
        }
    </style>
</head>

<body>

    <table id="" width="100%">
        <tr>
            <td width="15%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('background/logo.png'))) }}"
                    width="80px"> &nbsp;&nbsp;
            </td>
            <td style="text-align: center;" width="60%">
                UPPD BANJARMASIN I<BR />
                PROVINSI KALIMANTAN SELATAN<br />
                JALAN JEND. A.YANI Km. 6 KODE POS. 70249
            </td>
            <td width="15%">
            </td>

        </tr>
    </table>
    <hr>
    <div style="text-align: right">Banjarmasin, {{\Carbon\Carbon::now()->format('d M Y')}}
    </div>
    <br />
    Yang bertanda tangan di bawah ini :<br />

    <table width="40%" border="0" cellpadding="3" cellspacing="0">
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <td>{{$data->no_surat}}</td>
        </tr>
        <tr>
            <td>Sifat</td>
            <td>:</td>
            <td>{{$data->sifat}}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>{{$data->lampiran}}</td>
        </tr>
        <tr>
            <td style="vertical-align: top">Perihal</td>
            <td style="vertical-align: top">:</td>
            <td>{{$data->perihal}}</td>
        </tr>

    </table>
    <div class="konten-summernote">
        {!!$data->isi!!}
    </div>
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

    Demikian surat perintah tugas ini dibuat untuk dilaksanakan sebagaimana mestinya.
    <table width="100%">
        <tr>
            <td width="50%"></td>
            <td></td>
            <td><br />Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                Admin<br />
                <br /><br /><br /><br />

                <u>Ananda Risna Pebrianti</u><br />
                NPM 2110010521
            </td>
        </tr>
    </table>
</body>

</html>