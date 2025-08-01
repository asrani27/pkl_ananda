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
    <h3 style="text-align: center">LAPORAN SURAT PERINTAH TUGAS <br>

    </h3>
    <br />
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
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Tanggal Surat</th>
            <th>Nomor</th>
            <th>Tanggal Bertugas</th>
            <th>Keperluan</th>
            <th>Tujuan</th>
            <th>Yang Ditugaskan</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{\Carbon\Carbon::parse($item->tanggal)->translatedFormat('d-F-Y')}}</td>
            <td>{{$item->nomor}}</td>
            <td>{{\Carbon\Carbon::parse($item->berlaku)->translatedFormat('d-F-Y')}}</td>
            <td>{{$item->keperluan}}</td>
            <td>{{$item->tujuan}}</td>
            <td>{!!$item->yang_ditugaskan!!}

            </td>
                {{-- @if ($item->petugas == null)
                -
                @else
                <ul>
                    @foreach ($item->petugas as $key2 => $item2)
                    <li>{{$key2+1}}. {{$item2->pegawai == null ? '':$item2->pegawai->nama}}</li>
                    @endforeach
                </ul>
                @endif
            </td> --}}
        </tr>
        @endforeach
        <tr>
            <td colspan="7" style="font-weight: bold;">TOTAL SURAT PERINTAH TUGAS : {{$data->count()}}</td>
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