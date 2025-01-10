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
        <form method="post" action="/admin/data/pegawai/edit/{{$data->id}}">  
            @csrf  
        <fieldset>  
         <div class="field"> 
            <label class="label_field">Username</label> 
            <input type="text" class="form-control" name="username" readonly> 
         </div> 
            <br/> 
            <div class="field"> 
               <label class="label_field">Password</label> 
               <input type="text" class="form-control" name="password"> 
            </div> 
         <br/> 
         <hr style="border: 2px solid black">
            <div class="field">  
               <label class="label_field">NIK</label>  
               <input type="text" class="form-control" name="nik" value="{{$data->nik}}">  
            </div>  
        <br/>  
            <div class="field">  
              <label class="label_field">Nama</label>  
              <input type="text" class="form-control" name="nama" value="{{$data->nama}}">  
            </div>  
        <br/>  
            <div class="field">  
              <label class="label_field">Jenis Kelamin</label>  
              <select name="jkel" class="form-control">  
              <option value="PEREMPUAN" {{$data->jkel === "PEREMPUAN" ? 'selected':''}}>Perempuan</option>  
              <option value="LAKI LAKI" {{$data->jkel === "LAKI LAKI" ? 'selected':''}}>Laki - Laki</option>  
              </select>  
            </div>   
         <br/>
            <div class="field"> 
             <label class="label_field">TTL</label> 
            <input type="text" class="form-control" name="ttl" value="{{$data->ttl}}"> 
          </div> 
        <br/>  
            <div class="field">  
              <label class="label_field">Alamat</label>  
              <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">  
            </div>  
        <br/>  
            <div class="field">  
              <label class="label_field">Telpon</label>  
              <input type="text" class="form-control" name="telpon" value="{{$data->telpon}}">  
            </div>  
        <br/>  
            <div class="field">  
              <label class="label_field">Agama</label>  
              <select name="agama" class="form-control">  
              <option value="ISLAM" {{$data->agama === "ISLAM" ? 'selected':''}}>ISLAM</option>  
              <option value="KRISTEN" {{$data->agama === "KRISTEN" ? 'selected':''}}>KRISTEN</option>  
              <option value="HINDU" {{$data->agama === "HINDU" ? 'selected':''}}>HINDU</option>  
              <option value="BUDDHA" {{$data->agama === "BUDDHA" ? 'selected':''}}>BUDDHA</option> 
              <option value="KHATOLIK" {{$data->agama === "KHATOLIK" ? 'selected':''}}>KHATOLIK</option> 
              </select>  
           </div>  
        <br/>  
           <div class="field">  
              <label class="label_field">Jabatan</label>  
              <select name="jabatan_id" class="form-control">  
 
               @foreach($jabatan as $jab) 
               <option value="{{$jab->id}}"  {{$data->jabatan_id == $jab->id ? 'selected':''}}>{{$jab->nama_jabatan}}</option> 
                @endforeach 
              </select>  
           </div> 
         <br/>  
           <div class="field">  
             <label class="label_field">Tugas Pokok</label>  
             <input type="text" class="form-control" name="tugas_pokok" value="{{$data->tugas_pokok}}">  
           </div>    
        <br/>  
           <div class="field">  
              <label class="label_field">Pendidikan</label>  
              <select name="pendidikan_id" class="form-control">  
               @foreach($pendidikan as $pen) 
              <option value="{{$pen->id}}" {{$data->pendidikan_id == $pen->id ? 'selected':''}}>{{$pen->nama_pendidikan}}</option> 
                @endforeach 
              </select>  
           </div>  
        <br/> 
        <div class="field"> 
           <label class="label_field">Status Pegawai</label> 
           <select name="status" class="form-control"> 
              <option value="PNS" {{$data->status == 'PNS' ? 'selected':''}}>PNS</option>
              <option value="TEKON" {{$data->status == 'TEKON' ? 'selected':''}}>TEKON</option>
           </select> 
        </div> 
     <br/>
           <div class="field">  
              <label class="label_field">Prodi</label>  
              <input type="text" class="form-control" name="prodi" value="{{$data->prodi}}">  
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