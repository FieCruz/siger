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
      <form method="post" action="{{ route('equipamentos.update', $equipamentos->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="eqdescricao">Descrição/Marca do equipamento:</label>
          <input type="text" class="form-control" name="eqdescricao" value={{ $equipamentos->eqdescricao }} />
        </div>
        <div class="form-group">
          <label for="marca">Modelo do equipamento:</label>
          <input type="text" class="form-control" name="marca" value={{ $equipamentos->marca }} />
        </div>
        <div class="form-group">
          <label for="codidentificacao">Número de série do equipamento:</label>
          <input type="text" class="form-control" name="codidentificacao" value={{ $equipamentos->codidentificacao }} />
        </div>
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
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>

@stop
