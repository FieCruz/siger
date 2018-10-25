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
      <form method="post" action="{{ route('equipamentos.store') }}">
          <div class="form-group">
              @csrf
              <label for="eqdescricao">Descrição do equipamento:</label>
              <input type="text" class="form-control" name="eqdescricao"/>
          </div>
	  <div class="form-group">
 		<label for="marca">Marca do equipamento:</label>
        	<input type="text" class="form-control" name="marca"/>
	  </div>
	 <div class="form-group">
 		<label for="codidentificacao">Código de identificação do equipamento:</label>
        	<input type="text" class="form-control" name="codidentificacao"/>
	  </div>
		 <div class="form-group">
			<label for="dt_aquisicao">Data de aquisição do equipamento:</label>
			{!!
				Form::date('dt_aquisicao', \Carbon\Carbon::now(),['class' => 'form-control']);

                        !!}		
		</div>

          <div class="form-group">
           <label for="fkcampus">Campus:</label>
           {!!
            Form::select(
                'fkcampus',
                $campus->pluck('descricao','id'),
                old('fkcampus') ?? request()->get('fkcampus'),
                ['class' => 'form-control']
            )
        !!}

          </div>
          <button type="submit" class="btn btn-primary">Incluir</button>
      </form>
  </div>
</div>

@stop
