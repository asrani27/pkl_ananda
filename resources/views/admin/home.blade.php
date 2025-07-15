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
            dataPoints: [
               { label: "Jan", y: 25 },
               { label: "Feb", y: 30 },
               { label: "Mar", y: 28 },
               { label: "Apr", y: 35 },
               { label: "Mei", y: 40 },
               { label: "Jun", y: 38 },
               { label: "Jul", y: 45 },
               { label: "Agu", y: 50 },
               { label: "Sep", y: 47 },
               { label: "Okt", y: 42 },
               { label: "Nov", y: 48 },
               { label: "Des", y: 53 }
            ]
         },
         {
            type: "column",
            name: "Surat Keluar",
            showInLegend: true,
            dataPoints: [
               { label: "Jan", y: 20 },
               { label: "Feb", y: 22 },
               { label: "Mar", y: 25 },
               { label: "Apr", y: 27 },
               { label: "Mei", y: 30 },
               { label: "Jun", y: 29 },
               { label: "Jul", y: 35 },
               { label: "Agu", y: 37 },
               { label: "Sep", y: 40 },
               { label: "Okt", y: 38 },
               { label: "Nov", y: 42 },
               { label: "Des", y: 45 }
            ]
         },
         {
            type: "column",
            name: "SPT",
            showInLegend: true,
            dataPoints: [
               { label: "Jan", y: 10 },
               { label: "Feb", y: 15 },
               { label: "Mar", y: 12 },
               { label: "Apr", y: 18 },
               { label: "Mei", y: 20 },
               { label: "Jun", y: 17 },
               { label: "Jul", y: 22 },
               { label: "Agu", y: 25 },
               { label: "Sep", y: 23 },
               { label: "Okt", y: 19 },
               { label: "Nov", y: 21 },
               { label: "Des", y: 24 }
            ]
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