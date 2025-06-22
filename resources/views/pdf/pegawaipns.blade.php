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
    <h3 style="text-align: center">LAPORAN PEGAWAI PNS <br>

    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>Agama</th>
            <th>Jabatan</th>
            <th>Pendidikan</th>
            <th>Prodi</th>

        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jkel}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->telpon}}</td>
            <td>{{$item->agama}}</td>
            <td>{{$item->jabatan->nama_jabatan}}</td>
            <td>{{$item->pendidikan->nama_pendidikan}}</td>
            <td>{{$item->prodi}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%">
                PNS Penata Tk I (III/d) : <br />
                PNS Penata Muda (III/a) : <br />
                PNS Penata Muda Tk I (III/b) : <br />
                PNS Penata (III/c) : <br />
                PNS Penata Tk I (II/d) : <br />
                PNS Pengatur (II/c) : <br />
                PNS Pengatur Tk I (II/c) : <br />
                PNS Juru Tk I (I/d) : <br />
            </td>
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