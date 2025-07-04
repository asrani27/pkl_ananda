@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Data Surat Perintah Tugas</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="full graph_head">
      <div class="heading1 margin_0">
         <a href="/admin/data/spt/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
            Data</a>
      </div>
   </div>
   <div class="table_section padding_infor_info">
      <div class="table-responsive-sm">
         <form method="get" action="/admin/data/spt/cari">
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
                  <th>Tanggal</th>
                  <th style="text-align: center">Nomor Surat</th>
                  <th style="text-align: center">Tujuan</th>
                  <th style="text-align: center">Keperluan</th>
                  <th>Yang Ditugaskan</th>
                  <th>Posisi Surat</th>
                  <th>Verifikasi</th>
                  <th>Tindak Lanjut</th>
                  <th>Status</th>
                  <th style="text-align: center">Aksi</th>
               </tr>
            </thead>
            <tbody>

               @foreach ($data as $key => $item)
               <tr>
                  <td>{{$data->firstItem() + $key}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}</td>
                  <td>{{$item->nomor}}</td>
                  <td>{{$item->tujuan}}</td>
                  <td>{{$item->keperluan}}</td>
                  <td>
                     @if ($item->petugas == null)
                     -
                     @else
                     <ul>
                        @foreach ($item->petugas as $key2 => $item2)
                        @if ($item2->pegawai == null)

                        @else

                        <li>{{$key2+1}}. {{$item2->pegawai->nama}} </li>
                        @endif
                        @endforeach
                     </ul>
                     @endif


                  </td>
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
                     <a href="/admin/data/suratmasuk/printdisposisi/{{$item->id}}" class="btn btn-xs btn-danger"><i
                           class="fa fa-print"></i> print disposisi</a>
                     @endif
                  </td>
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

                        <a href="/kepalatu/data/spt/cetak/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i
                              class="fa fa-print"></i> Lihat </a> <br />
                     </div>
                     <br />
                     @if ($item->disposisi_pimpinan == null)
                     <a href="/kepalatu/data/spt/disposisi/{{$item->id}}" class="btn btn-flat btn-sm btn-success"
                        onclick="return confirm('Yakin ingin di disposisi')"><i class="fa fa-send"></i> Disposisi ke KTU
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