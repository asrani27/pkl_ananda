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
    <h3 style="text-align: center">LAPORAN PENGAJUAN CUTI<br>
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Tanggal Surat</th>
            <th>NIP/NAMA</th>
            <th style="text-align: center">Tanggal Mulai Cuti</th>
            <th style="text-align: center">Tanggal Selesai Cuti</th>
            <th style="text-align: center">Alasan</th>
            <th style="text-align: center">Status</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{1 + $key}}</td>
            <td>{{$item->user->pegawai->nik}} - {{$item->user->name}}</td>
            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}</td>
            <td>{{\Carbon\Carbon::parse($item->tgl_mulai)->format('d-m-Y')}}</td>
            <td>{{\Carbon\Carbon::parse($item->tgl_selesai)->format('d-m-Y')}}</td>
            <td>{{$item->alasan}}</td>
            <td>
                <span class="badge badge-success">Dikirim</span><br />
                @if ($item->verifikasi_kepala != null)
                <span class="badge badge-success">Kepala TU : mengetahui</span><br />
                @endif
                @if ($item->verifikasi_pimpinan != null)
                <span class="badge badge-success">Pimpinan : {{$item->verifikasi_pimpinan}}</span><br />
                @endif


            </td>
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