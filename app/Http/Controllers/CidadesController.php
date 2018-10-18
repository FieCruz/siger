<?php

namespace App\Http\Controllers;

use App\Cidades;
use App\Http\Requests\ValidateCidade;
use Illuminate\Http\Request;
use App\Estados;

/**
 * Class CidadesController
 * @package App\Http\Controllers
 */
class CidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidades::all();
        

        return view('cidades.index', compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $estados =  Estados::all();

        return view('cidades.create')
        ->withEstadoSelecionado($estados->where('nomeuf','São Paulo')->first()->id ?? null)
        ->withEstados($estados);
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
            'cidade'    => 'required',
            'estado'    => 'required'
        ]);

        Cidades::create([
                'cidade'    => $request->get('cidade'),
                'idestados' => $request->get('estado')
            ]
        );
        
        return redirect()->route('cidades.index')->with('success', 'Cidade adicionado com sucesso');
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
        $cidades = Cidades::find($id);
        $estados=Estados::find($id);

        return view('cidades.edit', compact('cidades'));
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
            'cidade'    => 'required',
            'estado'    => 'required'
        ]);

        $cidades = Cidades::find($id);
        $cidades->cidade = $request->get('cidade');
        $cidades->idestados = $request->get('idestados');
        $cidades->save();
        return redirect('/cidades')->with('success', 'Cidade alterada com sucesso');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cidades = Cidades::find($id);
        $cidades->delete();

     return redirect('/cidades')->with('success', 'Cidade excluida com sucesso');
    }
}
