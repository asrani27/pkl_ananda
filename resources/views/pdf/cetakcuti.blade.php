<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="en-us" http-equiv="Content-Language" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Lembar Cuti</title>
    <style type="text/css">
        .auto-style1 {
            border-style: solid;
            border-width: 1px;
        }

        .auto-style2 {
            font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
            font-size: small;
        }

        .auto-style3 {
            margin-left: 298px;
        }

        .auto-style4 {
            text-align: center;
        }

        .auto-style5 {
            border: 1px solid #000000;
            margin-left: 21px;
        }

        .auto-style11 {
            border: 0px solid #000000;
            margin-left: 21px;
        }

        .auto-style6 {
            text-align: left;
            border-style: solid;
            border-width: 1px;
        }

        .auto-style7 {
            border-style: solid;
            border-width: 1px;
            font-size: x-small;
        }

        .auto-style8 {
            text-align: left;
            border-style: solid;
            border-width: 1px;
            font-size: x-small;
        }

        .auto-style9 {
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="auto-style1">
        <div class="auto-style4">
            <span class="auto-style2"></span><br class="auto-style2" />
        </div>
       

        <div class="auto-style9">
            <div class="auto-style4">
                <br class="auto-style2" />
                <span class="auto-style2"><strong>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</strong><br />
            </div>
            <br/>
            <table cellpadding="2" cellspacing="0" class="auto-style5" style="width: 47%">
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" colspan="4"><strong>I. DATA PEGAWAI</strong></td>
                </tr>
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 85px">Nama</td>
                    <td class="auto-style1" style="width: 282px">{{$data->user->pegawai->nama}}</td>
                    <td class="auto-style6" style="width: 101px">NIP</td>
                    <td class="auto-style1" style="width: 180px">{{$data->user->pegawai->nip}}</td>
                </tr>
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 85px">Jabatan</td>
                    <td class="auto-style1" style="width: 282px">
                        {{$data->user->pegawai->jabatan->nama_jabatan}}
                    </td>
                    <td class="auto-style6" style="width: 101px">Gol</td>
                    <td class="auto-style1" style="width: 180px">{{$data->user->pegawai->nama_golongan}}</td>
                </tr>
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 85px">Unit Kerja</td>
                    <td class="auto-style1" style="width: 282px">{{$data->user->pegawai->bagian->nama_bagian}}</td>
                    <td class="auto-style1" style="width: 101px">&nbsp;</td>
                    <td class="auto-style1" style="width: 180px">&nbsp;</td>
                </tr>
            </table>
            <br />
            <table cellpadding="2" cellspacing="0" class="auto-style5" style="width: 47%">
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" colspan="4"><strong>II. JENIS CUTI YANG DIAMBIL (Pilih salah satu)**</strong></td>
                </tr>
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 148px">1. Cuti Tahunan</td>
                    <td class="auto-style1" style="width: 182px;text-align:center;">{{$data->jenis_cuti_id == 1 ? '*':''}}</td>
                    <td class="auto-style6" style="width: 163px">2. Cuti Besar</td>
                    <td class="auto-style1" style="width: 155px;text-align:center;">{{$data->jenis_cuti_id == 2 ? 'V':''}}</td>
                </tr>
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 148px">3. Cuti Sakit</td>
                    <td class="auto-style1" style="width: 182px;text-align:center;">{{$data->jenis_cuti_id == 3 ? 'V':''}}</td>
                    <td class="auto-style6" style="width: 163px">4. Cuti Melahirkan</td>
                    <td class="auto-style1" style="width: 155px;text-align:center;">{{$data->jenis_cuti_id == 4 ? 'V':''}}</td>
                </tr>
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 148px">5. Cuti Karena Alasan Penting</td>
                    <td class="auto-style1" style="width: 182px;text-align:center;">{{$data->jenis_cuti_id == 5 ? 'V':''}}</td>
                    <td class="auto-style6" style="width: 163px">6. Cuti Diluar Tanggungan Negara</td>
                    <td class="auto-style1" style="width: 155px;text-align:center;">{{$data->jenis_cuti_id == 6 ? 'V':''}}</td>
                </tr>
            </table>

            <br />

            <table cellpadding="2" cellspacing="0" class="auto-style5" style="width: 47%">
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6"><strong>III. ALASAN CUTI :</strong></td>
                </tr>
                <tr>
                    <td class="auto-style6" style="width: 665px">{{$data->alasan}}</td>
                </tr>
            </table>

            <br />

            
            <table cellpadding="2" cellspacing="0" class="auto-style5" style="width: 47%">
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" colspan="4"><strong>IV. LAMANYA CUTI :</strong></td>
                </tr>
                @php
                    $mulai = \Carbon\Carbon::parse($data->tgl_mulai);
                    $selesai = \Carbon\Carbon::parse($data->tgl_selesai);
                    $lamaCuti = $mulai->diffInDays($selesai) + 1;
                @endphp
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 148px; text-align: center;">Selama&nbsp;</td>
                    <td class="auto-style1" style="width: 182px; text-align: center;">(hari/bulan/tahun)</td>
                    <td class="auto-style6" style="width: 163px; text-align: center;">Mulai tanggal</td>
                    <td class="auto-style1" style="width: 155px; text-align: center;">Sampai Dengan</td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 148px; text-align: center;">{{ $lamaCuti }}</td>
                    <td class="auto-style1" style="width: 182px; text-align: center;">Hari</td>
                    <td class="auto-style6" style="width: 163px; text-align: center;">{{ \Carbon\Carbon::parse($data->tgl_mulai)->format('d/m/Y') }}</td>
                    <td class="auto-style1" style="width: 155px; text-align: center;">{{ \Carbon\Carbon::parse($data->tgl_selesai)->format('d/m/Y') }}</td>
                </tr>
            </table>


            <br />
            <table cellpadding="2" cellspacing="0" class="auto-style5" style="width: 47%">
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" colspan="5"><strong>V. CATATAN CUTI (di isi oleh pejabat Kepegawaian) *** </strong></td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" colspan="3">6. SISA CUTI TH 2024 & TH 2025</td>
                    <td class="auto-style6" style="width: 338px">1. CUTI BESAR</td>
                    <td class="auto-style1" style="width: 110px">&nbsp;</td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 56px">Tahun</td>
                    <td class="auto-style1" style="width: 73px; text-align: center;">Sisa</td>
                    <td class="auto-style1" style="width: 26px">Keterangan</td>
                    <td class="auto-style6" style="width: 338px">2. CUTI SAKIT</td>
                    <td class="auto-style1" style="width: 110px">&nbsp;</td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 56px">N-2</td>
                    <td class="auto-style1" style="width: 73px">&nbsp;</td>
                    <td class="auto-style1" style="width: 26px">&nbsp;</td>
                    <td class="auto-style6" style="width: 338px">3. CUTI MELAHIRKAN</td>
                    <td class="auto-style1" style="width: 110px">&nbsp;</td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 56px">N-1</td>
                    <td class="auto-style1" style="width: 73px"></td>
                    <td class="auto-style1" style="width: 26px">&nbsp;</td>
                    <td class="auto-style6" style="width: 338px">4. CUTI KARENA
                        ALASAN PENTING</td>
                    <td class="auto-style1" style="width: 110px">&nbsp;</td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="width: 56px">N</td>
                    <td class="auto-style1" style="width: 73px"></td>
                    <td class="auto-style1" style="width: 26px">&nbsp;</td>
                    <td class="auto-style6" style="width: 338px">5. CUTI DI LUAR
                        TANGGUNGAN NEGARA</td>
                    <td class="auto-style1" style="width: 110px">&nbsp;</td>
                </tr>
            </table>

            <br />

            <table cellpadding="2" cellspacing="0" class="auto-style5" style="width: 47%">
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" colspan="3"><strong> VI. ALAMAT SELAMA MENJALANKAN CUTI</strong></td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" rowspan="2" style="width: 335px"> {{$data->user->pegawai->alamat}}</td>
                    <td class="auto-style6" style="width: 163px">No. Telp</td>
                    <td class="auto-style1" style="width: 155px">{{$data->user->pegawai->telpon}}</td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" style="height: 46px;" colspan="2">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Hormat Saya,<br /><br /><br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        {{$data->user->pegawai->nama}}<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        NIP. {{$data->user->pegawai->nik}}
                    </td>
                </tr>
            </table>

            <br />

            <table cellpadding="2" cellspacing="0" class="auto-style5" style="width: 47%">
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style6" colspan="4"><strong>VII. PERTIMBANGAN ATASAN LANGSUNG : </strong></td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style8" style="width: 148px; text-align:center">DISETUJUI&nbsp;</td>
                    <td class="auto-style7" style="width: 182px; text-align:center">PERUBAHAN</td>
                    <td class="auto-style8" style="width: 163px; text-align:center">DITANGGUHKAN</td>
                    <td class="auto-style7" style="width: 155px; text-align:center">TIDAK DISETUJUI</td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style8" style="width: 148px; text-align:center">{{$data->verifikasi_kepala == '1' ? 'Mengetahui':''}}</td>
                    <td class="auto-style7" style="width: 182px">&nbsp;</td>
                    <td class="auto-style8" style="width: 163px">&nbsp;</td>
                    <td class="auto-style7" style="width: 155px; text-align:center">{{$data->verifikasi_kepala == '2' ? '*':''}}</td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style8" style="width: 148px; text-align:center"></td>
                    <td class="auto-style7" style="width: 182px">&nbsp;</td>
                    <td class="auto-style8" style="width: 163px">&nbsp;</td>
                    <td class="auto-style7" style="width: 155px" align="center">
                        <br /><br />
                        {{\App\Models\Pegawai::where('nik',$data->kepala)->first()->nama}}<br />NIP.{{$data->kepala}}
                    </td>
                </tr>
            </table>

            <br />

            <table cellpadding="2" cellspacing="0" class="auto-style5" style="width: 47%">
                <tr>
                    <td class="auto-style6" colspan="4"
                        style="font-size:12px; font-family:Arial, Helvetica, sans-serif"><strong>VIII. KEPUTUSAN PEJABATAN YANG BERWENANG MEMBERIKAN CUTI :</stron/></td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td class="auto-style8" style="width: 148px; text-align:center">DISETUJUI&nbsp;</td>
                    <td class="auto-style7" style="width: 182px; text-align:center">PERUBAHAN</td>
                    <td class="auto-style8" style="width: 163px; text-align:center">DITANGGUHKAN</td>
                    <td class="auto-style7" style="width: 155px; text-align:center">TIDAK DISETUJUI</td>
                </tr>
                <tr class="auto-style2">
                    <td class="auto-style8" style="width: 148px; text-align:center">{{$data->verifikasi_pimpinan ==
                        "disetujui" ? '*':''}}</td>
                    <td class="auto-style7" style="width: 182px">&nbsp;</td>
                    <td class="auto-style8" style="width: 163px">&nbsp;</td>
                    <td class="auto-style7" style="width: 155px; text-align:center">{{$data->verifikasi_pimpinan ==
                        "ditolak" ? '*':''}}</td>
                </tr>
            </table>

            <table cellpadding="2" border=0 cellspacing="0" style="width: 47%">
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td style="width: 148px"></td>
                    <td style="width: 182px"></td>
                    <td style="width: 163px"></td>
                    <td style="width: 155px"></td>
                </tr>
                <tr class="auto-style2" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <td style="width: 108px">&nbsp;</td>
                    <td style="width: 182px">&nbsp;</td>
                    <td style="width: 163px">&nbsp;</td>
                    <td style="width: 195px" align="center">Kepala UPPD BANJARMASIN I
                        <br /><br/>

                        <br /> <br />
                        <br />
                        {{\App\Models\Pegawai::where('nik',$data->pimpinan)->first()->nama}}<br />
                        NIP.{{$data->pimpinan}}
                    </td>
                </tr>
            </table>

        </div>
    </div>

</body>

</html>