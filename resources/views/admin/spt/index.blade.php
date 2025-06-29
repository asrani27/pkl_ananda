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

                        <li>{{$key2+1}}. {{$item2->pegawai->nama}} <a
                              href="/admin/data/sptpetugas/delete/{{$item2->id}}" class="text-danger"><i
                                 class="fa fa-times"></i></a> </li>
                        @endif
                        @endforeach
                     </ul>
                     @endif

                     <form method="post" action="/admin/data/spt/simpanpegawai/{{$item->id}}">
                        @csrf

                        <select class="form-control" name="pegawai_id">
                           <option value="">-tambah petugas-</option>
                           @foreach ($pegawai as $peg)
                           <option value="{{$peg->id}}">{{$peg->nama}}</option>
                           @endforeach
                        </select>
                        <button type="submit" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i>
                        </button><br />
                     </form>
                  </td>
                  <td style="display: flex">
                     <a href="/admin/data/spt/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-success"><i
                           class="fa fa-edit"></i> </a> <br />
                     <a href="/admin/data/spt/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
                        onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> </a> <br />
                     <a href="/admin/data/spt/cetak/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i
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