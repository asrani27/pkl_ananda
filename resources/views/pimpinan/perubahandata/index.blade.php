@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Perubahan Data</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="full graph_head">
      <div class="heading1 margin_0">

         <a href="/pimpinan/data/perubahandata/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i>
            Tambah
            Data</a>
      </div>
   </div>
   
   <div class="table_section padding_infor_info">
      <div class="table-responsive-sm">

         <table class="table table-bordered" id="myTable">
            <thead>
               <tr style="background-color: rgb(52, 52, 51); font-weight:bold;color:aliceblue">
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Tanggal</th>
                  <th style="text-align: center">Jenis Perubahan</th>
                  <th style="text-align: center">Dari</th>
                  <th style="text-align: center">Menjadi</th>
                  <th style="text-align: center">Status</th>
                  <th style="text-align: center">Aksi</th>
               </tr>
            </thead>
            <tbody>

               @foreach ($data as $key => $item)
               <tr>
                  <td>{{$data->firstItem() + $key}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                  <td>{{$item->jenis}}</td>
                  <td>{{$item->dari}}</td>
                  <td>{{$item->menjadi}}</td>
                  <td>
                     @if ($item->status == null)
                     <span class="badge badge-warning">DIPROSES</span>
                     @else
                     <span class="badge badge-success"><i class="fa fa-check"></i> DIVERIFIKASI</span>
                     @endif
                  </td>
                  <td>
                     <a href="/pimpinan/data/perubahandata/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-success"><i
                           class="fa fa-edit"></i> Edit</a>
                     <a href="/pimpinan/data/perubahandata/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
                        onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> Delete</a>
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