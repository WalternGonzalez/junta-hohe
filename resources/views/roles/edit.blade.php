@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>      
@endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['roles.update', $role], 'method'=>'put']) !!}

            @include('roles.partials.form')

            {!! Form::submit('Actualizar Rol',['class' => 'btn btn-primary']) !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop