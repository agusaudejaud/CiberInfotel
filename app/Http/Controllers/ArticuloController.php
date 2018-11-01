<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Articulo;
use App\Marca;
use Barryvdh\DomPDF\Facade as PDF;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $articulos = DB::select('SELECT 
        articles.*,
        IFNULL((SELECT 
            SUM(detallepedidos.cantidad) 
         FROM detallepedidos 
         WHERE detallepedidos.articulo=articles.id),0) AS Stock,
         marcas.nombre AS nombreMarca
      FROM articles 
      INNER JOIN marcas ON marcas.id = articles.marca');

        return view('articulos.index', compact('articulos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::orderBy('nombre','ASC')->get();
        return view('articulos.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
       
        $articulo = new Articulo();
        $articulo->nombre= $request->input('nombre');
        $articulo->marca= $request->input('marca');
        $articulo->descripcion= $request->input('descripcion');
        $articulo->precio_venta= $request->input('precio_venta');
    
        $articulo->save();

        return redirect()->route('articulos.create');
    }
    
    public function storeMarca(Request $requestMar){
        
   //si existe la marca no agregar
        $marcas = new Marca();
        $marcas->nombre= $requestMar->input('nombre');
        $marcas->save();
        return redirect()->route('articulos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo= Articulo::find($id);
        $marcas= Marca::all();
        return view('articulos.edit', compact('articulo'), compact('marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);   
       
           $articulo->fill($request->all());
           $articulo->save();
           return redirect()->route('articulos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);  
        $articulo->delete();
        return redirect()->route('articulos.index');
    }

    public function crearPdf(){
        $articulos = DB::select('SELECT 
        articles.*,
        IFNULL((SELECT 
            SUM(detallepedidos.cantidad) 
         FROM detallepedidos 
         WHERE detallepedidos.articulo=articles.id),0) AS Stock,
         marcas.nombre AS nombreMarca
      FROM articles 
      INNER JOIN marcas ON marcas.id = articles.marca');
        $pdf =PDF::loadView('pdfart',compact('articulos'));
        return $pdf->download('Articulos.pdf');
    }
}

