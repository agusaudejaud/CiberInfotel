@extends('layouts.app')
@section('title', 'Crear Pedido')
@section('content')




<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
    <form action="{{ action('PedidoController@store') }}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="container-fluid">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
				<label for="nombre">Nombre</label>
				<input type="text" autocomplete="off" class="form-control input-sm uppercase" name="nombre" id="nombre" placeholder="Nombre" onkeyup="uppercase(this.value)" tabindex="1">
            </div>
            
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
				<label for="marca">Proveedor</label>
				
            </div>
            <div class="col-lg-4 col-md-4">
                <label for="precio_venta">Numero de orden</label>
                <input type="text" class="form-control input-sm" name="numeroorden" id="numeroroden" tabindex="2">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
                <label for="precio_venta">Fecha del registro</label>
                <input type="date" class="form-control input-sm"  name="fecha" id="fecha" tabindex="3">
            </div>
        </div>
        
        <br>
        
        </div>
    </form>   
</div>


@endsection
