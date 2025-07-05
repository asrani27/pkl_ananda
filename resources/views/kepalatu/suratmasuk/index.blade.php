@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>SURAT MASUK</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="full graph_head">
      <div class="heading1 margin_0">


      </div>
   </div>
   <div class="table_section padding_infor_info">
      <div class="table-responsive-sm">
         <form method="get" action="/kepalatu/data/suratmasuk/cari">
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
                  <th>Tanggal Masuk</th>
                  <th style="text-align: center">Nomor Surat</th>
                  <th style="text-align: center">Pengirim</th>
                  <th>Tanggal Surat</th>
                  <th>Lampiran</th>
                  <th style="text-align: center">Perihal</th>
                  <th>Posisi Surat</th>
                  <th>Status</th>
                  <th>Aksi</th>

               </tr>
            </thead>
            <tbody>

               @foreach ($data as $key => $item)
               <tr>
                  <td>{{$data->firstItem() + $key}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tgl_masuk)->format('d-m-Y')}}</td>
                  <td>{{$item->no_surat}}</td>
                  <td>{{$item->pengirim}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tgl_surat)->format('d-m-Y')}}</td>
                  <td>{{$item->lampiran}}</td>
                  <td>{{$item->perihal}}</td>
                  <td>
                     <ul>
                        <li><span class="badge badge-success"><i class="fa fa-check"></i> Admin</span></li>

                        @if ($item->disposisi_kepalatu != null)
                        <li><span class="badge badge-success"><i class="fa fa-check"></i> Kepala TU : {{$item->kepalatu
                              ==
                              null ? null : $item->kepalatu->name}}</span></li>
                        @endif
                        @if ($item->disposisi_pimpinan != null)
                        <li><span class="badge badge-success"><i class="fa fa-check"></i> Pimpinan : {{$item->pimpinan
                              ==
                              null ? null : $item->pimpinan->name}}</span></li>
                        @endif
                        @if ($item->verifikasi_surat != null)
                        <li><span class="badge badge-success"><i class="fa fa-check"></i> Admin</span></li>
                        @endif
                     </ul>
                     {{-- Kepala TU : {{$item->disposisi_kepalatu}}<br />
                     Pimpinan : {{$item->disposisi_pimpinan}} <br /> --}}

                  </td>
                  <td>
                     <div style="display: flex; text-align:center">

                        <a href="/storage/uploads/{{$item->file}}" class="btn btn-flat btn-sm btn-primary"><i
                              class="fa fa-file-pdf-o"></i> Surat </a><br />
                     </div>
                     <br />
                     @if ($item->disposisi_pimpinan == null)
                     <a href="/kepalatu/data/suratmasuk/disposisi/{{$item->id}}" class="btn btn-flat btn-sm btn-warning"
                        onclick="return confirm('Yakin ingin di disposisi')"><i class="fa fa-send"></i> Disposisi ke
                        Pimpinan
                     </a>
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