@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Data Pengajuan Cuti Pegawai</h2>
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
                  <th style="text-align: center">Tanggal Surat</th>
                  <th style="text-align: center">NIK - Nama</th>
                  <th style="text-align: center">Tanggal Mulai Cuti</th>
                  <th style="text-align: center">Tanggal Selesai Cuti</th>
                  <th style="text-align: center">Lama</th>
                  <th style="text-align: center">Alasan</th>
                  <th style="text-align: center">Status</th>
                  <th style="text-align: center">Aksi</th>

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
                  <td>{{$item->user->pegawai->nik}} - {{$item->user->name}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tgl_mulai)->format('d-m-Y')}}</td>
                  <td>{{\Carbon\Carbon::parse($item->tgl_selesai)->format('d-m-Y')}}</td>
                  <td>{{$lamaCuti}}</td>
                  <td>{{$item->alasan}}</td>
                  <td>
                     <span class="badge badge-info">Dikirim</span><br />
                     @if ($item->verifikasi_kepala != null)
                     <span class="badge badge-info">Kepala TU : mengetahui</span><br />
                     @endif
                     @if ($item->verifikasi_pimpinan != null)
                     @if ($item->verifikasi_pimpinan == 'disetujui')
                     <span class="badge badge-info">Pimpinan :
                        {{$item->verifikasi_pimpinan}}</span><br />
                     @else
                     <span class="badge badge-danger">Pimpinan :
                        {{$item->verifikasi_pimpinan}}</span><br />
                     @endif

                     @endif


                  </td>
                  <td>
                     <a href="/admin/data/cuti/cetak/{{$item->id}}" class="btn btn-sm btn-danger" target="_blank"><i
                           class="fa fa-file"></i> Cetak Cuti</a>
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