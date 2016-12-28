<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;//este es el modelo
use Storage;

class Noticias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->txtDescripcion);
        $this->validate($request, [
            'txtTitulo' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|max:50',
            'txtDescripcion' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|max:100'
        ]); 

        $producto = new Noticia();
        $producto->Titulo= $request->txtTitulo;
        $producto->Descripcion= $request->txtDescripcion;
        
      

        $img=$request->file('UrlImg');
        $file_route = time().'_'.$img->getClientOriginalName();
        Storage::disk('imgProductos')->put($file_route, file_get_contents($img->getRealPath() ) );
        
        $producto->UrlImg= $file_route;
        $producto->save();
        /*dd('Datos guardados con exito');*/
        $request->session()->flash('alert-success', 'Producto guardado con exito');
        return back();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
