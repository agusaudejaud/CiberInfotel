@extends('layouts.app')
@section('title', 'Detalle del pedido')
@section('content')



<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
    <form action="{{ action('DetallepedController@store') }}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
     
        <input type="hidden" name="pedido" value="{{$pedido_id}}">
    
        <div class="container-fluid">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
				<label >Cantidad</label>
				<input type="number" autocomplete="off" class="form-control input-sm uppercase" name="cantidad" id="cantidad" placeholder="Cantidad" tabindex="1">
            </div>
            <div class="container-fluid">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
				<label >Precio Costo</label>
				<input type="number" autocomplete="off" class="form-control input-sm uppercase" name="precio_costo" id="precio_costo" placeholder="Precio Costo" tabindex="1">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
				<label >Articulo</label>
				<div class="input-group">
					<select class="form-control input-sm" name="articulo" id="articulo"  tabindex="2">
                        <option value="">SELECCIONAR</option>
                        @foreach($articulos as $articulo)
                        <option value="{{$articulo->id}}">{{$articulo->nombre}}</option>
                        @endforeach
					</select>
                    </div>
                    <br>
        <div class="container-fluid">
          
            <div class="col-lg-6 col-md-6 text-left">
                <input type="submit" class="btn btn-success btn-sm" value="CARGAR" tabindex="5">
            </div>
        </div>
         
    </form>   
</div>


@endsection


