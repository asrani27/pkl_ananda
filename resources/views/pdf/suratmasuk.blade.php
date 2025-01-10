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
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('background/logo.png'))) }}" width="80px"> &nbsp;&nbsp;
            </td>
            <td style="text-align: center;" width="60%">
               UPPD BANJARMASIN I<BR/>
                    PROVINSI KALIMANTAN SELATAN<br/>
                JALAN JEND. A.YANI Km. 6 KODE POS. 70249
            </td>
            <td width="15%">
            </td>
            
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN SURAT MASUK <br>
      
    </h3> 
    <br/>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Tanggal Masuk</th>
            <th>Pengirim</th>
            <th>Tanggal Surat</th>
            <th>Nomor Surat</th>
            <th>Perihal</th>

        </tr>
        @php
            $no =1;
        @endphp
        
        @foreach ($data as $key => $item)
        <tr>
          <td>{{$key + 1}}</td>
          <td>{{\Carbon\Carbon::parse($item->tgl_masuk)->format('d-m-Y')}}</td>
            <td>{{$item->pengirim}}</td>
            <td>{{\Carbon\Carbon::parse($item->tgl_surat)->format('d-m-Y')}}</td>
            <td>{{$item->no_surat}}</td>
            <td>{{$item->perihal}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br/>Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br/>
            Admin<br/>
             <br/><br/><br/><br/>

            <u>Ananda Risna Pebrianti</u><br/>
            NPM 2110010521
            </td>
        </tr>
    </table>
</body>
</html>