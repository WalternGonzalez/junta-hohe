@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>      
@endif

@can('roles.create')
<a href="{{route('roles.create')}}"class="btn btn-primary align-items-center p-2 my-3"> <i class="fa fa-plus fa"></i>&nbsp;&nbsp;Nuevo Rol</a>     
@endcan

<table class="table table-striped responsive">

    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Role</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
             <td>{{$role->id}}</td>
             <td>{{$role->name}}</td>
             <td>
                @can('roles.destroy')    
                <form action="{{ route ('roles.destroy', $role)}}" method="POST">
                    @csrf
                    @method('DELETE')
                @endcan

                @can('roles.edit')  
                        <a href="{{route('roles.edit', $role)}}" class="btn btn-info">Editar</a>
                    <button type="submit" class= "btn btn-danger">Borrar</button>
                 @endcan

                    </form>
                </form>
            </td>


         </tr> 
     @endforeach
    </tbody> 
  </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop