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
    <h3 style="text-align: center">LAPORAN RIWAYAT DISPOSISI SURAT <br>

    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Jenis Surat</th>
            <th>Nomor</th>
            <th>Tanggal Surat</th>
            <th>Tanggal Disposisi</th>
            <th>Perihal</th>
            <th>Status</th>
            <th>Catatan</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item['jenis']}}</td>
            <td>{{$item['no_surat']}}</td>
            <td>{{\Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d F Y')}}</td>
            <td>{{\Carbon\Carbon::parse($item['tgl_disposisi'])->translatedFormat('d F Y')}}</td>
            <td>{{$item['perihal']}}</td>
            <td>{{$item['verifikasi_surat']}}</td>
            <td>{{$item['tindak_lanjut']}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="8" style="font-weight: bold;">TOTAL RIWAYAT DISPOSISI SURAT : {{$data->count()}}</td>
        </tr>
        <tr>
            <td colspan="8">Total Surat Masuk : {{$data->where('jenis','surat masuk')->count()}}<br />
                Total Surat Keluar : {{$data->where('jenis','surat keluar')->count()}}<br />
                Surat Disetujui : {{$data->where('verifikasi_surat','diterima')->count()}}<br />
                Surat Ditolak : {{$data->where('verifikasi_surat','ditolak')->count()}}<br />
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="60%" style="vertical-align: top">
              
                <br />
            </td>
            <td></td>
    </tabel>
    <br/>
            <td><br />
               <center>
                    Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                KEPALA UPPD BANJARMASIN I<br />
                <br /><br /><br /><br />
                <u>MIRZA LUFFILLAH, SE.,M.M</u><br />
                Pembina<br/>
                NIP. 19811204 200904 1 001
                </center>
            </td>
        </tr>
    </table>
</body>

</html>