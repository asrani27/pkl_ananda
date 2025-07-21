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
    <h3 style="text-align: center">LAPORAN DOKUMEN KADALUARSA<br>
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Jenis Dokumen</th>
            <th>No Surat</th>
            <th>Perihal</th>
            <th>Tahun Aktif</th>
            <th>Tahun Inaktif</th>
            <th>Status</th>
            <th>Lokasi Penyimpanan</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)

        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item['jenis']}}</td>
            <td>{{$item['nomor_surat']}}</td>
            <td>{{$item['perihal']}}</td>
            <td>{{$item['tahun']}}</td>
            <td>{{\Carbon\Carbon::now()->year}}</td>
            <td>kadaluarsa</td>
            <td>File PDF Di Admin</td>

        </tr>
        @endforeach

        <tr>
            <td colspan="8">
                Jumlah Surat Masuk Kadaluarsa : {{ $total_surat_masuk}}<br />
                Jumlah Surat Keluar Kadaluarsa : {{ $total_surat_keluar }}<br />
                Jumlah SPT Kadaluarsa: {{ $total_surat_spt }}<br />
            </td>
        </tr>
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