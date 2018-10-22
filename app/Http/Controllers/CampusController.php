<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidades;
use App\Estados;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados =  Estados::all();
        $cidades =  Cidades::all();

        return view('campus.create')
                ->withEstados($estados)
                ->withCidades($cidades);
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
            'cidade'          => 'required',
        	'endereco'        => 'required|unique:campus',
	        'telefone'        => 'required|unique:campus',
	        'descdocampus'    => 'required|unique:campus',
		
     

        ]);

        Campus::create([
                'cidade'             =>$request->get('cidades'),
                'endereco'           =>$request->get('campus'),
		        'telefone'           =>$request->get('campus'),
		        'descdocampus'       =>$request->get('campus'),
            
        ]);
        
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

