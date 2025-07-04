@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>Data Biodata</h2>
        </div>
    </div>
</div>
<div class="row column1">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Biodata detail</h2>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <!-- user profile section -->
                    <!-- profile image -->
                    <div class="col-lg-12">
                        <div class="full dis_flex center_text">
                            <div class="profile_img">
                                @if ($data->user == null)

                                @else

                                @if ($data->user->upload == null)
                                <img width="180" class="rounded-circle" src="/pluto/images/layout_img/user_img.jpg"
                                    alt="#">
                                @else
                                <img width="180" class="rounded-circle"
                                    src="/storage/uploads/{{$data->user->upload->file_foto}}" alt="#">

                                @endif
                                @endif
                                <br />
                                <br />
                                <h4>{{$data->nama}}</h4>
                                <h3>{{$data->bagian == null ? '': $data->bagian->nama_bagian}}</h3>
                            </div>
                            <div class="profile_contant">
                                <div class="contact_inner">
                                    <h3>{{$data->jabatan->nama_jabatan}}</h3>
                                    <h3>Golongan : {{$data->golongan == null ? '': $data->golongan->nama_golongan}}</h3>
                                    <p><strong>NIP : </strong>{{$data->nip}}</p>
                                    <p><strong>NIK : </strong>{{$data->nik}}</p>
                                    <p><strong>TTL : </strong>{{$data->ttl}}</p>
                                    <p><strong>Jenis Kelamin : </strong>{{$data->jkel}}</p>
                                    <p><strong>Alamat : </strong>{{$data->alamat}}</p>
                                    <p><strong>Telpon : </strong>{{$data->telpon}}</p>
                                    <p><strong>Agama : </strong>{{$data->agama}}</p>
                                    <p><strong>Pendidikan : </strong>{{$data->pendidikan == null ? '-':
                                        $data->pendidikan->nama_pendidikan}}</p>
                                    <p><strong>Prodi : </strong>{{$data->prodi}}</p>
                                    <p><strong>Tugas Pokok : </strong>{{$data->tugas_pokok}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- end row -->
</div>

@endsection
@push('js')

@endpush