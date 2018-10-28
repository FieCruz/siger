@extends('adminlte::page')

@section('title', 'SIGER -Sistema Gerenciador de Reservas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
    <hr>

    <style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">

  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('reservas.store') }}">
          <div class="form-group">
              @csrf
              <label for="solicitante">Solicitante: </label> <label name="solicitante"> {{auth()->User()->name}}</label><br/>
              <label for="dtagendamento">Data de agendamento:</label>
              {!!
				Form::date('dtagendamento', \Carbon\Carbon::now(),['class' => 'form-control']);

              !!}
          </div>
	  
          <div class="form-group">
           <label for="fkequipamentos">Equipamentos:</label>
           {!!
            Form::select(
                'fkequipamentos',
                $equipamentos->pluck('eqdescricao','marca','id'),
                old('fkequipamentos') ?? request()->get('fkequipamentos'),
                ['class' => 'form-control']
            )
        !!}

          </div>
          
          <button type="submit" class="btn btn-primary">Incluir</button>
      </form>
  </div>
</div>

@stop
