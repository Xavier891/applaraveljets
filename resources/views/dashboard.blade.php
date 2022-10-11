@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    @if()
    <p>{{$sucursal1}}</p>
    @endif
@stop

@section('footer')
<footer class="main-footer">
    <div class="float-right d-none d-sm-block"><b>Versión</b> a.0.0.0.20210310</div>
    <strong>©2022 <a href="https://www.inadware.com.mx/">Inadware de México, S. de R.L.</a></strong>
</footer>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop