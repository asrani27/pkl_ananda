@extends('layouts.app') 
@push('css') 
     
@endpush 
@section('content') 
 
<div class="row column_title"> 
  <div class="col-md-12"> 
     <div class="page_title"> 
        <h2>Data Pegawai</h2> 
     </div> 
  </div> 
</div> 
<div class="white_shd full margin_bottom_30"> 
  <div class="full graph_head"> 
     <div class="heading1 margin_0"> 
        
      <a href="/admin/data/pegawai/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> 
     </div> 
  </div> 
  <div class="table_section padding_infor_info"> 
     <div class="table-responsive-sm"> 

      <form method="get" action="/admin/data/pegawai/cari">
         @csrf
         <div style="display: flex; margin-left: auto; gap: 8px; align-items: center;">
            <input type="text" class="form-control" name="cari" placeholder="Cari Data" style="max-width: 300px;">
            <button type="submit" class="btn btn-flat btn-sm btn-primary">
               <i class="fa fa-search"></i> Cari
            </button>
         </div>
      </form> <br/>
      
        <table class="table table-bordered"> 
           <thead> 
              <tr style="background-color: rgb(52, 52, 51); font-weight:bold;color:aliceblue"> 
                <th>No</th> 
                <th style="text-align: center">NIK</th> 
                <th style="text-align: center">Nama</th>  
                <th style="text-align: center">Jabatan</th> 
                <th style="text-align: center">Telpon</th>
                <th style="text-align: center">Alamat</th>
                <th style="text-align: center">Aksi</th> 
              </tr> 
           </thead> 
           <tbody> 
             
            @foreach ($data as $key => $item) 
            <tr> 
              <td>{{1 + $key}}</td> 
              <td>{{$item->nik}}</td> 
              <td>{{$item->nama}}</td> 
              <td>{{$item->jabatan == null ? null : $item->jabatan->nama_jabatan}}</td> 
              <td>{{$item->telpon}}</td> 
              <td>{{$item->alamat}}</td> 
              <td style="display: flex"> 
                <a href="/admin/data/pegawai/detail/{{$item->id}}" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-eye"></i></a> 
                <br/>
                <a href="/admin/data/pegawai/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-success"><i class="fa fa-edit"></i></a> 
                <br/>
                <a href="/admin/data/pegawai/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger" onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i></a> 
              </td> 
            </tr> 
            @endforeach 
           </tbody> 
        </table> 
     </div> 
  </div> 
</div> 
 
@endsection 
@push('js') 
 
@endpush