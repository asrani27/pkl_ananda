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
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('background/logo.png'))) }}"
                    width="80px"> &nbsp;&nbsp;
            </td>
            <td style="text-align: center;" width="60%">
                <strong>BADAN PENDAPATAN DAERAH PROVINSI KALIMANTAN SELATAN</strong><br />
                <strong>UNIT PELAYANAN PENDAPATAN DAERAH</strong><br />
                <strong>(UPPD) BANJARMASIN I</strong><br />
                JALAN JEND. A.YANI Km. 6 KODE POS. 70249<br />
                BANJARMASIN
            </td>
            <td width="15%">
            </td>
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN RIWAYAT JABATAN<br>
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th style="text-align: center">No</th>
            <th style="text-align: center">Tanggal</th>
            <th style="text-align: center">NIP/Nama</th>
            <th style="text-align: center">Jenis Riwayat</th>
            <th style="text-align: center">Dari</th>
            <th style="text-align: center">Menjadi</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{1 + $key}}</td>
            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
            <td>{{$item->nip}} - {{$item->nama}}</td>
            <td>{{$item->jenis}}</td>
            <td>{{$item->dari}}</td>
            <td>{{$item->menjadi}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
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