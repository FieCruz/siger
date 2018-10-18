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
      <form method="post" action="{{ route('cidades.store') }}">
          <div class="form-group">
              @csrf
              <label for="cidade">Cidade:</label>
              <input type="text" class="form-control" name="cidade"/>
          </div>
          <div class="form-group">
           <label for="estado">Estado:</label>
          {!!
            Form::select(
                'estado',
                $estados->pluck('nomeuf','id'),
                old('estado') ?? $estadoSelecionado,
                ['class' => 'form-control']
            )
        !!}

          </div>
          <button type="submit" class="btn btn-primary">Incluir</button>
      </form>
  </div>
</div>

@stop
