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
      <form method="post" action="{{ route('campus.store') }}">
          <div class="form-group">
              @csrf
              <label for="descricao">Descrição do Campus:</label>
              <input type="text" class="form-control" name="descricao"/>
          </div>
          <div class="form-group">
              <label for="endereco">Endereço do Campus :</label>
              <input type="text" class="form-control" name="endereco"/>
          </div>
          <div class="form-group">
              <label for="telefone">Telefone do Campus:</label>
              <input type="text" class="form-control" name="telefone"/>
          </div>
          <div class="form-group">
             <label for="cidade">Estado :</label>
         {!!
                Form::select(
                    'estado',
                    $estados->pluck('nomeuf','id'),
                    old('estado') ?? request()->get('estado'),
                    ['class' => 'form-control', 'placeholder' => 'Selecione']
                )
            !!}
          </div>
          <div class="form-group">
              <label for="cidade">Cidade :</label>
              <select name="cidade" id="cidade" class="form-control">
                  <option value="">Selecione um Estado</option>
              </select>
          </div>

          <button type="submit" class="btn btn-primary">Incluir</button>
      </form>
  </div>
</div>
@stop
