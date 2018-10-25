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
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Código do equipamento</td>
          <td>Descrição:</td>
          <td>Marca:</td>
          <td>Numero de série:</td>    
          <td>Data de aquisição:</td>
          <td>Campus de Origem:</td>
	       
	   
          <td colspan="2">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($equipamentos as $equipamentos)
        <tr>
            <td>{{$equipamentos->id}}</td>
	          <td>{{$equipamentos->eqdescricao}}</td>
            <td>{{$equipamentos->marca}}</td>
            <td>{{$equipamentos->codidentificacao}}</td>
            <td>{{$equipamentos->dt_aquisicao}}</td>
            <td>{{$equipamentos->fkcampus->descricao}} </td>
            
		
            
            
         <td><a href="{{ route('equipamentos.edit',$equipamentos->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('equipamentos.destroy', $equipamentos->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@stop