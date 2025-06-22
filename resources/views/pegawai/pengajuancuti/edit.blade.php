@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Edit Data Pengajuan Cuti</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="padding_infor_info">
      <form method="post" action="/pegawai/data/pengajuancuti/edit/{{$data->id}}" enctype="multipart/form-data">
         @csrf
         <fieldset>
            <div class="field">
               <label class="label_field">Tanggal Surat</label>
               <input type="date" class="form-control" name="tanggal" value="{{$data->tanggal}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">jenis cuti</label>
               <select name="jenis_cuti_id" class="form-control">
                  @foreach($jenis as $item)
                  <option value="{{$item->id}}" {{$data->jenis_cuti_id == $item->id ?
                     'selected':''}}>{{$item->nama_cuti}}</option>
                  @endforeach
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Tanggal Mulai Cuti</label>
               <input type="date" class="form-control" name="tgl_mulai" value="{{$data->tgl_mulai}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Tanggal Selesai Cuti</label>
               <input type="date" class="form-control" name="tgl_selesai" value="{{$data->tgl_selesai}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Alasan Cuti</label>
               <input type="text" class="form-control" name="alasan" value="{{$data->alasan}}">
            </div>
            <br />

            <div class="field">
               <label class="label_field">Verifikasi oleh Kepala Sub Bagian</label>
               <select name="kepala" class="form-control">
                  @foreach($kasub as $item)
                  <option value="{{$item->nik}}">{{$item->nama}} ({{$item->roles}})</option>
                  @endforeach
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Verifikasi oleh Pimpinan</label>
               <select name="pimpinan" class="form-control">
                  @foreach($pimpinan as $item)
                  <option value="{{$item->nik}}">{{$item->nama}} ({{$item->roles}})</option>
                  @endforeach
               </select>
            </div>
            <div class="field margin_0">
               <button class="main_bt"><i class="fa fa-save"></i> Simpan</button>
            </div>
         </fieldset>
      </form>
   </div>
</div>

@endsection
@push('js')

@endpush