@extends('adminlte::page')

@section('title', 'SIGER- Sistema Gerenciador de Reservas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<p>You are logged in!</p>
<hr>
<p><b>Atenção</b></p>
<p>A edição pode influenciar em todos os cadastros, porém o processo pode ser reversível</p>
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
      <form method="post" action="{{ route('horarios.update', $horarios->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="horarios"><b>Horarios:</b></label>
          <input type="text" class="form-control" name="nomeuf" value={{ $horarios->horario }} />
        </div>
        <div class="form-group">
          <label for="turno">Turno:</label>
          <input type="text" class="form-control" name="uf" value={{ $horarios->turno }} />
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection