@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Data Surat Keluar</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="full graph_head">
      <div class="heading1 margin_0">

         <a href="/admin/data/suratkeluar/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i>
            Tambah Data</a>
      </div>
   </div>
   <div class="table_section padding_infor_info">
      <div class="table-responsive-sm">
         <form method="get" action="/admin/data/suratkeluar/cari">
            @csrf
            <div style="display: flex; margin-left: auto; gap: 8px; align-items: center;">
               <input type="text" class="form-control" name="cari" placeholder="Cari Data" style="max-width: 300px;">
               <button type="submit" class="btn btn-flat btn-sm btn-primary">
                  <i class="fa fa-search"></i> Cari
               </button>
            </div>
         </form> <br />
         <table class="table table-bordered">
            <thead>
               <tr style="background-color: rgb(52, 52, 51); font-weight:bold;color:aliceblue">
                  <th>No</th>
                  <th>Tanggal Surat</th>
                  <th style="text-align: center">Nomor Surat</th>
                  <th style="text-align: center">Tujuan</th>
                  <th style="text-align: center">Sifat</th>
                  <th style="text-align: center">Perihal</th>
                  <th>Lampiran</th>
                  <th>Aksi</th>
               </tr>
            </thead>

            <tbody>
               @foreach ($data as $key => $item)
               <tr>
                  <td>{{$data->firstItem() + $key}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tgl_surat)->format('d-m-Y')}}</td>
                  <td>{{$item->no_surat}}</td>
                  <td>{{$item->tujuan}}</td>
                  <td>{{$item->sifat}}</td>
                  <td>{{$item->perihal}}</td>
                  <td>{{$item->lampiran}}</td>
                  <td style="display: flex">
                     <a href="/storage/uploads/{{$item->file}}" class="btn btn-flat btn-sm btn-primary"><i
                           class="fa fa-file-pdf-o"></i> </a><br />
                     <a href="/admin/data/suratkeluar/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-success"><i
                           class="fa fa-edit"></i> </a>
                     <a href="/admin/data/suratkeluar/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
                        onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> </a>
                     <a href="/admin/data/suratkeluar/cetak/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i
                           class="fa fa-print"></i> </a> <br />
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
      {{$data->links()}}
   </div>
</div>

@endsection
@push('js')
@endpush