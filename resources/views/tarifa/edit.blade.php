
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
                  <h3 class="card-title">EDITAR TARIFA</h3>
                </div>   
<form action="/tarifa/{{$tarifa->id}}" method="POST" id="update">
    @csrf
    @method('PUT')

    <div class="card-body">
        <div class="form-group">
            <label for="" class="form-label">Descripción</label>
            <input id="tari_descripcion" name="tari_descripcion" type="text" class="form-control" value="{{old('tari_descripcion', $tarifa->tari_descripcion)}}">
                {{-- VALIDAR FORMULARIO CON JS --}}
                @error('tari_descripcion')
                    <small class="text-danger"> *{{$message}} </small> 
                    <br>
                @enderror    
        </div>
        <div class="form-group">
            <label for="" class="form-label">Precio m3</label>
            <input id="tari_m3_precio" name="tari_m3_precio" type="number" class="form-control" value="{{old('tari_m3_precio', $tarifa->tari_m3_precio)}}">
                {{-- VALIDAR FORMULARIO CON JS --}}
                @error('tari_m3_precio')
                    <small class="text-danger"> *{{$message}} </small> 
                    <br>
                @enderror               
        </div>
        <div class="form-group">
            <label for="" class="form-label">tari_imp_minimo</label>
            <input id="tari_imp_minimo" name="tari_imp_minimo" type="number" class="form-control" value="{{old('tari_imp_minimo', $tarifa->tari_imp_minimo)}}">
                {{-- VALIDAR FORMULARIO CON JS --}}
                @error('tari_imp_minimo')
                    <small class="text-danger"> *{{$message}} </small> 
                    <br>
                @enderror               
        </div>
        <div class="form-group">
            <label for="" class="form-label">tari_m3_minimo</label>
            <input id="tari_m3_minimo" name="tari_m3_minimo" type="number" class="form-control" value="{{old('tari_m3_minimo', $tarifa->tari_m3_minimo)}}">
                {{-- VALIDAR FORMULARIO CON JS --}}
                @error('tari_m3_minimo')
                    <small class="text-danger"> *{{$message}} </small> 
                    <br>
                @enderror              
        </div>
    <br>
<button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>  
<a href="/tarifa" class="btn btn-secondary" tabindex="5">Cancelar</a>    
</form>
</section>
@endsection