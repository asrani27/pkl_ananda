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
    <h3 style="text-align: center">LAPORAN DOKUMEN KADALUARSA<br>
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Jenis Dokumen</th>
            <th>Nomor Surat</th>
            <th>Perihal</th>
            <th>Tahun Aktif</th>
            <th>Tahun Inaktif</th>
            <th>Status</th>
            <th>Lokasi Penyimpanan</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)

        <tr>
            <td style="text-align: center;">{{$no++}}</td>
            <td style="text-align: center;">{{$item['jenis']}}</td>
            <td style="text-align: center;">{{$item['nomor_surat']}}</td>
            <td style="text-align: center;">{{$item['perihal']}}</td>
            <td style="text-align: center;">{{$item['tahun']}}</td>
            <td style="text-align: center;">{{\Carbon\Carbon::now()->year}}</td>
            <td style="text-align: center;">Kadaluarsa</td>
            <td style="text-align: center;">File PDF Di Admin</td>
        </tr>
        @endforeach

        <tr>
            <td colspan="8">
                <strong>Jumlah Surat Masuk Kadaluarsa : {{ $total_surat_masuk }}</strong><br />
                <strong>Jumlah Surat Keluar Kadaluarsa : {{ $total_surat_keluar }}</strong><br />
                <strong>Jumlah SPT Kadaluarsa: {{ $total_surat_spt }}</strong><br />
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