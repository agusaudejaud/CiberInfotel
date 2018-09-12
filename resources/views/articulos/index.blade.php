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
                <th class="nowrap text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulos)
            <tr>
                <td class="text-left">{{$articulos->nombre}}</td>
                @if(isset($articulos->marca)) 
                    <td class="text-left">{{$articulos->marca}}</td>
                @else
                    <td class="text-left">S/C</td>
                @endif
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center">
                    <span class="glyphicon glyphicon-edit" style="cursor: pointer;" title="Editar Articulo"></span>
                    <a href="">
                        <span class="glyphicon glyphicon-trash" style="cursor:pointer;" title="Eliminar Articulo"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
