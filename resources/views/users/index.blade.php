@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')

<div class="d-flex align-items-center p-4 my-0 text-white bg-blue rounded shadow-sm">
    <h1>LISTA DE USUARIOS</h1>

</div>
    
@stop
  

@section('content')

{{-- Llamar a Liviwire --}}

 @livewire('admin.users-index')
 

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
  


@stop

@section('js')


@stop