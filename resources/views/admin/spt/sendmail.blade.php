@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>Send Email Notifikasi</h2>
        </div>
    </div>
</div>
<div class="white_shd full margin_bottom_30">
    <div class="padding_infor_info">
        <form method="post" action="/admin/data/spt/mail/{{$id}}">
            @csrf
            <fieldset>
                <div class="field">
                    <label class="label_field">Email Tujuan, (jika lebih dari 1, pisahkan dengan koma)</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="field">
                    <label class="label_field">Isi pesan</label>
                    <textarea name="isi" class="form-control" rows="i4"> </textarea>
                </div>
                <br />
                <div class="field margin_0">

                    <button class="main_bt"><i class="fa fa-send"></i> Kirim</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

@endsection
@push('js')

@endpush