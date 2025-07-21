@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Data Surat Masuk</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="full graph_head">
      <div class="heading1 margin_0">

         <a href="/admin/data/suratmasuk/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i>
            Tambah Data</a>
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
                  <th>Sifat</th>
                  <th>Lampiran</th>
                  <th style="text-align: center">Perihal</th>
                  <th style="text-align: center">Posisi Surat</th>
                  <th>Verifikasi</th>
                  <th>Tindak Lanjut</th>
                  <th>Status</th>
                  <th>Aksi</th>

               </tr>
            </thead>
            <tbody>

               @foreach ($data as $key => $item)
               <tr>
                  <td>{{1 + $key}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tgl_masuk)->format('d-m-Y')}}</td>
                  <td>{{$item->no_surat}}</td>
                  <td>{{$item->pengirim}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tgl_surat)->format('d-m-Y')}}</td>
                  <td>{{$item->sifat}}</td>
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
                  <td>{{$item->tindak_lanjut}}
                     @if ($item->tindak_lanjut != null)
                     <a href="/admin/data/suratmasuk/printdisposisi/{{$item->id}}" class="btn btn-xs btn-warning"><i
                           class="fa fa-print"></i> print disposisi</a>
                     @endif
                  </td>
                  <td>
                     @if ($item->disposisi_kepalatu == null)
                     <span class="badge badge-info">Baru</span>
                     @endif
                     @if ($item->disposisi_kepalatu != null && $item->verifikasi_surat == null)
                     <span class="badge badge-info">Di proses</span>
                     @endif
                     @if ($item->verifikasi_surat != null)
                     <span class="badge badge-info">Selesai</span>
                     @endif
                  </td>
                  <td>
                     <div style="display: flex; text-align:center">

                        <a href="/storage/uploads/{{$item->file}}" class="btn btn-flat btn-sm btn-primary"><i
                              class="fa fa-file-pdf-o"></i> </a><br />
                        <a href="/admin/data/suratmasuk/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-success"><i
                              class="fa fa-edit"></i> </a> <br />
                        <a href="/admin/data/suratmasuk/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
                           onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> </a> <br />

                     </div>
                     <br />
                     @if ($item->disposisi_kepalatu == null)
                     <a href="/admin/data/suratmasuk/disposisi/{{$item->id}}" class="btn btn-flat btn-sm btn-warning"
                        onclick="return confirm('Yakin ingin di disposisi')"><i class="fa fa-send"></i> Disposisi ke KTU
                     </a>
                     @endif
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