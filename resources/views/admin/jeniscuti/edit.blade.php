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
        <form method="post" action="/admin/data/jeniscuti/edit/{{$data->id}}"> 
            @csrf 
        <fieldset> 
            <div class="field"> 
               <label class="label_field">Nama Cuti</label> 
               <input type="text" class="form-control" name="nama_cuti" value="{{$data->nama_cuti}}"> 
            </div> 
            <br/> 
            <div class="field"> 
               <label class="label_field">Kuota</label> 
               <input type="text" class="form-control" name="kuota" value="{{$data->kuota}}"> 
            </div> 
            <br/>
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