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
    <h3 style="text-align: center">LAPORAN SURAT MASUK
    </h3>

    @if ($mulai != null)
    <strong>Periode : {{\Carbon\Carbon::parse($mulai)->format('d M Y')}} s/d {{\Carbon\Carbon::parse($sampai)->format('d
        M Y')}}</strong>
    @endif
    @if ($bulan != null)
    @php
    $tanggal = \Carbon\Carbon::parse("{$tahun}-{$bulan}-01");
    @endphp
    <strong>Bulan : {{ $tanggal->translatedFormat('F Y') }} </strong>
    @endif

    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Tanggal Masuk</th>
            <th>Nomor Surat</th>
            <th>Pengirim</th>
            <th>Tanggal Surat</th>
            <th>Sifat</th>
            <th>Perihal</th>
            <th>Status</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{\Carbon\Carbon::parse($item->tgl_masuk)->translatedFormat('d-m-Y')}}</td>
            <td>{{$item->no_surat}}</td>
            <td>{{$item->pengirim}}</td>
            <td>{{\Carbon\Carbon::parse($item->tgl_surat)->translatedFormat('d-F-Y')}}</td>
            <td>{{$item->sifat}}</td>
            <td>{{$item->perihal}}</td>
            <td>{{$item->verifikasi_surat}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="8" style="font-weight: bold;">TOTAL SURAT MASUK : {{$data->count()}}</td>
        </tr>
        <tr>
            <td colspan="8">Jumlah Surat Diterima : {{$data->where('verifikasi_surat','diterima')->count()}} </br>
                        Jumlah Surat Ditolak : {{$data->where('verifikasi_surat','ditolak')->count()}}
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