@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row text-center">
  <H2>HI! {{strtoupper(Auth::user()->name)}}SELAMAT DATANG DI APLIKASI <br/>PEMBERKASAN DATA</H2>
</div>
@endsection
@push('js')

@endpush