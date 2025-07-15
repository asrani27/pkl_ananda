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
                        width="10%"> <br />APLIKASI PEMBERKASAN DATA DAN DOKUMEN TERPADU<br /> UNIT PELAYANAN
                     PENDAPATAN DAERAH BANJARMASIN I</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end progress bar -->
</div>
<div class="row">

   <div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>
@endsection
@push('js')
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
   window.onload = function () {

   var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      theme: "light2",
      title: {
         text: "Grafik Surat 2025"
      },
      axisY: {
         title: "Jumlah Dokumen",
         includeZero: true
      },
      toolTip: {
         shared: true
      },
      legend: {
         cursor: "pointer",
         itemclick: toggleDataSeries
      },
      data: [
         {
            type: "column",
            name: "Surat Masuk",
            showInLegend: true,
            dataPoints: {!! json_encode($chartSuratMasuk) !!}
         },
         {
            type: "column",
            name: "Surat Keluar",
            showInLegend: true,
            dataPoints: {!! json_encode($chartSuratKeluar) !!}
         },
         {
            type: "column",
            name: "SPT",
            showInLegend: true,
            dataPoints: {!! json_encode($chartSPT) !!}
         }
      ]
   });

   chart.render();

   function toggleDataSeries(e) {
      if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
         e.dataSeries.visible = false;
      } else {
         e.dataSeries.visible = true;
      }
      chart.render();
   }

}
</script>

@endpush