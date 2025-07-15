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
    <h3 style="text-align: center">LAPORAN RIWAYAT {{strtoupper($jenis)}} <br>

    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th style="text-align: center">No</th>
            <th style="text-align: center">Tanggal</th>
            <th style="text-align: center">NIP/Nama</th>
            <th style="text-align: center">Jenis Perubahan</th>
            <th style="text-align: center">Dari</th>
            <th style="text-align: center">Menjadi</th>
            <th style="text-align: center">Status</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
            <td>{{$item->nip}} - {{$item->nama}}</td>
            <td class="text-center">{{$item->jenis}}</td>
            <td>{{$item->dari}}</td>
            <td>{{$item->menjadi}}</td>
            <td>
                @if ($item->status == null)
                <span class="badge badge-danger">DIPROSES</span>
                @else
                <span class="badge badge-success"><i class="fa fa-check"></i> DIVERIFIKASI</span>
                @endif
            </td>
            <td>
                @if ($item->status == null)
                <a href="/admin/data/verifikasi/perubahandata/{{$item->id}}"
                    onclick="return confirm('Yakin ingin diverifikasi?');" class="btn btn-flat btn-sm btn-warning"><i
                        class="fa fa-edit"></i> Verifikasi</a>
                @else
                <span class="badge badge-warning">Selesai</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

</body>

</html>