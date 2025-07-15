@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Data Perubahan</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">


   <div class="table_section padding_infor_info">
      <div class="table-responsive-sm">

         <form method="get" action="/admin/data/perubahandata/cari">
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
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Tanggal</th>
                  <th style="text-align: center">NIP/Nama</th>
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
                  <td>{{$item->nip}} - {{$item->nama}}</td>
                  <td class="text-center">{{$item->jenis}}</td>
                  <td>{{$item->dari}}</td>
                  <td>{{$item->menjadi}}</td>
                  <td>
                     @if ($item->status == null)
                     <span class="badge badge-danger">DIPROSES</span>
                     @else
                     <span class="badge badge-success"><i class="fa fa-check"></i> DIVERIFIKASI</span>
                     @endif
                  </td>
                  <td>
                     @if ($item->status == null)
                     <a href="/admin/data/verifikasi/perubahandata/{{$item->id}}"
                        onclick="return confirm('Yakin ingin diverifikasi?');" class="btn btn-flat btn-sm btn-warning"><i
                           class="fa fa-edit"></i> Verifikasi</a>
                      @else
                        <span class="badge badge-info">Selesai</span>
                      @endif
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