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
         <h2>Tambah Data Surat Keluar</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="padding_infor_info">
      <form method="post" action="/admin/data/suratkeluar/create" enctype="multipart/form-data">
         @csrf
         <fieldset>
            <div class="field">
               <label class="label_field">Tanggal Surat</label>
               <input type="date" class="form-control" name="tgl_surat" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Nomor Surat</label>
               <input type="text" class="form-control" name="no_surat" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Tujuan</label>
               <input type="text" class="form-control" name="tujuan" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Sifat</label>
               <select name="sifat" class="form-control" required>
                  <option value="penting">Penting</option>
                  <option value="biasa">Biasa</option>
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Perihal</label>
               <input type="text" class="form-control" name="perihal" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Lampiran</label>
               <input type="text" class="form-control" name="lampiran" required>
            </div>
            <div class="field">
               <label class="label_field">Isi</label required>
               <textarea id="summernote" name="isi">

               </textarea>
            </div>
            <br />
            {{-- <div class="field">
               <label class="label_field">File</label>
               <input type="file" class="form-control" name="file">
            </div>
            <br /> --}}

            <div class="field margin_0">
               <button class="main_bt"><i class="fa fa-save"></i> Simpan</button>
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