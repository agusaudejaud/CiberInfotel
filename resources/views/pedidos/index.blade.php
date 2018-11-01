
@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')

<script type="text/javascript" src="{{ URL::asset('assets/js/funciones_proveedores.js') }}"></script>
<div class="container">
   
    
   
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="pedidos/create" class="btn btn-success btn-block">CARGAR</a>
        <br>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="pedidos/reporte" class="btn btn-warning btn-block" disabled>REPORTES</a>
        <br>
    </div>
</div>

<br>
<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
  <table class="table table-bordered table-condensed tab-art" id="proveedores">
    <thead>
      <tr>
        <th class="nowrap text-center" >Id</th>
        <th class="nowrap text-center" >Numero de Orden</th>
        <th class="nowrap text-center">Proveedor</th>
        <th class="nowrap text-center">Fecha</th>
        <th class="nowrap text-center">Pedido</th>
 


      </tr>
    
    </thead>
  
    <tbody>
 
     @foreach ($pedidos as $ped)


        <tr>
          <td class="text-center">{{$ped->id}}</td>
          <td class="text-center">{{$ped->numeroorden}}</td>
          <td class="text-center">{{$ped->nombreProveedor->nombre}}</td>
          <td class="text-center">{{$ped->fecha}}</td>
          <td class="text-center"> 
          {!! Form::open(['method' => 'DELETE', 
                  'route' => ['pedidos.destroy', $ped->id]]) !!}
                  <button type="submit" class="btn btn-sm btn-danger col-sm pull-left"  >Eliminar</button>
                {!! Form::close() !!}      

                  <a href="{{route('pedidos.edit', $ped->id)}}" > <button type="submit" class="btn btn-sm btn-info col-sm pull-left"  >Editar</button></a>
                  
                 
                 
                  

          <a href="{{route('detallesped.show', $ped->id)}}" > <button type="submit" class="btn btn-sm btn-danger col-sm pull-left" >detalles</button></a>
         
          </td>
          </th>
        
        </tr>

      @endforeach
     
    </tbody>
  </table>
  </div>



         

@endsection
