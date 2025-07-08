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
        <form method="post" action="/admin/data/jabatan/edit/{{$data->id}}"> 
            @csrf 
        <fieldset> 
            <div class="field"> 
               <label class="label_field">Nama Jabatan</label> 
               <input type="text" class="form-control" name="nama_jabatan" value="{{$data->nama_jabatan}}"> 
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