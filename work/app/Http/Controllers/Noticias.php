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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrar()
    {
        //
        
        $noticias = Noticia::all();
        return view('welcome')->with(['noticias' => $noticias]);
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
            'txtTitulo' => 'regex:/(^[A-Za-z0-9 ]+$)+/|max:50',
            'txtDescripcion' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|max:150',
            'txtCarpeta' => 'regex:/(^[A-Za-z0-9 ]+$)+/|max:20'
        ]); 

        $producto = new Noticia();
        $producto->Titulo= $request->txtTitulo;
        $producto->Descripcion= $request->txtDescripcion;
        $producto->Carpeta= $request->txtCarpeta;
        
      
        if ($request->file('UrlImg')) //Valida si el campo file tiene un archivo o no lo tiene. 
        {
            $img=$request->file('UrlImg');
            $file_route = time().'_'.$img->getClientOriginalName();
            Storage::disk('imgProductos')->put($file_route, file_get_contents($img->getRealPath() ) );
            
            $producto->UrlImg= $file_route;
        }
        $producto->save();
        /*dd('Datos guardados con exito');*/
        $request->session()->flash('alert-success', 'Recordatorio guardado con exito.');
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
        $noticia = Noticia::find($id);
        return view('home')->with(['edit' => true, 'noticia' => $noticia]);
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
         //
        //dd($request->txtDescripcion);
        $this->validate($request, [
            'txtTitulo' => 'regex:/(^[A-Za-z0-9 ]+$)+/|max:50',
            'txtDescripcion' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|max:150',
            'txtCarpeta' => 'regex:/(^[A-Za-z0-9 ]+$)+/|max:20'
        ]); 

        $producto = Noticia::find($id);
        $producto->Titulo= $request->txtTitulo;
        $producto->Descripcion= $request->txtDescripcion;
        $producto->Carpeta= $request->txtCarpeta;
      
        if ($request->file('UrlImg')) //Valida si el campo file tiene un archivo o no lo tiene. 
        {
            $img=$request->file('UrlImg');
            
            $file_route = time().'_'.$img->getClientOriginalName();
            
            Storage::disk('imgProductos')->put($file_route, file_get_contents($img->getRealPath() ) );
            Storage::disk('imgProductos')->delete($request->img);
            
            $producto->UrlImg = $file_route;
        }
            if($producto->save())
            {
                
                return redirect('home')->with('msj', 'Los datos se modificaron con exito.');
            }else
            {
                return back()->with('errormsj', 'Los datos no se guardaron');
            }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            
        $producto = Noticia::find($id);
        Noticia::destroy($id);
        Storage::disk('imgProductos')->delete($producto->UrlImg);
        return redirect('home')->with('msj-success', 'El recordatorio se elimino con exito.');

    }
}
