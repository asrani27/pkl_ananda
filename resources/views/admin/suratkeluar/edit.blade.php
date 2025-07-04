@extends('layouts.app')
@push('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
   .note-editor .note-toolbar i,
   .note-editor .note-toolbar svg {
      fill: #28a745 !important;
      /* Hijau */
      color: #060606 !important;
   }

   .note-editor p {
      margin: 0 !important;
   }
</style>
@endpush
@section('content')
<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Edit Data Surat Keluar</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="padding_infor_info">
      <form method="post" action="/admin/data/suratkeluar/edit/{{$data->id}}" enctype="multipart/form-data">
         @csrf
         <fieldset>
            <div class="field">
               <label class="label_field">Tanggal Surat</label>
               <input type="date" class="form-control" name="tgl_surat" value="{{$data->tgl_surat}}">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Nomor Surat</label>
               <input type="text" class="form-control" name="no_surat" value="{{$data->no_surat}}">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Tujuan</label>
               <input type="text" class="form-control" name="tujuan" value="{{$data->tujuan}}">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Sifat</label>
               <input type="text" class="form-control" name="sifat" value="{{$data->sifat}}">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Perihal</label>
               <input type="text" class="form-control" name="perihal" value="{{$data->perihal}}">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Lampiran</label>
               <input type="text" class="form-control" name="lampiran" value="{{$data->lampiran}}">
            </div>
            <br/>
            <div class="field">
               <label class="label_field">Isi</label>
               <textarea id="summernote" name="isi">
                  {!!$data->isi!!}
               </textarea>
            </div>
            <br/>
            {{-- <div class="field">
               <label class="label_field">File</label>
               <input type="file" class="form-control" name="file">
            </div>
            <br /> --}}

            <div class="field margin_0">
               <button class="main_bt"><i class="fa fa-save"></i> Update</button>
            </div>
         </fieldset>
      </form>
   </div>
</div>

@endsection
@push('js')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>
   $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            disableParagraphMode: true, // Ini penting!
            lineHeights: ['0.5', '1.0', '1.5', '2.0'], // opsional
            });
    });
</script>
@endpush