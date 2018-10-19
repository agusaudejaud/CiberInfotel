
@extends('layouts.app')

@section('title', 'Pedido')

@section('content')



<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
  <table class="table table-bordered table-condensed tab-art" id="pedidos">
    <thead>
      <tr>
        <th class="nowrap text-center" >Id</th>
        <th class="nowrap text-center" >Numero de Orden</th>
        <th class="nowrap text-center">Proveedor</th>
        <th class="nowrap text-center">Fecha</th>
   


      </tr>
    
    </thead>
  
    <tbody>
 
     @foreach ($pedidos as $ped)


        <tr>
          <td class="text-center">{{$ped->id}}</td>
          <td class="text-center">{{$ped->numeroorden}}</td>
         
          
            
          <!-- <td>
               {!! Form::open(['method' => 'DELETE', 
                  'route' => ['pedidos.destroy', $pedidos->id]]) !!}
                  <button type="submit" class="btn btn-sm btn-danger col-sm pull-left"  >Eliminar</button>
                {!! Form::close() !!}      

                 <a href="{{route('pedidos.edit', $pedidos->id)}}" > <button type="submit" class="btn btn-sm btn-info col-sm pull-left"  >Editar</button></a>
                
          </td> -->
            
         
        </tr>

      @endforeach
     
    </tbody>
  </table>
  </div>



         

@endsection
