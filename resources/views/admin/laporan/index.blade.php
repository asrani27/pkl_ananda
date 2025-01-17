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
      <a href="/admin/data/laporan/pegawaipns" class="btn btn-flat btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i> Laporan Pegawai PNS</a>
      <a href="/admin/data/laporan/pegawaitekon" class="btn btn-flat btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i> Laporan Pegawai TEKON</a>
      <a href="/admin/data/laporan/belumupload" class="btn btn-flat btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i> Laporan Belum Upload</a>
     </div>
  </div>
</div>


 <div class="white_shd full margin_bottom_30">
   <div class="full graph_head">
      <div class="heading1 margin_0">
         <a href="/admin/data/laporan/suratmasuk" class="btn btn-flat btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i> Laporan Surat Masuk</a>
       <a href="/admin/data/laporan/suratkeluar" class="btn btn-flat btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i> Laporan Surat Keluar</a>
       <a href="/admin/data/laporan/spt" class="btn btn-flat btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i> Laporan Surat Perintah Tugas</a>
      </div>
   </div>
 </div>
  
@endsection
@push('js')

@endpush