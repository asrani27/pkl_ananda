@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Data Pengajuan Cuti</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="full graph_head">
      <div class="heading1 margin_0">

         <a href="/pegawai/data/pengajuancuti/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i>
            Tambah Data</a>
      </div>
   </div>
   <div class="table_section padding_infor_info">
      <div class="table-responsive-sm">
         <form method="get" action="/pegawai/data/pengajuancuti/cari">
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
                  <th style="text-align: center">Tanggal Mulai Cuti</th>
                  <th style="text-align: center">Tanggal Selesai Cuti</th>
                  <th style="text-align: center">Lama</th>
                  <th style="text-align: center">Alasan</th>
                  <th style="text-align: center">Status</th>
                  <th>Aksi</th>
               </tr>
            </thead>

            <tbody>
               @foreach ($data as $key => $item)
               @php
               $mulai = \Carbon\Carbon::parse($item->tgl_mulai);
               $selesai = \Carbon\Carbon::parse($item->tgl_selesai);

               $lamaCuti = $mulai->diffInDays($selesai) + 1;
               @endphp
               <tr>
                  <td>{{1 + $key}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tgl_mulai)->format('d-m-Y')}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tgl_selesai)->format('d-m-Y')}}</td>
                  <td>{{$lamaCuti}}</td>
                  <td>{{$item->alasan}}</td>
                  <td>
                     <span class="badge badge-success">Dikirim</span><br />
                     @if ($item->verifikasi_kepala != null)
                     <span class="badge badge-success">Kepala TU : mengetahui</span><br />
                     @endif
                     @if ($item->verifikasi_pimpinan != null)
                     <span class="badge badge-success">Pimpinan : {{$item->status}}</span><br />
                     @endif


                  </td>
                  <td style="display: flex">
                     <a href="/pegawai/data/pengajuancuti/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-success"><i
                           class="fa fa-edit"></i> </a>
                     <a href="/pegawai/data/pengajuancuti/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
                        onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> </a>
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