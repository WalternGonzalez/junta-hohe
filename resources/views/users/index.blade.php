@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')

{{-- Llamar a Liviwire --}}

 @livewire('admin.users-index')
 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop