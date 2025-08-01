@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Disposisi Surat Masuk</h2>
      </div>
   </div>
</div>
<div class="white_shd full margin_bottom_30">
   <div class="padding_infor_info">
      <form method="post" action="/pimpinan/data/suratmasuk/verifikasi/{{$data->id}}" enctype="multipart/form-data">
         @csrf
         <fieldset>
            <div class="field">
               <label class="label_field">Pengirim</label>
               <input type="text" class="form-control" name="pengirim" value="{{$data->pengirim}}" readonly>
            </div>

            <div class="field">
               <label class="label_field">Perihal</label>
               <input type="text" class="form-control" name="perihal" value="{{$data->perihal}}" readonly>
            </div>

            <div class="field">
               <label class="label_field">Verifikasi Surat</label>
               <select class="form-control" name="verifikasi_surat" required>
                  <option value="diterima">Diterima</option>
                  <option value="ditolak">Ditolak</option>
               </select>
            </div>
            <div class="field">
               <label class="label_field">Tindak Lanjut</label>
               <input type="text" class="form-control" name="tindak_lanjut" value="{{$data->tindak_lanjut}}" required>
            </div>
            <br />
            <div class=" field margin_0">

               <button type="submit" class="main_bt"> Kirim</button>
            </div>
         </fieldset>
      </form>
   </div>
</div>

@endsection
@push('js')

@endpush