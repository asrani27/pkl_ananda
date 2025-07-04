@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Laporan</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="full graph_head">
      <div class="heading1 margin_0">
         Laporan Semua Data:
         <form method="get" action="/admin/data/laporan/jenis">
            @csrf
            <select name="jenis" class="form-control" required>
               <option value="">-pilih-</option>
               <option value="1">Laporan Semua pegawai</option>
               <option value="2">Laporan pegawai PNS</option>
               <option value="3">Laporan pegawai TEKON</option>
               <option value="4">Status Upload Dokumen pegawai</option>
               <option value="5">Laporan Pengguna Sistem</option>
               <option value="6">Laporan Riwayat Disposisi Surat</option>
               <option value="7">Laporan Surat Masuk</option>
               <option value="8">Laporan Surat Keluar</option>
               <option value="9">Laporan Surat Perintah Tugas</option>
               <option value="10">Laporan Rekapitulasi Surat</option>
            </select><br />
            <button type="submit" class="btn btn-flat btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i>
               Print</button>
         </form>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-6">

      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               Laporan per Periode : <br />
               <form method="get" action="/admin/data/laporan/periode">
                  @csrf
                  Jenis Laporan
                  <select name="jenis" class="form-control" required>
                     <option value="">-pilih-</option>
                     <option value="7">Laporan Surat Masuk</option>
                     <option value="8">Laporan Surat Keluar</option>
                     <option value="9">Laporan Surat Perintah Tugas</option>
                  </select>
                  MULAI : <input type="date" name="mulai" class="form-control"
                     value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                  SAMPAI : <input type="date" name="sampai" class="form-control"
                     value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                  <br />
                  <button type="submit" class="btn btn-flat btn-sm btn-primary" target="_blank"><i
                        class="fa fa-print"></i>
                     Print</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               Laporan per Bulan Tahun :<br />
               jenis Laporan
               <form method="get" action="/admin/data/laporan/bulan">
                  @csrf
                  <select name="jenis" class="form-control" required>
                     <option value="">-pilih-</option>
                     <option value="7">Laporan Surat Masuk</option>
                     <option value="8">Laporan Surat Keluar</option>
                     <option value="9">Laporan Surat Perintah Tugas</option>
                     <option value="10">Laporan Rekapitulasi Surat</option>
                  </select>
                  BULAN :
                  <select name="bulan" class="form-control" required>
                     <option value="">-pilih-</option>
                     <option value="1">Januari</option>
                     <option value="2">Februari</option>
                     <option value="3">Maret</option>
                     <option value="4">April</option>
                     <option value="5">Mei</option>
                     <option value="6">Juni</option>
                     <option value="7">Juli</option>
                     <option value="8">Agustus</option>
                     <option value="9">September</option>
                     <option value="10">Oktober</option>
                     <option value="11">November</option>
                     <option value="12">Desember</option>
                  </select>
                  TAHUN :
                  <select name="tahun" class="form-control" required>
                     <option value="">-pilih-</option>
                     <option value="2025">2025</option>
                     <option value="2026">2026</option>
                  </select>
                  <br />
                  <button type="submit" class="btn btn-flat btn-sm btn-primary" target="_blank"><i
                        class="fa fa-print"></i>
                     Print</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('js')
@endpush