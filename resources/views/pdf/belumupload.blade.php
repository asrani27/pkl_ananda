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
        <h3 style="text-align: center">LAPORAN STATUS UPLOAD DOKUMEN PEGAWAI<br></h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Berkas KTP</th>
            <th>Berkas KK</th>
            <th>Berkas Ijazah</th>
            <th>Berkas Sertifikat</th>
            <th>Berkas SPK</th>
            <th>Sudah Upload</th>
            <th>Belum Upload</th>
            <th>Jumlah Dokumen</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->nama}}</td>
            @if ($item->user == null)
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">{{$item->total_sudah_upload}}</td>
            <td style="text-align: center">{{$item->total_belum_upload}}</td>
            <td style="text-align: center">6</td>
            @else
            @if ($item->user->upload == null)
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">belum</td>
            <td style="text-align: center">{{$item->total_sudah_upload}}</td>
            <td style="text-align: center">{{$item->total_belum_upload}}</td>
            <td style="text-align: center">6</td>
            @else
            <td style="text-align: center">{{$item->user->upload->file_foto == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_ktp == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_kk == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_ijazah == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_sertifikat == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->user->upload->file_perjanjian_kerja == null ? 'belum':'sudah'}}</td>
            <td style="text-align: center">{{$item->total_sudah_upload}}</td>
            <td style="text-align: center">{{$item->total_belum_upload}}</td>
            <td style="text-align: center">6</td>
            @endif
            @endif
        </tr>
        @endforeach
        <tr>
            <td colspan="11" style="font-weight: bold;">TOTAL SEMUA PEGAWAI : {{$data->count()}}</td>
        </tr>
        <tr>
            <td colspan="11">
                SUDAH LENGKAP : {{$data->where('dokumen_status','dokumen lengkap')->count()}} <br />
                BELUM LENGKAP : {{$data->where('dokumen_status','dokumen belum lengkap')->count()}}
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