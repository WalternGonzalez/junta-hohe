@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
<div class="d-flex align-items-center p-4 my-0 text-white bg-blue rounded shadow-sm">
    <h1>LISTA DE ROLES</h1>

</div>
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
                <form action="{{ route ('roles.destroy', $role)}}" class="formulario-eliminar"  method="POST">
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



    {{-- JS PARA ALET DIALOG --}}
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('eliminar') == 'ok')
    <script>

     Swal.fire(
        'Eliminado!',
        'Se ha eliminado correctamente.',
        'success'
        )

    </script>
    @endif

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
    title: 'Estás Seguro?',
    text: "Deseas eliminar de forma permanente!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar!'
    }).then((result) => {
    if (result.isConfirmed) {

        this.submit();
    }
    }) 
    });

</script>  
@endsection
