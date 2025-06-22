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
                UPPD BANJARMASIN I<BR />
                PROVINSI KALIMANTAN SELATAN<br />
                JALAN JEND. A.YANI Km. 6 KODE POS. 70249
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
            <th>Prodi</th>
            <th>Bagian</th>
            <th>Jabatan</th>
            <th>Tugas Pokok</th>
            {{-- <th>Status</th>
            <th>Golongan</th> --}}

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
            <td>{{$item->prodi}}</td>
            <td>{{$item->bagian == null ? '': $item->bagian->nama_bagian}}</td>
            <td>{{$item->jabatan->nama_jabatan}}</td>
            <td>{{$item->tugas_pokok}}</td>
            {{-- <td>{{$item->status}}</td>
            <td>{{$item->golongan}}</td> --}}
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