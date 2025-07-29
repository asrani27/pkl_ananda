<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
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
    <h3 style="text-align: center">LEMBAR DISPOSISI<br>

    </h3>
    <table>
        <tr>
            <td>Perihal</td>
            <td>: {{$data->perihal}}</td>
        </tr>
        <tr>
            <td>Surat Dari</td>
            <td>: {{$data->pengirim}}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{\Carbon\Carbon::parse($data->tgl_surat)->format('d M Y')}}</td>
        </tr>
        <tr>
            <td>Nomor</td>
            <td>: {{$data->no_surat}}</td>
        </tr>
    </table>
    <br />
    <table width="100%" cellpadding="15" cellspacing="0" style="border:1px solid black">
        <tr>
            <td style="border:1px solid black" width="50%">Diterima sub bag. tata usaha
                <br /><br />
                Tanggal : {{\Carbon\Carbon::parse($data->updated_at)->format('d M Y')}}
            </td>
            <td style="border:1px solid black">
                Nomor Agenda :
                <br /><br /><br />
            </td>
        </tr>
        <tr>
            <td style="border:1px solid black" width="50%">Diajukan / diteruskan.
                <br /><br /> Kepala UPPD Banjarmasin 1
                <br/>
                Tanggal : {{\Carbon\Carbon::parse($data->tgl_verifikasi_pimpinan)->format('d M Y')}}
            </td>
            <td style="border:1px solid black">Isi Disposisi :
                <br /><br />{{$data->tindak_lanjut}}
            </td>
        </tr>
    </table>
    <br />

</body>

</html>