@extends('layouts.app')  
@push('css')  
  
@endpush  
@section('content')  
<div class="row column_title">  
    <div class="col-md-12">  
       <div class="page_title">  
          <h2>Tambah Data Pengajuan Cuti</h2>  
       </div>  
    </div>  
  </div>  
  <div class="white_shd full margin_bottom_30">  
    <div class="padding_infor_info">  
        <form method="post" action="/admin/data/pengajuancuti/create" enctype="multipart/form-data">  
            @csrf  
        <fieldset>  
            <div class="field">  
               <label class="label_field">Jenis Cuti</label>  
               <input type="date" class="form-control" name="jenis_cuti">  
            </div>
            <br/>
            <div class="field">  
               <label class="label_field">Tanggal Mulai</label>  
               <input type="date" class="form-control" name="tgl_mulai">  
            </div>
            <br/> 
            <div class="field">  
               <label class="label_field">Tanggal Selesai</label>  
               <input type="date" class="form-control" name="tgl_selesai">  
            </div>
            <br/>
            <div class="field">  
               <label class="label_field">Jumlah Hari</label>  
               <input type="text" class="form-control" name="jumlah_hari">  
            </div>  
            <br/>
            <div class="field">  
               <label class="label_field">Alasan</label>  
               <input type="text" class="form-control" name="alasan">  
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
