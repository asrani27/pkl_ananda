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
         <h2>Tambah Surat Perintah Tugas</h2>  
      </div>  
   </div>  
</div>  
  <div class="white_shd full margin_bottom_30">  
    <div class="padding_infor_info">  
        <form method="post" action="/admin/data/spt/create" enctype="multipart/form-data">  
            @csrf  
        <fieldset>  
            <div class="field">  
               <label class="label_field">Tanggal</label>  
               <input type="date" class="form-control" name="tanggal">  
            </div>
         <br/>  
            <div class="field">  
               <label class="label_field">Nomor</label>  
               <input type="text" class="form-control" name="nomor">  
            </div>  
         <br/>  
            <div class="field">  
               <label class="label_field">Nama Pimpinan</label>  
               <input type="text" class="form-control" name="nama" value="{{pimpinan()->nama}}">  
            </div> 
         <br/>  
            <div class="field">  
               <label class="label_field">NIP Pimpinan</label>  
               <input type="text" class="form-control" name="nip" value="{{pimpinan()->nip}}"> 
            </div> 
         <br/>  
            <div class="field">  
               <label class="label_field">Pangkat Pimpinan</label>  
               <input type="text" class="form-control" name="pangkat" value="{{pimpinan()->golongan->nama_golongan}}"> 
            </div> 
         <br/>  
            <div class="field">  
               <label class="label_field">Jabatan Pimpinan</label>  
               <input type="text" class="form-control" name="jabatan" value="{{pimpinan()->jabatan->nama_jabatan}}">  
            </div> 
         <br/>  
            <div class="field">  
               <label class="label_field">Keperluan</label>  
               <input type="text" class="form-control" name="keperluan">  
            </div> 
         <br/>  
            <div class="field">  
               <label class="label_field">Tujuan</label>  
               <input type="text" class="form-control" name="tujuan">  
            </div>
         <br/>  
            <div class="field">  
               <label class="label_field">Berlaku</label>  
               <input type="date" class="form-control" name="berlaku">  
            </div>
         <br/>  
            <div class="field">  
               <label class="label_field">Transport</label>  
               <input type="text" class="form-control" name="transport">  
            </div>
         <br/>  
            <div class="field">  
               <label class="label_field">Pembebanan Biaya</label>  
               <input type="text" class="form-control" name="pembebanan_biaya">  
            </div>
         <br/>   
         <div class="field">
               <label class="label_field">Yang di tugaskan</label>
               <textarea id="summernote" name="yang_ditugaskan">

               </textarea>
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