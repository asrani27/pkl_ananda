@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row column_title">
  <div class="col-md-12">
    <div class="page_title">
      <h2>Biodata Pegawai</h2>
    </div>
  </div>
</div>
<div class="white_shd full margin_bottom_30">
  <div class="padding_infor_info">
    <form method="post" action="/pegawai/data/biodata/{{$data->id}}">
      @csrf
      <fieldset>
        <div class="field">
          <label class="label_field">NIP</label>
          @if ($data->nip == null)
          <input type="text" style="border: 1px solid red" class="form-control" name="nip" value="{{$data->nip}}">
          @else
          <input type="text" class="form-control" name="nip" value="{{$data->nip}}">
          @endif
        </div>
        <br />
        <div class="field">
          <label class="label_field">NIK</label>
          @if ($data->nik == null)
          <input type="text" style="border: 1px solid red" class="form-control" name="nik" value="{{$data->nik}}">
          @else
          <input type="text" class="form-control" name="nik" value="{{$data->nik}}">
          @endif
        </div>
        <br />
        <div class="field">
          <label class="label_field">Nama</label>
          @if ($data->nama == null)
          <input type="text" style="border: 1px solid red" class="form-control" name="nama" value="{{$data->nama}}">
          @else
          <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
          @endif
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
          @if ($data->ttl == null)
          <input type="text" style="border: 1px solid red" class="form-control" name="ttl" value="{{$data->ttl}}">
          @else
          <input type="text" class="form-control" name="ttl" value="{{$data->ttl}}">
          @endif
        </div>
        <br />
        <div class="field">
          <label class="label_field">Alamat</label>
          @if ($data->alamat == null)
          <input type="text" style="border: 1px solid red" class="form-control" name="alamat" value="{{$data->alamat}}">
          @else
          <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
          @endif
        </div>
        <br />
        <div class="field">
          <label class="label_field">Telpon</label>
          @if ($data->telpon == null)
          <input type="text" style="border: 1px solid red" class="form-control" name="telpon" value="{{$data->telpon}}">
          @else
          <input type="text" class="form-control" name="telpon" value="{{$data->telpon}}">
          @endif
        </div>
         <br />
        <div class="field">
          <label class="label_field">Email</label>
          <input type="text" class="form-control" name="email" value="{{$data->email}}">
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
          @if ($data->bagian_id == null)
          <select name="bagian_id" class="form-control" style="border:1px solid red">
            @foreach($bagian as $bag)
            <option value="{{$bag->id}}" {{$data->bagian_id == $bag->id ? 'selected':''}}>{{$bag->nama_bagian}}
            </option>
            @endforeach
          </select>
          @else
          <select name="bagian_id" class="form-control">
            @foreach($bagian as $bag)
            <option value="{{$bag->id}}" {{$data->bagian_id == $bag->id ? 'selected':''}}>{{$bag->nama_bagian}}
            </option>
            @endforeach
          </select>
          @endif
        </div>
        <br />
        <div class="field">
          <label class="label_field">Jabatan</label>
          @if ($data->jabatan_id == null)
          <select name="jabatan_id" class="form-control" disabled style="border:1px solid red">
            @foreach($jabatan as $jab)
            <option value="{{$jab->id}}" {{$data->jabatan_id == $jab->id ? 'selected':''}}>{{$jab->nama_jabatan}}
            </option>
            @endforeach
          </select>

          @else
          <select name="jabatan_id" class="form-control" disabled>
            @foreach($jabatan as $jab)
            <option value="{{$jab->id}}" {{$data->jabatan_id == $jab->id ? 'selected':''}}>{{$jab->nama_jabatan}}
            </option>
            @endforeach
          </select>
          @endif
        </div>
        <br />
        <div class="field">
          <label class="label_field">Golongan / Pangkat *isi apabila PNS</label>

          @if ($data->golongan_id == null)
          <select name="golongan_id" class="form-control" disabled style="border:1px solid red">
            @foreach($golongan as $gol)
            <option value="{{$gol->id}}" {{$data->golongan_id == $gol->id ? 'selected':''}}>{{$gol->nama_golongan}}
            </option>
            @endforeach
          </select>

          @else
          <select name="golongan_id" class="form-control" disabled>
            @foreach($golongan as $gol)
            <option value="{{$gol->id}}" {{$data->golongan_id == $gol->id ? 'selected':''}}>{{$gol->nama_golongan}}
            </option>
            @endforeach
          </select>
          @endif
        </div>
        <br />
        <div class="field">
          <label class="label_field">Pendidikan</label>

          @if ($data->pendidikan_id == null)
          <select name="pendidikan_id" class="form-control" style="border:1px solid red">
            @foreach($pendidikan as $pen)
            <option value="{{$pen->id}}" {{$data->pendidikan_id == $pen->id ? 'selected':''}}>{{$pen->nama_pendidikan}}
            </option>
            @endforeach
          </select>
          @else
          <select name="pendidikan_id" class="form-control">
            @foreach($pendidikan as $pen)
            <option value="{{$pen->id}}" {{$data->pendidikan_id == $pen->id ? 'selected':''}}>{{$pen->nama_pendidikan}}
            </option>
            @endforeach
          </select>
          @endif

          </select>
        </div>
        <br />
        <div class="field">
          <label class="label_field">Prodi</label>
          @if ($data->prodi == null)
          <input type="text" style="border: 1px solid red" class="form-control" name="prodi" value="{{$data->prodi}}">
          @else
          <input type="text" class="form-control" name="prodi" value="{{$data->prodi}}">
          @endif
        </div>
        <br />
        <div class="field">
          <label class="label_field">Status Pegawai</label>
          @if ($data->status == null)
          <select name="status" class="form-control" style="border: 1px solid red">
            <option value="PNS" {{$data->status === "PNS" ? 'selected':''}}>PNS</option>
            <option value="TEKON" {{$data->status === "TEKON" ? 'selected':''}}>TEKON</option>
          </select>
          @else
          <select name="status" class="form-control">
            <option value="PNS" {{$data->status === "PNS" ? 'selected':''}}>PNS</option>
            <option value="TEKON" {{$data->status === "TEKON" ? 'selected':''}}>TEKON</option>
          </select>
          @endif
          </br>
        </div>

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