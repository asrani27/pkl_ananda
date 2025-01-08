@extends('layouts.app') 
@push('css') 
 
@endpush 
@section('content') 
<div class="row column_title"> 
    <div class="col-md-12"> 
       <div class="page_title"> 
          <h2>Tambah Data</h2> 
       </div> 
    </div> 
  </div> 
  <div class="white_shd full margin_bottom_30"> 
    <div class="padding_infor_info"> 
        <form method="post" action="/admin/data/pegawai/create"> 
            @csrf 
        <fieldset> 
         <div class="field"> 
            <label class="label_field">Username</label> 
            <input type="text" class="form-control" name="username"> 
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
               <input type="text" class="form-control" name="nik"> 
            </div> 
        <br/> 
            <div class="field"> 
              <label class="label_field">Nama</label> 
              <input type="text" class="form-control" name="nama"> 
            </div> 
        <br/> 
            <div class="field"> 
              <label class="label_field">Jenis Kelamin</label> 
              <select name="jkel" class="form-control"> 
              <option value="PEREMPUAN">Perempuan</option> 
              <option value="LAKI LAKI">Laki - Laki</option> 
              </select> 
            </div>  
        <br/> 
            <div class="field"> 
              <label class="label_field">Alamat</label> 
              <input type="text" class="form-control" name="alamat"> 
            </div> 
        <br/> 
            <div class="field"> 
              <label class="label_field">Telpon</label> 
              <input type="text" class="form-control" name="telp"> 
            </div> 
        <br/> 
            <div class="field"> 
              <label class="label_field">Agama</label> 
              <select name="agama" class="form-control"> 
              <option value="ISLAM">ISLAM</option> 
              <option value="KRISTEN">KRISTEN</option> 
              <option value="HINDU">HINDU</option> 
              <option value="BUDDHA">BUDDHA</option>
              <option value="KHATOLIK">KHATOLIK</option>
              </select> 
           </div> 
        <br/> 
           <div class="field"> 
              <label class="label_field">Jabatan</label> 
              <select name="jabatan_id" class="form-control"> 

               @foreach($jabatan as $jab)
               <option value="{{$jab->id}}" >{{$jab->nama_jabatan}}</option>
                @endforeach
              </select> 
           </div> 
        <br/> 
           <div class="field"> 
              <label class="label_field">Pendidikan</label> 
              <select name="pendidikan_id" class="form-control"> 
               @foreach($pendidikan as $pen)
              <option value="{{$pen->id}}" >{{$pen->nama_pendidikan}}</option>
                @endforeach
              </select> 
           </div> 
        <br/>
           <div class="field"> 
              <label class="label_field">Prodi</label> 
              <input type="text" class="form-control" name="prodi"> 
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