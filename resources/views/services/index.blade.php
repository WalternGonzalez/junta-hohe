@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
<div class="d-flex align-items-center p-3 my-3 text-white bg-blue rounded shadow-sm"> 
    <h1><b>SERVICIOS</b></h1>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <form action="simple-results.html">
            <div class="input-group">
                <input type="search" class="form-control form-control-lg" placeholder="Ingrese su Búsqueda">
                    <button type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @can('servicio.create')
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus fa"></i>&nbsp;&nbsp;Nuevo registro
                    </button>
                    @endcan
            </div>
        </form>
    </div>
</div>
<br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Impuesto</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($servicios as $servicio)
            <tr>
                <td>{{ $servicio->id}}</td>
                <td>{{ $servicio->serv_descripcion}}</td>
                <td>{{ $servicio->impuesto->impu_descripcion}}</td>
                <td>
                    @can('servicio.destroy')
                    <form action="{{ route ('servicio.destroy', $servicio->id)}}" class="formulario-eliminar" method="POST">
                        @csrf
                        @method('DELETE')
                    @endcan

                    @can('servicio.edit')
                        <a href="/servicio/{{$servicio->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class= "btn btn-danger">Borrar</button>
                    @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody> 
  </table>


{{-- MODAL CREAR --}}

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title"><b>&nbsp;Crear servicio</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="card card-info" >
            <form action="/servicio" method="POST">
                @csrf
                <div class="card-body">
                        <div class="form-group row">
                        <div class="col-sm-12">
                            <input class="form-control" placeholder="DESCRIPCION" id="serv_descripcion" name="serv_descripcion" type="text" class="form-control" tabindex="2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="3" aria-hidden="true" name="impu_codigo" id="impu_codigo">
                                <option value="1">10%</option>
                                <option value="2">5%</option>
                                <option value="3">EXENTAS</option>
                            </select>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="/servicio" class="btn btn-secondary" tabindex="5">Cancelar</a>
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>  
                    </div>
                </div> 
            </form>
        </div>

        </div>
      </div>
    </div>
  <!-- /.modal CREAR-->
  
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
