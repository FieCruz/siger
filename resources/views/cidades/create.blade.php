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
      <form method="post" action="{{ route('cidades.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Cidade:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
           <label for="state_id">Estado:</label>
          {!!
            Form::select(
                'state_id',
                $estados->pluck('name','id'),
                old('state_id') ?? request()->get('state_id'),
                ['class' => 'form-control']
            )
        !!}

          </div>
          <button type="submit" class="btn btn-primary">Incluir</button>
      </form>
  </div>
</div>

@stop
