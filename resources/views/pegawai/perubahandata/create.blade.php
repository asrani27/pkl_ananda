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
      <form method="post" action="/pegawai/data/perubahandata/create">
         @csrf
         <fieldset>
            <div class="field">
               <label class="label_field">Tanggal</label>
               <input type="date" class="form-control" name="tanggal" 
                  value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Jenis Perubahan</label>
               <select class="form-control" name="jenis" required>
                  <option value="">-</option>
                  <option value="jabatan">Jabatan</option>
                  <option value="pangkat">Golongan / Pangkat </option>
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Dari</label>
               <input type="text" class="form-control" name="dari" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Menjadi</label>
               <input type="text" class="form-control" name="menjadi" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">Keterangan Lainnya</label>
               <input type="text" class="form-control" name="keterangan" required>
            </div>
            <br />
            <div class="field">
               <label class="label_field">File *isi jika ada</label>
               <input type="file" class="form-control" name="file" required>
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