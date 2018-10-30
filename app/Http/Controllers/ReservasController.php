<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamentos;
use App\Reservas;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reservas::all();
        return view('reservas.index', compact('reservas'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  

        $equipamentos=Equipamentos::all();
        return view('reservas.create')->withEquipamentos($equipamentos);
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
            'solicitante'       =>'required',
            'horario'           =>'required',
            'dtagendamento'     => 'required|date',
            'fkequipamentos'    => 'required|integer|unique:reservas'
          ]);
          $reservas = new Reservas([
            'solicitante'    =>$request->get('solicitante'),
            'horario'        =>$request->get('horario'),
            'dtagendamento'  =>$request->get('dtagendamento'),
            'fkequipamentos' =>$request->get('fkequipamentos')
          ]);
          $reservas->save();
          return redirect('/reservas')->with('success', 'Reserva realizada com sucesso.');
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
