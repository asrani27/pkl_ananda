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
               <label class="label_field">username</label>
               <input type="text" class="form-control" name="username" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">password</label>
               <input type="text" class="form-control" name="password" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Akses</label>
               <select name="role" class="form-control">
                  <option value="admin">admin</option>
                  <option value="pegawai">pegawai</option>
                  <option value="kepalaTU">kepala TU</option>
                  <option value="kepalaPelayanan">kepala Pelayanan</option>
                  <option value="pimpinan">pimpinan</option>
               </select>
               {{-- <input type="text" class="form-control" name="role" value="superadmin" readonly> --}}
            </div>
            <hr style="height: 2px; background-color: black; border: none;">
            <div class="field">
               <label class="label_field">NIP</label>
               <input type="text" class="form-control" name="nip">
            </div>
            <br />
            <div class="field">
               <label class="label_field">NIK</label>
               <input type="text" class="form-control" name="nik">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Nama</label>
               <input type="text" class="form-control" name="nama">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Jenis Kelamin</label>
               <select name="jkel" class="form-control">
                  <option value="PEREMPUAN">Perempuan</option>
                  <option value="LAKI LAKI">Laki - Laki</option>
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">TTL</label>
               <input type="text" class="form-control" name="ttl">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Alamat</label>
               <input type="text" class="form-control" name="alamat">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Telpon</label>
               <input type="text" class="form-control" name="telpon">
            </div>
            <br />
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
            <br />
            <div class="field">
               <label class="label_field">Bagian</label>
               <select name="bagian_id" class="form-control">
                  @foreach($bagian as $bag)
                  <option value="{{$bag->id}}">{{$bag->nama_bagian}}</option>
                  @endforeach
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Jabatan</label>
               <select name="jabatan_id" class="form-control">
                  @foreach($jabatan as $jab)
                  <option value="{{$jab->id}}">{{$jab->nama_jabatan}}</option>
                  @endforeach
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Golongan / Pangkat *isi apabila PNS</label>
               <input type="text" class="form-control" name="golongan">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Tugas Pokok</label>
               <input type="text" class="form-control" name="tugas_pokok">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Pendidikan</label>
               <select name="pendidikan_id" class="form-control">
                  @foreach($pendidikan as $pen)
                  <option value="{{$pen->id}}">{{$pen->nama_pendidikan}}</option>
                  @endforeach
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Prodi</label>
               <input type="text" class="form-control" name="prodi">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Status Pegawai</label>
               <select name="status" class="form-control">
                  <option value="PNS">PNS</option>
                  <option value="TEKON">TEKON</option>
               </select>
               </br>
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

@endpush