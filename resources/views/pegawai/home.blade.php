@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Beranda</h2>
      </div>
   </div>
</div>

<!-- end graph -->
<div class="row column3">
   <!-- end testimonial -->
   <!-- progress bar -->
   <div class="col-md-12">
      <div class="dark_bg full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Selamat Datang Di</h2>
            </div>
         </div>
         <div class="full progress_bar_inner">
            <div class="row">
               <div class="col-md-12">

                  <h1 style="color: aliceblue;padding:20px 20px; text-align:center"><img src="/background/logo.png"
                        width="10%"> <br /><br />APLIKASI PEMBERKASAN DATA DAN DOKUMEN TERPADU<br /> UNIT PELAYANAN
                     PENDAPATAN DAERAH BANJARMASIN I</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end progress bar -->
</div>

<div class="row">
   <div class="col-md-12">
      <div class="full white_shd">
         <div class="full padding_infor_info">
            @if (checkdokumen() != 0)
            <p class="note_cont" style="background-color: rgb(251, 213, 213); color:red; border:1px solid red">
               <i class="fa fa-exclamation"></i> Ada Dokumen yang perlu di upload
            </p>
            @endif
            @if (checkbiodata() != 0)
            <p class="note_cont" style="background-color: rgb(251, 213, 213); color:red; border:1px solid red">
               <i class="fa fa-exclamation"></i> Inputan Biodata perlu di lengkapi
            </p>
            @endif
         </div>
      </div>
   </div>
</div>
@endsection
@push('js')

@endpush