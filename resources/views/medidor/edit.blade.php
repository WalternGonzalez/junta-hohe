
@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')


<section class="content" >
    <div class="container-fluid" >
        <div class="row justify-content-center align-items-center h-100">
            <!-- left column -->
            <div class="col-md-8" >
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">EDITAR MEDIDORES</h3>
                </div>   
<form action="/medidor/{{$medidor->id}}" method="POST" id="update">
    @csrf
    @method('PUT')

    <div class="card-body">
        <div class="form-group">
            <label for="" class="form-label">Numero de Medidor</label>
            <input id="medi_numero" name="medi_numero" type="text" class="form-control" value="{{old('medi_numero', $medidor->medi_numero)}}">
                {{-- VALIDAR FORMULARIO CON JS --}}
                @error('medi_numero')
                <small class="text-danger"> *{{$message}} </small> 
                    <br>
                @enderror           
        </div>
        <div class="form-group">
            <label for="" class="form-label">Descripción</label>
            <input id="medi_descripcion" name="medi_descripcion" type="text" class="form-control" value="{{old('medi_descripcion', $medidor->medi_descripcion)}}">
                {{-- VALIDAR FORMULARIO CON JS --}}
                @error('medi_descripcion')

                        <small class="text-danger"> *{{$message}} </small> 
                    <br>
                @enderror              
        </div>

        <div class="form-group">
            <label>Estado del Medidor</label>
            <select class="form-control select2" class="form-select" name="medi_estado" id="medi_estado" style="width: 100%;">
                <option>Activo</option>
                <option>Inactivo</option>
            </select>
          </div>
    <br>
<button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>  
<a href="/medidor" class="btn btn-secondary" tabindex="5">Cancelar</a>    
</form>
</section>
@endsection