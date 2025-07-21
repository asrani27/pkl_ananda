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
<form method="get" action="/admin/data/laporan/jenis">
   @csrf
   <div class="white_shd full margin_bottom_30">
      <div class="full graph_head">
         <div class="heading1 margin_0">
            Laporan Semua Data:

            <div style="display: flex; gap: 10px; align-items: center;">
               <select id="jenis-select" name="jenis" class="form-control" required>
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
                  <option value="11">Laporan Pengajuan Perubahan Data</option>
                  <option value="12">Laporan Riwayat Golongan/Pangkat</option>
                  <option value="13">Laporan Riwayat Jabatan</option>
                  <option value="14">Laporan Pengajuan Cuti</option>
                  <option value="15">Laporan Klasifikasi Dokumen</option>
                  <option value="16">Laporan Dokumen Kadaluarsa</option>
                  {{-- <option value="16">Laporan Klasifikasi Dokumen</option> --}}
                  {{-- <option value="16">Laporan Backup Dokumen</option> --}}
               </select>
               <button type="submit" id="print-semua" class="btn btn-flat btn-sm btn-primary" name="button"
                  value="semua" target="_blank"><i class="fa fa-print"></i>
                  Print</button>
            </div>

         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">

         <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
               <div class="heading1 margin_0">
                  Laporan per Periode : <br />
                  {{-- <form method="get" action="/admin/data/laporan/periode">
                     @csrf --}}

                     <div style="display: flex; gap: 10px; align-items: center;">
                        MULAI <input type="date" name="mulai" class="form-control"
                           value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                        S/D<input type="date" name="sampai" class="form-control"
                           value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                        <br />
                        <button type="submit" id="print-periode" class="btn btn-flat btn-sm btn-primary" name="button"
                           value="periode" target="_blank"><i class="fa fa-print"></i>
                           Print</button>
                     </div>

               </div>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
               <div class="heading1 margin_0">
                  Laporan per Bulan Tahun :<br />
                  {{-- <form method="get" action="/admin/data/laporan/bulan">
                     @csrf --}}
                     <div style="display: flex; gap: 10px; align-items: center;">
                        BULAN
                        <select name="bulan" class="form-control">
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
                        TAHUN
                        <select name="tahun" class="form-control">
                           <option value="">-pilih-</option>
                           <option value="2025">2025</option>
                           <option value="2026">2026</option>
                        </select>
                        <br />
                        <button type="submit" id="print-bulan" class="btn btn-flat btn-sm btn-primary" name="button"
                           value="perbulan" target="_blank"><i class="fa fa-print"></i>
                           Print</button>
                     </div>

               </div>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
               <div class="heading1 margin_0">
                  Laporan per Tahun :<br />
                  {{-- <form method="get" action="/admin/data/laporan/bulan">
                     @csrf --}}
                     <div style="display: flex; gap: 10px; align-items: center;">

                        TAHUN
                        <select name="tahun2" class="form-control">
                           <option value="">-pilih-</option>
                           <option value="2025">2025</option>
                           <option value="2026">2026</option>
                        </select>
                        <br />
                        <button type="submit" id="print-tahun" class="btn btn-flat btn-sm btn-primary" name="button"
                           value="pertahun" target="_blank"><i class="fa fa-print"></i>
                           Print</button>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<div class="row">

   <div class="col-md-12">
      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               Laporan Riwayat Jabatan, Golongan Dan Pangkat Per Pegawai :<br />
               <form method="get" action="/admin/data/laporan/riwayat">
                  @csrf
                  <div style="display: flex; gap: 10px; align-items: center;">

                     Pegawai
                     <select name="pegawai" class="form-control">
                        <option value="">-pilih-</option>
                        @foreach (pegawai() as $item)
                        <option value="{{$item->nip}}">{{$item->nama}}</option>
                        @endforeach
                     </select>
                     <select name="jenis" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="jabatan">Jabatan</option>
                        <option value="pangkat">Golongan / Pangkat</option>
                     </select>
                     <br />
                     <button type="submit" id="print-tahun" class="btn btn-flat btn-sm btn-primary" target="_blank"><i
                           class="fa fa-print"></i>
                        Print</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('js')
<script>
   const select = document.getElementById('jenis-select');
   const buttonPeriode = document.getElementById('print-periode');
   const buttonBulan = document.getElementById('print-bulan');
   const buttonTahun = document.getElementById('print-tahun');
   const disableAllOptions = ['1','2', '3', '4', '5','15'];
   const disablePeriodeBulanOnly = ['16'];

   select.addEventListener('change', function () {
      if (disableAllOptions.includes(this.value)) {
         buttonPeriode.disabled = true;
         buttonBulan.disabled = true;
         buttonTahun.disabled = true;
      } else if (disablePeriodeBulanOnly.includes(this.value)) {
         buttonPeriode.disabled = true;
         buttonBulan.disabled = true;
         buttonTahun.disabled = false;
      } else {
         buttonPeriode.disabled = false;
         buttonBulan.disabled = false;
         buttonTahun.disabled = false;
      }
   });
</script>
@endpush