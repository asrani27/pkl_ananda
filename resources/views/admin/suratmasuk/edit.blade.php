@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Edit Data Surat Masuk</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="padding_infor_info">
      <form method="post" action="/admin/data/suratmasuk/edit/{{$data->id}}" enctype="multipart/form-data">
         @csrf
         <fieldset>
            <div class="field">
               <label class="label_field">Tanggal Masuk</label>
               <input type="date" class="form-control" name="tgl_masuk" value="{{$data->tgl_masuk}}">
            </div>

            <div class="field">
               <label class="label_field">Nomor Surat</label>
               <input type="text" class="form-control" name="no_surat" value="{{$data->no_surat}}">
            </div>
            <div class="field">
               <label class="label_field">Pengirim</label>
               <input type="text" class="form-control" name="pengirim" value="{{$data->pengirim}}">
            </div>
            <div class="field">
               <label class="label_field">Tanggal Surat</label>
               <input type="date" class="form-control" name="tgl_surat" value="{{$data->tgl_surat}}">
            </div>

            <div class="field">
               <label class="label_field">Lampiran</label>
               <input type="text" class="form-control" name="lampiran" value="{{$data->lampiran}}">
            </div>

            <div class="field">
               <label class="label_field">Perihal</label>
               <input type="text" class="form-control" name="perihal" value="{{$data->perihal}}">
            </div>

            <div class="field">
               <label class="label_field">sifat</label>
               <select name="sifat" class="form-control">
                  <option value="penting" {{$data->sifat == 'penting' ? 'selected':''}}>penting</option>
                  <option value="biasa" {{$data->sifat == 'biasa' ? 'selected':''}}>biasa</option>
               </select>
            </div>
            <div class="field">
               <label class="label_field">File</label>
               <input type="file" class="form-control" name="file"><br/>
               File : @if ($data->file == null)
                   tidak ada file
               @else
                   <a href="/storage/uploads/{{$data->file}}"> <i class="fa fa-file"></i> Download </a>
               @endif
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