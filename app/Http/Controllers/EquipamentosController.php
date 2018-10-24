<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campus;
use App\Equipamentos;

class EquipamentosController extends Controller
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
        $campus =  Campus::all();

        return view('equipamentos.create')
        ->withCampus($campus);
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
            'eqdescricao'   	=> 'required',
          'marca'           	=> 'required',
              'codidentificacao'  	=> 'required',
          'dt_aquisicao'       	=> 'required|date',
          'fkcampus'		=> 'required|integer', 
                  
              ]
         
              
              );
                $equipamentos = new Equipamentos([
                  'eqdescricao' 	=> $request->get('eqdescricao'),
                  'marca'       	=> $request->get('marca'),
                  'codidentificacao'  => $request->get ('codidentificacao'), 
                  'dt_aquisicao'	=> $request->get ('dt_aquisicao'), 
                  'fkcampus'		=> $request->get ('fkcampus'),
                 
                ]);
                $equipamentos->save();
                return redirect('/equipamentos')->with('success', 'Equipamento incluido com sucesso');
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
