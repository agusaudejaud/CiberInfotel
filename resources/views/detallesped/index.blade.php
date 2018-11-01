
@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')

<script type="text/javascript" src="{{ URL::asset('assets/js/funciones_proveedores.js') }}"></script>

    <div class="container">

    
    
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="{{route('detallesped.crearPedido', $pedido_id)}}" class="btn btn-success btn-block">CARGAR</a>
        <br>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="proveedores/reporte" class="btn btn-warning btn-block" disabled>REPORTES</a>
        <br>
    </div>
</div>

<br>

<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
  <table class="table table-bordered table-condensed tab-art" id="proveedores">
    <thead>
      <tr>
        <th class="nowrap text-center" >Id</th>
        <th class="nowrap text-center" >Cantidad</th>
        <th class="nowrap text-center">Articulo</th>
        <th class="nowrap text-center">Pedido</th>
        <th class="nowrap text-center">Precio costo</th>
        <th class="nowrap text-center">Acciones</th>
     

      </tr>
    
    </thead>
  
    <tbody>
 
    @foreach ($detallesped as $detped)


<tr>
  <td class="text-center">{{$detped->id}}</td>
  <td class="text-center">{{$detped->cantidad}}</td>
  <td class="text-center">{{$detped->nombreArticulo->nombre}}</td>
  <td class="text-center">{{$detped->pedido}}</td>
  <td class="text-center">{{$detped->precio_costo}}</td>
  <td class="text-center"> 
           
  {!! Form::open(['method' => 'DELETE', 
                  'route' => ['detallesped.destroy', $detped->id]]) !!}
                  <button type="submit" class="btn btn-sm btn-danger col-sm pull-left"  >Eliminar</button>
                {!! Form::close() !!}           
          <a href="{{route('detallesped.edit', $detped->id)}}" > <button type="submit" class="btn btn-sm btn-info col-sm pull-left" >Editar</button></a>
  </th>

</tr>

@endforeach
     
    </tbody>
  </table>
  </div>



         

@endsection