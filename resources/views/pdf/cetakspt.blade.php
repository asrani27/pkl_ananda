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
    <h3 style="text-align: center"><u>SURAT PERINTAH TUGAS</u><br>
      NOMOR : {{$data->nomor}}
    </h3> 
    <br/>
    Yang bertanda tangan di bawah ini :<br/>

    <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$data->nama}}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{$data->nip}}</td>
        </tr>
        <tr>
            <td>Pangkat</td>
            <td>:</td>
            <td>{{$data->pangkat}}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{$data->jabatan}}</td>
        </tr>
        
    </table>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>Nomor</td>
            <td>Nama</td>
            <td>Jabatan</td>
        </tr>

        @foreach ($data->petugas as $key2=> $item2)
            <tr>
                <td>{{$key2 + 1}}</td>
                <td>{{$item2->pegawai->nama}}</td>
                <td>{{$item2->pegawai->jabatan->nama_jabatan}}</td>
            </tr>
        @endforeach
    </table>
    Maksud surat perintah tugas :
    <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td>1. Keperluan</td>
            <td>: {{$data->nama}}</td>
        </tr>
        <tr>
            <td>2. Tempat Tujuan</td>
            <td>: {{$data->tujuan}}</td>
        </tr>
        <tr>
            <td>3. Berlaku mulai tanggal</td>
            <td>: {{$data->berlaku}}</td>
        </tr>
        <tr>
            <td>4. Alat angkut</td>
            <td>: {{$data->transport}}</td>
        </tr>
        <tr>
            <td>5. pembebanan biaya SPT</td>
            <td>: {{$data->pembebanan_biaya}}</td>
        </tr>
        
    </table>
    Demikian surat perintah tugas ini dibuat untuk dilaksanakan sebagaimana mestinya.
    <table width="100%">
        <tr>
            <td width="50%"></td>
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