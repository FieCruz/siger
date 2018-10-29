<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Horarios;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horarios::all();

        return view('horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horarios.create');
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
            'horario'=>'required|unique:horarios',
            'turno'=> 'required',
            
        ]
   
        
        );
          $horarios = new Horarios([
            'turno' => $request->get('turno'),
            'horario'=> $request->get('horario'),
           
          ]);
          $horarios->save();
          return redirect('/horarios')->with('success', 'Estado incluido com sucesso');
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
        $horarios = Horarios::find($id);

        return view('horarios.edit', compact('horarios'));
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
            'horario'=>'required|unique:horarios',
            'turno'=> 'required',
           
        ]
      
        );
    
          $horarios = Horarios::find($id);
          $horarios->horario = $request->get('horario');
          $horarios->turno = $request->get('turno');
          
          $horarios->save();
    
          return redirect('/horarios')->with('success', 'Dado atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horarios = Horarios::find($id);
        $horarios->delete();
   
        return redirect('/horarios')->with('success', 'Dado excluido com sucesso');
    }
}
