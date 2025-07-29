<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Surat Keluar</title>
    <style>
        .p {
            margin: 0 !important;
        }

        .konten-summernote table {
            width: 100%;
            border-collapse: collapse;
        }

        .konten-summernote table,
        .konten-summernote th,
        .konten-summernote td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>

    <table id="" width="100%">
        <tr>
            <td width="15%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('background/logo.png'))) }}"
                    width="80px"> &nbsp;&nbsp;
            </td>
            <td style="text-align: center;" width="70%">
                <strong>PEMERINTAH PROVINSI KALIMANTAN SELATAN</strong><br />
                <strong>BADAN PENDAPATAN DAERAH</strong><br />
                <strong>UNIT PELAYANAN PENDAPATAN DAERAH BANJARMASIN I</strong>
                <br/>
                Jl. Jendral A.Yani Km. 6 Telp/Fax (0511) 3257025KODE POS. 70249
                <br />
                <strong>BANJARMASIN</strong>
            </td>
            <td width="15%"></td>

        </tr>
    </table>
    <hr>
    <div style="text-align: right;"> Banjarmasin, {{ \Carbon\Carbon::parse($data->tgl_surat)->format('d F Y') }}

</div>

    </div>
    <br />
    
    <table width="65%" border="0" cellpadding="3" cellspacing="0">
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <td>{{$data->no_surat}}</td>
        </tr>
        <tr>
            <td>Sifat</td>
            <td>:</td>
            <td>{{$data->sifat}}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>{{$data->lampiran}}</td>
        </tr>
        <tr>
            <td style="vertical-align: top">Hal</td>
            <td style="vertical-align: top">:</td>
            <td>{{$data->perihal}}</td>
        </tr>
    </br>
        <tr>
            <td style="vertical-align: top">Yth</td>
            <td style="vertical-align: top">:</td>
            <td>{{$data->tujuan}}</td>
        </tr>
    </table>
    </br>

    <div class="konten-summernote">
        {!!$data->isi!!}
    </div>

    <table width="100%">
        <tr>
            <td style="text-align: center;" width="40%">
            <td></td>
            <td style="text-align: center;">
                <strong><br />KEPALA UPPD BANJARMASIN I</strong><br />
                <br /><br /><br /><br /><br />
            
                <u><strong> MIRZA LUFFILLAH, SE.,M.M</strong></u><br />
                <Canter>Pembina<br/>
                NIP. 19811204 200904 1 001
            </td>
        </tr>
    </table>
</body>

</html>