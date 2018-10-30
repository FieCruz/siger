@extends('adminlte::page')

@section('title', 'SIGER -Sistema Gerenciador de Reservas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  

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
      <form method="post" action="{{ route('campus.update', $campus->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="descricao">Descrição do Campus:</label>
          <input type="text" class="form-control" name="descricao" value={{ $campus->descricao }} />
        </div>
         
	<div class="form-group">
          <label for="endereco">Endereço do Campus:</label>
          <input type="text" class="form-control" name="endereco" value={{ $campus->endereco }} />
        </div>
	<div class="form-group">
          <label for="telefone">Telefone do Campus:</label>
          <input type="text" class="form-control" name="telefone" value={{ $campus->telefone}} />
        </div>

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
              <label for="cidade">Cidade:</label>
              <select name="cidade" id="cidade" class="form-control">
                  <option value="">Selecione uma Cidade</option>
              </select>
          </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>

@stop
