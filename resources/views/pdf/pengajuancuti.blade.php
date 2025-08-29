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
            <th>NIP/NIK-NAMA</th>
            <th style="text-align: center">Tanggal Mulai Cuti</th>
            <th style="text-align: center">Tanggal Selesai Cuti</th>
            <th style="text-align: center">Lama</th>
            <th style="text-align: center">Sisa</th>
            <th style="text-align: center">Alasan</th>
            <th style="text-align: center">Status</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        @php
        $mulai = \Carbon\Carbon::parse($item->tgl_mulai);
        $selesai = \Carbon\Carbon::parse($item->tgl_selesai);
        $lamaCuti = $mulai->diffInDays($selesai) + 1;
        @endphp
        <tr>
            <td>{{1 + $key}}</td>
            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}</td>
            <td>
                @if ($item->user->pegawai->status =='PNS')
                {{$item->user->pegawai->nip}} - {{$item->user->name}}
                @else
                {{$item->user->pegawai->nik}} - {{$item->user->name}}
                @endif
            </td>
            <td>{{\Carbon\Carbon::parse($item->tgl_mulai)->format('d-m-Y')}}</td>
            <td>{{\Carbon\Carbon::parse($item->tgl_selesai)->format('d-m-Y')}}</td>
            <td>{{$lamaCuti}} Hari </td>
            <td>{{$item->sisa_cuti}} Hari </td>
            <td>{{$item->alasan}}</td>
            <td>
                @if ($item->verifikasi_pimpinan != null)
                <span class="badge badge-success">{{ $item->verifikasi_pimpinan }}</span><br />
                @else
                <span class="badge badge-warning">Proses</span><br />
                @endif
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="9" style="font-weight: bold;">TOTAL PEGAWAI YANG MENGAJUKAN CUTI : {{$data->count()}}</td>
        </tr>
        <tr>
            <td colspan="9">
                Sudah di Setujui : {{$data->where('verifikasi_pimpinan')->count()}} <br />
                {{-- Masih Diproses : {{$data->where('status','proses')->count()}} --}}
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
            <br />
            <td><br />
                <center>
                    Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                    KEPALA UPPD BANJARMASIN I<br />
                    <br /><br /><br /><br />
                    <u>MIRZA LUFFILLAH, SE.,M.M</u><br />
                    Pembina<br />
                    NIP. 19811204 200904 1 001
                </center>
            </td>
        </tr>
    </table>
</body>

</html>