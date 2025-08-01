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
    <h3 style="text-align: center">LAPORAN PERUBAHAN DATA<br>
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th style="text-align: center">No</th>
            <th style="text-align: center">Tanggal</th>
            <th style="text-align: center">Nama</th>
            <th style="text-align: center">Jenis Perubahan</th>
            <th style="text-align: center">Dari</th>
            <th style="text-align: center">Menjadi</th>
            <th style="text-align: center">status</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{1 + $key}}</td>
            <td>{{\Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jenis}}</td>
            <td>{{$item->dari}}</td>
            <td>{{$item->menjadi}}</td>
            <td>
                @if ($item->status == null)
                <span class="badge badge-warning">DIPROSES</span>
                @else
                <span class="badge badge-success"><i class="fa fa-check"></i> DIVERIFIKASI</span>
                @endif
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="7" style="font-weight: bold;">TOTAL PEGAWAI YANG MENGAJUKAN : {{$data->count()}}</td>
        </tr>
        {{-- <tr>
            <td colspan="7">
                Sudah di Setujui : {{$data->where('verifikasi_pimpinan')->count()}} <br />
                Masih Diproses : {{$data->where('status','proses')->count()}}
            </td>
        </tr> --}}
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