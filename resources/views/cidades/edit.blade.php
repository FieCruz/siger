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
      <form method="post" action="{{ route('cidades.update', $cidade->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Cidade:</label>
          <input type="text" class="form-control" name="name" value={{ $cidade->name }} />
        </div>
        <div class="form-group">
          <label for="state_id">Estados :</label>
         {!!
            
            Form::select(
                'state_id',
                $estados->pluck('name','id'),
                old('state_id') ?? $cidade->estado->id,
                ['class' => 'form-control']
            )
        !!}
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>

@stop
