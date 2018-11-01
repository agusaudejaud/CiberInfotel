



@extends('layouts.app')

@section('title', 'Editar Detalles Pedidos')

@section('content')
<div class="container">
<div class="col-lg-4 col-md-4 col-sm-4">
        <a href="" class="btn btn-primary btn-block">LISTADO</a>
    <br>
    </div>
    </div>
<div class="container">
<form class="form-group" action="{{route('detallesped.update', $detallesped->id)}}" method="post">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="PUT">

<div class="form-group col-lg-6 col-md-6 col-sm-12">
<label ><b>Numero de orden</b></label>
  <input type="text" class="form-control input-sm" name="numeroorden"  tabindex="1" value="{{$detallesped->cantidad}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
<label >Nombre del articulo</label>
				<div class="input-group">
                <select class="form-control input-sm" name="marca" id="marca"  tabindex="2">
                        <option value="">SELECCIONAR</option>
                        @foreach($articulos as $articulo)
                        @if($articulo->id == $detallesped->articulo)    
                        <option selected="selected" value="{{$articulo->id}}">{{$articulo->nombre}}</option>
                        @else
                        <option value="{{$articulo->id}}">{{$articulo->nombre}}</option>
                        @endif
                        @endforeach
					</select>
          </div>
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
<label ><b>Numero del pedido</b></label>
  <input type="text" class="form-control input-sm" name="pedido"  tabindex="3" value="{{$detallesped->pedido}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
<label ><b>Pecio costo del pedido</b></label>
  <input type="text" class="form-control input-sm" name="precio_costo"  tabindex="3" value="{{$detallesped->precio_costo}}">
</div>


     <br>
     <div class="container-fluid">
        
        <div class="col-lg-12 col-md-12 text-center">
            <input type="submit" class="btn btn-success btn-sm" value="CARGAR" tabindex="5">
        </div>
    </div>
</form>
</div>
@endsection