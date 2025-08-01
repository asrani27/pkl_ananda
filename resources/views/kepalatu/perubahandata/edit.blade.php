@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Edit Data</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="padding_infor_info">
      <form method="post" action="/kepalatu/data/perubahandata/edit/{{$data->id}}" enctype="multipart/form-data">
         @csrf
         <fieldset>
            <div class="field">
               <label class="label_field">Nama Jabatan</label>
               <input type="text" class="form-control" name="nama_jabatan" value="{{$data->nama_jabatan}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Tanggal</label>
               <input type="date" class="form-control" name="tanggal" value="{{$data->tanggal}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Jenis Perubahan</label>
               <select class="form-control" name="jenis" required>
                  <option value="">-</option>
                  <option value="nama" {{$data->jenis == 'nama' ? 'selected':''}}>nama</option>
                  <option value="jabatan" {{$data->jenis == 'jabatan' ? 'selected':''}}>jabatan</option>
                  <option value="pangkat" {{$data->jenis == 'pangkat' ? 'selected':''}}>pangkat</option>
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Dari</label>
               <input type="text" class="form-control" name="dari" value="{{$data->dari}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Menjadi</label>
               <input type="text" class="form-control" name="menjadi" value="{{$data->menjadi}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Keterangan lainnya</label>
               <input type="text" class="form-control" name="keterangan" value="{{$data->keterangan}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">File *isi jika ada</label>
               <input type="file" class="form-control" name="file" value="{{$data->file}}">
            </div>
            <br />
            <div class="field margin_0">

               <button class="main_bt"><i class="fa fa-save"></i> Update</button>
            </div>
         </fieldset>
      </form>
   </div>
</div>

@endsection
@push('js')

@endpush