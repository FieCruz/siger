<?php

namespace App\Http\Controllers;

use App\Estados;
use Illuminate\Http\Request;
use App\Cidades;
use App\Campus;
class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus = Campus::all();
        return view('campus.index', compact('campus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $estados =  Estados::all();
        return view('campus.create')->withEstados($estados);
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
            'descricao'	=> 'required',
            'endereco'	=> 'required',
            'telefone'	=> 'required|numeric',
            'cidade'	=> 'required|integer',
          ]);
          
      Campus::create([
            'descricao'	=>$request->get('descricao'),
            'endereco' 	=> $request->get('endereco'),
            'telefone' 	=> $request->get('telefone'),
            'cidade'    => $request->get('cidade'),
                    
                ]
            );
            
            return redirect()->route('campus.index')->with('success', 'Campus adicionado com sucesso');
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
        $campus = Campus::find($id);
        $cidades= Cidades::find($id);
        $estados= Estados::all();

        return view('campus.edit', compact('campus','cidade','estados'));
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
            'descricao'	=> 'required',
            'endereco'	=> 'required',
            'telefone'	=> 'required|numeric',
            'cidade'	=> 'required|integer',
      ]);

      $campus = Campus::find($id);
      $campus->descricao    =  $request->get('descricao');
      $campus->endereco     =  $request->get('endereco');
      $campus->telefone     =  $request->get('telefone');
      $campus->cidade       =  $request->get('cidade');
      $campus->save();

      return redirect('/campus')->with('success', 'Dados do campus atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $campus = Campus::find($id);
        $campus->delete();
        return redirect('/campus')->with('success', 'Dados do Campus excluido com sucesso');
    }
}
