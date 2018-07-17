<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class CantanteController extends Controller
{

   /**
     * Visualisar todos los discos, sin filtrar
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cantantes = \App\Cantante::all();
        return view('cantantes.index' , ['cantantes' => $cantantes] );
    }

    /**
     * Editar un cantante
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $cantante = \App\Cantante::find($id);

         if ($request->isMethod('post')) {
            
            $data = $request->validate([
                'nombre' => 'required|max:255',
                'caracteristica' => 'required|max:255',
            ]);
            
            $cantante = \App\Cantante::find($id);
            $cantante->nombre = $data['nombre'];
            $cantante->caracteristica = $data['caracteristica'];
            $cantante->save();

           
            return redirect()->route('cantantes.index')->with('success', 'El cantante fue modificado.');
        }

        $cantantes = \App\Cantante::all();


        return view('cantantes.edit', ['cantante' => $cantante] );

    }


    /**
     * Añadir un cantante
     *
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request, FormBuilder $formBuilder)
    {

        if ($request->isMethod('post')) {
            
            $data = $request->validate([
                'nombre' => 'required|max:255',
                'caracteristica' => 'required|max:255',
            ]);

            $link = tap(new \App\Cantante($data))->save();

            return redirect()->route('cantantes.index')->with('success', 'El cantante fue creado.');
        }

        return view('cantantes.new');

    }

    /**
     * Eliminar un cantante
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        
        $id = $request->id;
        $cantante = \App\Cantante::find($id);
        
        if($cantante->delete()){
            return redirect()->route('cantantes.index')->with('success', 'El cantante fue eliminado correctamente.');

        }else{
            return redirect()->route('cantantes.index')->with('danger', 'No se ha podido esborrar el cantante.');

        }
    }

}
