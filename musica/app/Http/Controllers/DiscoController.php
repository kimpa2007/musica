<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscoController extends Controller
{

   /**
     * Visualisar todos los discos, sin filtrar
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discos = \App\Disco::all();
        return view('discos.index' , ['discos' => $discos] );
    }


    /**
     * Añadir un disco
     *
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {
         if ($request->isMethod('post')) {
    
            $data = $request->validate([
                'nombre' => 'required|max:255',
                'caracteristica' => 'required|max:255',
                'cantantes'=>'required'
            ]);

            $disco = new \App\Disco;
            $disco->nombre = $data['nombre'];
            $disco->caracteristica = $data['caracteristica'];
            $disco->save();


            foreach ($data['cantantes'] as $cantante) {
                $disco_cantante = new \App\CantanteDisco;
                $disco_cantante->cantante_id = $cantante;
                $disco_cantante->disco_id = $disco->id;

                $disco_cantante->save();
            }
            
            return redirect()->route('discos.index')->with('success', 'El disco fue creado.');
        }

        $cantantes = \App\Cantante::all();

        return view('discos.new', ['cantantes' => $cantantes] );

    }

     /**
     * Editar un disco
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $disco = \App\Disco::find($id);

         if ($request->isMethod('post')) {
            
            $data = $request->validate([
                'nombre' => 'required|max:255',
                'caracteristica' => 'required|max:255',
                'cantantes'=>'required'
            ]);
            
            $disco = \App\Disco::find($id);
            $disco->nombre = $data['nombre'];
            $disco->caracteristica = $data['caracteristica'];
            $disco->save();

            $disco->cantantes = null;

            foreach ($data['cantantes'] as $cantante) {
                $disco_cantante = new \App\CantanteDisco;
                $disco_cantante->cantante_id = $cantante;
                $disco_cantante->disco_id = $disco->id;

                $disco_cantante->save();
            }
                          
            return redirect()->route('discos.index')->with('success', 'El disco fue modificado.');
        }

        $cantantes = \App\Cantante::all();


        return view('discos.edit', ['cantantes' => $cantantes, 'disco' => $disco] );

    }


    public function delete(Request $request)
    {
        
        $id = $request->id;
        $disco = \App\Disco::find($id);
        
        if($disco->delete()){
            return redirect()->route('discos.index')->with('success', 'El disco fue eliminado correctamente.');

        }else{
            return redirect()->route('discos.index')->with('danger', 'No se ha podido esborrar al disco.');

        }
    }


     /**
     * Buscar los discos de un cantante
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $id_cantante = $request->id;
        $cantante = \App\Cantante::find($id_cantante);
        $discos = $cantante->discos;
        $title = "Discos de ".$cantante->nombre;

        return view('discos.index', ['discos' => $discos, 'title' => $title] );

    }

}
