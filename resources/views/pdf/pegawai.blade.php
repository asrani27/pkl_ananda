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
    <h3 style="text-align: center">LAPORAN SEMUA PEGAWAI <br>

    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>TTL</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>Agama</th>
            <th>Pendidikan</th>
            <th>Jabatan</th>
            <th>Golongan/Pangkat</th>
            <th>Status</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->nip}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jkel}}</td>
            <td>{{$item->ttl}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->telpon}}</td>
            <td>{{$item->agama}}</td>
            <td>{{$item->pendidikan->nama_pendidikan}}</td>
            <td>{{$item->jabatan->nama_jabatan}}</td>
            <td>{{$item->golongan == null ? null : $item->golongan->nama_golongan}}</td>
            <td>{{$item->status}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="13">TOTAL PEGAWAI : {{$data->count()}}</td>
        </tr>
        <tr>
            <td colspan="13">Jumlah Pegawai PNS : {{$data->where('status','PNS')->count()}} </br>
                        Jumlah Pegawai Tenaga Kontrak : {{$data->where('status','TEKON')->count()}}
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