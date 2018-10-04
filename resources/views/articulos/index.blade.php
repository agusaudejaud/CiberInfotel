@extends('layouts.app')
@section('title', 'Articulos')

@section('content')

<script type="text/javascript" src="{{ URL::asset('assets/js/funciones_articulos.js') }}"></script>

<div class="container">
    <p align="center" class="title-form">[ LISTADO DE ARTICULOS ]</p>
    
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="/articulos" class="btn btn-primary btn-block">LISTADO</a>
    <br>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="articulos/create" class="btn btn-success btn-block">CARGAR</a>
        <br>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="articulos/reporte" class="btn btn-warning btn-block" disabled>REPORTES</a>
        <br>
    </div>
</div>

<br>

<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
    <table class="table table-bordered table-condensed tab-art" id="tab-articulos">
        <thead>
            <tr>
                <th class="nowrap text-left">Nombre</th>
                <th class="nowrap text-left">Marca</th>
                <th class="nowrap text-center">Disponibilidad</th>
                <th class="nowrap text-center">Precio Venta</th>
                <th class="nowrap text-center">Descripcion</th>
                <th class="nowrap text-center">Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
            <tr>
            <td>
            {{$articulo->nombre}}
            </td>
            <td>
            {{$articulo->nombreMarca->nombre}}
            </td>
            <td>
            {{$articulo->disponibilidad}}
            </td>
            <td>
            {{$articulo->precio_venta}}
            </td>
            <td>
            {{$articulo->descripcion}}
            </td>
            
            </tr>
            
           
            @endforeach
        </tbody>
    </table>
</div>


@endsection
