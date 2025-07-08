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
                  value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
            <br />
            <div class="field">
               <label class="label_field">Jenis Perubahan</label>
               <select class="form-control" name="jenis" required>
                  <option value="">-</option>
                  <option value="nama">nama</option>
                  <option value="jabatan">jabatan</option>
                  <option value="pangkat">pangkat</option>
               </select>
            </div>
            <br />
            <div class="field">
               <label class="label_field">dari</label>
               <input type="text" class="form-control" name="dari">
            </div>
            <br />
            <div class="field">
               <label class="label_field">menjadi</label>
               <input type="text" class="form-control" name="menjadi">
            </div>
            <br />
            <div class="field">
               <label class="label_field">keterangan lainnya</label>
               <input type="text" class="form-control" name="keterangan">
            </div>
            <br />
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