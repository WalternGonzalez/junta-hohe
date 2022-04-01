@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
<div class="d-flex align-items-center p-4 my-0 text-white bg-blue rounded shadow-sm">
    <h1>MOSTRAR MEDIDORES</h1>

</div>

@stop

@section('content')
@can('servicio.create')
<button class="btn btn-primary align-items-center p-2 my-3" type="button" data-toggle="modal" data-target="#modal-default" >
  <i class="fa fa-plus fa"></i>&nbsp;&nbsp;Nuevo Medidor
</button>

<form action="{{ route('medidor.index') }}" method="GET">
  <div class="btn-group">
      <input type="text" name="busqueda" class="form-control">
      <input type="submit" value="Buscar" class="btn btn-primary">
  </div>
</form>


@endcan
<br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Numero Medidor</th>
        <th scope="col">Descripción</th>
        <th scope="col">Estado Medidor</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($medidors as $medidor)
            <tr>
                <td>{{ $medidor->id}}</td>
                <td>{{ $medidor->medi_numero}}</td>
                <td>{{ $medidor->medi_descripcion}}</td>
                <td>{{ $medidor->medi_estado}}</td>
                <td>
                  @can('medidor.destroy')
                    <form action="{{ route ('medidor.destroy', $medidor->id)}}" class="formulario-eliminar" method="POST">
                        @csrf
                        @method('DELETE')
                  @endcan
                  @can('medidor.edit')
                        <a href="/medidor/{{$medidor->id}}/edit" class="btn btn-info">Editar</a>
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
          <h3 class="modal-title">Nuevo Medidor</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="card card-info" >
            <form action="/medidor" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="NUMERO MEDIDOR" autocomplete="off" input id="medi_numero" name="medi_numero" type="text" class="form-control" tabindex="1" value="{{old('medi_numero')}}">
                               {{-- VALIDAR FORMULARIO CON JS --}}
                              @error('medi_numero')
                                  <small class="text-danger">  *{{$message}} </small> 
                                  <br>
                              @enderror
                               
                        </div>
                    </div>
                        <div class="form-group row">
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="DESCRIPCION" id="medi_descripcion" name="medi_descripcion" type="text" class="form-control" tabindex="2" value="{{old('medi_descripcion')}}">
                            {{-- VALIDAR FORMULARIO CON JS --}}
                              @error('medi_descripcion')
                                  <small class="text-danger">  *{{$message}} </small> 
                                  <br>
                              @enderror
                               
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="3" aria-hidden="true" name="medi_estado" id="medi_estado" value="{{old('medi_estado')}}">
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>  
                        <a href="/medidor" class="btn btn-secondary" tabindex="5">Cancelar</a>
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

