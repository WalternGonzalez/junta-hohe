@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')

    <h1>Lista de Usuarios</h1>
    
@stop



@section('content')

{{-- Llamar a Liviwire --}}
@livewireStyles
 @livewire('admin.users-index')
 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
  


@stop

@section('js')


@stop