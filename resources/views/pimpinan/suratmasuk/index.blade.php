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

         <table class="table table-bordered" id="myTable">
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
                  <th>Verifikasi</th>
                  <th>Tindak Lanjut</th>
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
                  </td>
                  <td>{{$item->verifikasi_surat}}</td>
                  <td>{{$item->tindak_lanjut}}</td>
                  <td>
                     @if ($item->disposisi_kepalatu == null)
                     <span class="badge badge-primary">Baru</span>
                     @endif
                     @if ($item->disposisi_kepalatu != null && $item->verifikasi_surat == null)
                     <span class="badge badge-primary">Di proses</span>
                     @endif
                     @if ($item->verifikasi_surat != null)
                     <span class="badge badge-primary">Selesai</span>
                     @endif
                  </td>
                  <td>
                     <div style="display: flex; text-align:center">
                        <a href="/storage/uploads/{{$item->file}}" class="btn btn-flat btn-sm btn-danger"><i
                              class="fa fa-file-pdf-o"></i> Surat</a><br />
                     </div>
                     <br/>
                     <a href="/pimpinan/data/suratmasuk/verifikasi/{{$item->id}}"
                        class="btn btn-flat btn-sm btn-warning"><i class="fa fa-edit"></i> Verifikasi
                     </a>
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