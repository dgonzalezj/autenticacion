<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
class NotaController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        //return auth()->user();
       $usuarioEmail=auth()->user()->email;
       $notas = Nota::where('usuario',$usuarioEmail)->paginate(2);
       return view('notas.lista',compact('notas')); 
    }

    public function inicio()
    {
        $notas = Nota::all();
        return view('welcome',compact('notas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('notas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);
        
        $nota = new Nota();
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;
        $nota->usuario = auth()->user()->email;
        $nota->save();

        return back()->with('mensaje', 'Nota Agregada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.mostrar',compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        return view ('notas.editar',compact ('nota'));
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
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);
        $notaUpdate = Nota::findOrFail($id);
        $notaUpdate->nombre =$request->nombre;
        $notaUpdate->descripcion =$request->descripcion;

        $notaUpdate->save();

        return back()->with('Mensaje','Nota Actualizada!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar->delete();

        return back()->with('Mensaje','Nota Eliminada!!');
    }
}
