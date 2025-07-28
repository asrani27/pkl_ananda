@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>Dokumen Pegawai</h2>
        </div>
    </div>
</div>
<div class="white_shd full margin_bottom_30">
    <div class="table_section padding_infor_info">
        <div class="table-responsive-sm">

            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr style="background-color: rgb(52, 52, 51); font-weight:bold;color:aliceblue">
                        <th style="text-align: center">No</th>
                        {{-- <th style="text-align: center">NIP/NIK</th> --}}
                        <th style="text-align: center">Nama</th>
                        <th style="text-align: center">Pas FOTO</th>
                        <th style="text-align: center">KTP</th>
                        <th style="text-align: center">KK</th>
                        <th style="text-align: center">Ijazah</th>
                        <th style="text-align: center">SPK</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $key => $item)
                    <tr>
                        <td>{{1 + $key}}</td>
                        {{-- <td>
                            @if ($item->user->pegawai->status =='PNS')
                                {{$item->user->pegawai->nip}}
                            @else
                                {{$item->user->pegawai->nik}}
                            @endif
                        </td> --}}
                        <td>{{$item->nama}}</td>
                        <td>
                            @if ($item->upload == null)

                            @else
                            @if ($item->upload->file_foto == null)

                            @else
                         <div class="download-container">
                            <a href="/storage/uploads/{{$item->upload->file_foto}}" target="_blank" class="download-btn">
                                <i class="fa fa-download"></i> Download
                            </a>
                        </div>

                            @endif
                            @endif
                        </td>
                        <td>
                            @if ($item->upload == null)

                            @else
                            @if ($item->upload->file_ktp == null)

                            @else
                            <a href="/storage/uploads/{{$item->upload->file_ktp}}" target="_blank"><i
                                    class="fa fa-download"></i></a>
                            @endif
                            @endif
                        </td>

                        <td>
                            @if ($item->upload == null)

                            @else
                            @if ($item->upload->file_kk == null)

                            @else
                            <a href="/storage/uploads/{{$item->upload->file_kk}}" target="_blank"><i
                                    class="fa fa-download"></i></a>
                            @endif
                            @endif
                        </td>

                        <td>
                            @if ($item->upload == null)

                            @else
                            @if ($item->upload->file_ijazah == null)

                            @else
                            <a href="/storage/uploads/{{$item->upload->file_ijazah}}" target="_blank"><i
                                    class="fa fa-download"></i></a>
                            @endif
                            @endif
                        </td>

                        <td>
                            @if ($item->upload == null)

                            @else
                            @if ($item->upload->file_perjanjian_kerja == null)

                            @else
                            <a href="/storage/uploads/{{$item->upload->file_perjanjian_kerja}}" target="_blank"><i
                                    class="fa fa-download"></i></a>
                            @endif
                            @endif
                        </td>

                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@push('js')

@endpush