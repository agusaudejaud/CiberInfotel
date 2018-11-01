@extends('layouts.app')
@section('title', 'Crear Articulo')
@section('content')


<div class="container">

    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="{{route('articulos.index')}}" class="btn btn-primary btn-block">LISTADO</a>
    <br>
    </div>
    
</div>

<br>

<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
    <form action="{{ action('ArticuloController@store') }}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="container-fluid">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
				<label for="nombre">Nombre</label>
				<input type="text" autocomplete="off" class="form-control input-sm uppercase" name="nombre" id="nombre" placeholder="Nombre" onkeyup="uppercase(this.value)" tabindex="1">
            </div>
            
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
				<label for="marca">Marca</label>
				<div class="input-group">
					<select class="form-control input-sm" name="marca" id="marca"  tabindex="2">
                        <option value="">SELECCIONAR</option>
                        @foreach($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                        @endforeach
					</select>
                   
					<div class="input-group-btn">	
						<a class="btn btn-default btn-sm" title="Agregar Marcas" data-toggle="modal" data-target="#exampleModal">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
					</div>

				</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <label for="precio_venta">Precio Venta</label>
                <input type="number" class="form-control input-sm" onkeypress="return moneda(event)" name="precio_venta" id="precio_venta" tabindex="3">
            </div>
        </div>

        <div class="container-fluid">
            <div class="container-fluid">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4" tabindex="4"></textarea>
            </div>
        </div>  
        <br>
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 text-right">
                <input type="button" class="btn btn-warning btn-sm" value="LIMPIAR" tabindex="6">
            </div>
            <div class="col-lg-6 col-md-6 text-left">
                <input type="submit" class="btn btn-success btn-sm" value="CARGAR" tabindex="5">
            </div>
        </div>
    </form>   
</div>


      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ action('ArticuloController@storeMarca') }}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="container-fluid">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
				<label for="nombre">Nombre de la marca</label>
				<input type="text" autocomplete="off" class="form-control input-sm " name="nombre" id="nombre" placeholder="Nombre" tabindex="1">
            </div>
           
      </div>
      <div class="modal-footer">
      <input type="submit" value="Guardar">
      </form> 
      </div>
    </div>
  </div>
</div>
<script>

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
@endsection


