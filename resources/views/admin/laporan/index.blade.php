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
      <a href="/admin/data/laporan/pegawai" class="btn btn-flat btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i> Laporan Pegawai</a>
     </div>
  </div>
  
</div>

@endsection
@push('js')

@endpush