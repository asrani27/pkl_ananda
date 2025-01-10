@extends('layouts.app')  
@push('css')  
  
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
                <input type="text" class="form-control" name="nama">  
             </div> 
             <br/>  
             <div class="field">  
                <label class="label_field">NIP Pimpinan</label>  
                <input type="text" class="form-control" name="nip">  
             </div> 
             <br/>  
             <div class="field">  
                <label class="label_field">Pangkat Pimpinan</label>  
                <input type="text" class="form-control" name="pangkat">  
             </div> 
             <br/>  
             <div class="field">  
                <label class="label_field">Jabatan Pimpinan</label>  
                <input type="text" class="form-control" name="jabatan">  
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