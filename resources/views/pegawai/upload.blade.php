@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
     <div class="col-md-12">
          <div class="page_title">
               <h2>Berkas Upload Dokumen</h2>
          </div>
     </div>
</div>
<div class="white_shd full margin_bottom_30">
     <div class="full graph_head">
          <div class="heading1 margin_0">
               <table class="table table-bordered">
                    <tr>
                         <th style="text-align: center;">Nama berkas</th>
                         <th style="text-align: center;"></th>
                         <th style="text-align: center;">Aksi</th>
                    </tr>

                    <tr>
                         <td>Foto</td>
                         <td>
                              @if ($data->upload == null)

                              @else
                              @if ($data->upload->file_foto == null)

                              <span class="text-danger" style="font-weight: bold">BELUM UPLOAD</span>
                              @else
                              <a href="/storage/uploads/{{$data->upload == null ? null : $data->upload->file_foto}}"
                                   class="btn btn-sm btn-success" target="_blank">lihat</a>
                              @endif
                              @endif
                         </td>
                         <td style="display : flex">
                              <form method="post" action="/pegawai/upload/foto" enctype="multipart/form-data"
                                   style="display : flex">
                                   @csrf
                                   <input type="file" name="file" class="form-control" required>
                                   <button type="submit" class="btn btn-sm btn-primary">upload</button>
                              </form>
                         </td>
                    </tr>

                    <tr>
                         <td>KTP</td>
                         <td>
                              @if ($data->upload == null)

                              @else
                              @if ($data->upload->file_ktp == null)
                              <span class="text-danger" style="font-weight: bold">BELUM UPLOAD</span>
                              @else
                              <a href="/storage/uploads/{{$data->upload == null ? null : $data->upload->file_ktp}}"
                                   class="btn btn-sm btn-success" target="_blank">lihat</a>
                              @endif
                              @endif
                         </td>
                         <td style="display : flex">
                              <form method="post" action="/pegawai/upload/ktp" enctype="multipart/form-data"
                                   style="display : flex">
                                   @csrf
                                   <input type="file" name="file" class="form-control" required>
                                   <button type="submit" class="btn btn-sm btn-primary">upload</button>
                              </form>
                         </td>
                    </tr>

                    <tr>
                         <td>Kartu Keluarga</td>
                         <td>
                              @if ($data->upload == null)

                              @else
                              @if ($data->upload->file_kk == null)

                              <span class="text-danger" style="font-weight: bold">BELUM UPLOAD</span>
                              @else
                              <a href="/storage/uploads/{{$data->upload == null ? null : $data->upload->file_kk}}"
                                   class="btn btn-sm btn-success" target="_blank">lihat</a>
                              @endif
                              @endif
                         </td>
                         <td style="display : flex">
                              <form method="post" action="/pegawai/upload/kk" enctype="multipart/form-data"
                                   style="display : flex">
                                   @csrf
                                   <input type="file" name="file" class="form-control" required>
                                   <button type="submit" class="btn btn-sm btn-primary">upload</button>
                              </form>
                         </td>
                    </tr>

                    <tr>
                         <td>Ijazah</td>
                         <td>
                              @if ($data->upload == null)

                              @else
                              @if ($data->upload->file_ijazah == null)

                              <span class="text-danger" style="font-weight: bold">BELUM UPLOAD</span>
                              @else
                              <a href="/storage/uploads/{{$data->upload == null ? null : $data->upload->file_ijazah}}"
                                   class="btn btn-sm btn-success" target="_blank">lihat</a>
                              @endif
                              @endif
                         </td>
                         <td style="display : flex">
                              <form method="post" action="/pegawai/upload/ijazah" enctype="multipart/form-data"
                                   style="display : flex">
                                   @csrf
                                   <input type="file" name="file" class="form-control" required>
                                   <button type="submit" class="btn btn-sm btn-primary">upload</button>
                              </form>
                         </td>
                    </tr>

                    <tr>
                         <td>Sertifikat</td>
                         <td>
                              @if ($data->upload == null)

                              @else
                              @if ($data->upload->file_sertifikat == null)

                              <span class="text-danger" style="font-weight: bold">BELUM UPLOAD</span>
                              @else
                              <a href="/storage/uploads/{{$data->upload == null ? null : $data->upload->file_sertifikat}}"
                                   class="btn btn-sm btn-success" target="_blank">lihat</a>
                              @endif
                              @endif
                         </td>
                         <td style="display : flex">
                              <form method="post" action="/pegawai/upload/sertifikat" enctype="multipart/form-data"
                                   style="display : flex">
                                   @csrf
                                   <input type="file" name="file" class="form-control" required>
                                   <button type="submit" class="btn btn-sm btn-primary">upload</button>
                              </form>
                         </td>
                    </tr>

                    <tr>
                         <td>Surat Perjanjian Kerja</td>
                         <td>
                              @if ($data->upload == null)

                              @else
                              @if ($data->upload->file_perjanjian_kerja == null)

                              <span class="text-danger" style="font-weight: bold">BELUM UPLOAD</span>
                              @else
                              <a href="/storage/uploads/{{$data->upload == null ? null : $data->upload->file_perjanjian_kerja}}"
                                   class="btn btn-sm btn-success" target="_blank">lihat</a>
                              @endif
                              @endif
                         </td>
                         <td style="display : flex">
                              <form method="post" action="/pegawai/upload/spk" enctype="multipart/form-data"
                                   style="display : flex">
                                   @csrf
                                   <input type="file" name="file" class="form-control" required>
                                   <button type="submit" class="btn btn-sm btn-primary">upload</button>
                              </form>
                         </td>
                    </tr>
               </table>
          </div>
     </div>

</div>
@endsection