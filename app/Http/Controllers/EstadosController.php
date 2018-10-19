<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estados;


class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estados::all();

        return view('estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estados.create');
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
            'nomeuf'=>'required|unique:estados',
            'uf'=> 'required|unique:estados',
            
        ]
   
        
        );
          $estados = new Estados([
            'nomeuf' => $request->get('nomeuf'),
            'uf'=> $request->get('uf'),
           
          ]);
          $estados->save();
          return redirect('/estados')->with('success', 'Estado incluido com sucesso');
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
        $estados = Estados::find($id);

        return view('estados.edit', compact('estados'));
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
            'nomeuf'=>'required',
            'uf'=> 'required',
           
        ]
      
        );
    
          $estados = Estados::find($id);
          $estados->nomeuf = $request->get('nomeuf');
          $estados->uf = $request->get('uf');
          
          $estados->save();
    
          return redirect('/estados')->with('success', 'Dado atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estados = Estados::find($id);
        $estados->delete();
   
        return redirect('/estados')->with('success', 'Dado excluido com sucesso');
    }
}
