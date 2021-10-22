@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
    <h1>Crear nuevo Rol</h1>
@stop

@section('content')
    <div class="div-card">
        <div class="card-body">
            {!! Form::open(['route' => 'roles.store']) !!}

            @include('roles.partials.form')


            {!! Form::submit('Crear Rol',['class' => 'btn btn-primary']) !!}
        </div>
        


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop