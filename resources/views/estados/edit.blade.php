@extends('adminlte::page')

@section('title', 'SIGER- Sistema Gerenciador de Reservas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


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
      <form method="post" action="{{ route('estados.update', $estados->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nome da UF:</label>
          <input type="text" class="form-control" name="name" value={{ $estados->name }} />
        </div>
        <div class="form-group">
          <label for="abbr">UF:</label>
          <input type="text" class="form-control" name="abbr" value={{ $estados->abbr }} />
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection