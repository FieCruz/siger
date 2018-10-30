@extends('adminlte::page')

@section('title', 'SIGER- Sistema Gerenciador de Reservas')

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
      <form method="post" action="{{ route('estados.store') }}">
          <div class="form-group">
              @csrf
              <label for="nomeuf">Nome da UF:</label>
              <input type="text" class="form-control" name="nomeuf"/>
          </div>
          <div class="form-group">
              <label for="UF">UF</label>
              <input type="text" class="form-control" name="uf"/>
              <br>
          </div>
          
          <button type="submit" class="btn btn-primary">Incluir</button>
      </form>
  </div>
</div>

@stop