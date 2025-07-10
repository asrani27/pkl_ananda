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
               <label class="label_field">username</label>
               <input type="text" class="form-control" name="username" readonly value="{{$data->username}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">password</label>
               <input type="text" class="form-control" name="password" value="{{$data->password}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Akses</label>
               <select name="role" class="form-control">
                  <option value="admin" {{$data->user->roles == 'admin' ? 'selected':''}}>admin</option>
                  <option value="pegawai" {{$data->user->roles == 'pegawai' ? 'selected':''}}>pegawai</option>
                  <option value="kepalaTU" {{$data->user->roles == 'kepalaTU' ? 'selected':''}}>kepala TU</option>
                  <option value="pimpinan" {{$data->user->roles == 'pimpinan' ? 'selected':''}}>pimpinan</option>
               </select>
               {{-- <input type="text" class="form-control" name="role" value="superadmin" readonly> --}}
            </div>
            <hr style="height: 2px; background-color: black; border: none;">

            <div class="field">
               <label class="label_field">NIP</label>
               <input type="text" class="form-control" name="nip" value="{{$data->nip}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">NIK</label>
               <input type="text" class="form-control" name="nik" value="{{$data->nik}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Nama</label>
               <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Jenis Kelamin</label>
               <select name="jkel" class="form-control">
                  <option value="PEREMPUAN" {{$data->jkel === "PEREMPUAN" ? 'selected':''}}>Perempuan</option>
                  <option value="LAKI LAKI" {{$data->jkel === "LAKI LAKI" ? 'selected':''}}>Laki - Laki</option>
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">TTL</label>
               <input type="text" class="form-control" name="ttl" value="{{$data->ttl}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Alamat</label>
               <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Telpon</label>
               <input type="text" class="form-control" name="telpon" value="{{$data->telpon}}">
            </div>
            <br />
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
            <br />
            <div class="field">
               <label class="label_field">Bagian</label>
               <select name="bagian_id" class="form-control">
                  @foreach($bagian as $bag)
                  <option value="{{$bag->id}}" {{$data->bagian_id == $bag->id ? 'selected':''}}>{{$bag->nama_bagian}}
                  </option>
                  @endforeach
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Jabatan</label>
               <select name="jabatan_id" class="form-control">

                  @foreach($jabatan as $jab)
                  <option value="{{$jab->id}}" {{$data->jabatan_id == $jab->id ? 'selected':''}}>{{$jab->nama_jabatan}}
                  </option>
                  @endforeach
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Golongan / Pangkat *isi apabila PNS</label>
               <select name="golongan_id" class="form-control">
                  @foreach($golongan as $gol)
                  <option value="{{$gol->id}}" {{$data->golongan_id == $gol->id ? 'selected':''}}>{{$gol->nama_golongan}}
                  </option>
                  @endforeach
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Tugas Pokok</label>
               <input type="text" class="form-control" name="tugas_pokok" value="{{$data->tugas_pokok}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Pendidikan</label>
               <select name="pendidikan_id" class="form-control">
                  @foreach($pendidikan as $pen)
                  <option value="{{$pen->id}}" {{$data->pendidikan_id == $pen->id ?
                     'selected':''}}>{{$pen->nama_pendidikan}}</option>
                  @endforeach
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Prodi</label>
               <input type="text" class="form-control" name="prodi" value="{{$data->prodi}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Status Pegawai</label>
               <select name="status" class="form-control">
                  <option value="PNS" {{$data->status == 'PNS' ? 'selected':''}}>PNS</option>
                  <option value="TEKON" {{$data->status == 'TEKON' ? 'selected':''}}>TEKON</option>
               </select>
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