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
    <h3 style="text-align: center">LAPORAN STATUS UPLOAD DOKUMEN PEGAWAI<br>
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Berkas Lamaran Kerja</th>
            <th>Berkas Perjanjian Kerja</th>
            <th>Berkas Sertifikat</th>
            <th>Berkas Ijazah</th>
            <th>Berkas KTP</th>
            <th>Berkas KK</th>
            <th>Belum Upload</th>
            <th>Sudah Upload</th>
            <th>Jumlah Dokumen</th>


        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->nama}}</td>
            @if ($item->user == null)
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">{{$item->belum}}</td>
            <td style="text-align: center">{{$item->sudah}}</td>
            <td style="text-align: center">6</td>
            @else
            @if ($item->user->upload == null)
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">{{$item->belum}}</td>
            <td style="text-align: center">{{$item->sudah}}</td>
            <td style="text-align: center">6</td>
            @else
            <td style="text-align: center">{{$item->user->upload->file_lamaran_kerja == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_perjanjian_kerja == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_sertifikat == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_ijazah == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_ktp == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_kk == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->belum}}</td>
            <td style="text-align: center">{{$item->sudah}}</td>
            <td style="text-align: center">6</td>
            @endif
            @endif
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
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